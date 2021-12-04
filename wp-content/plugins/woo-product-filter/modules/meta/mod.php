<?php
class MetaWpf extends ModuleWpf {
	private $calculated = false;

	public function init() {
		parent::init();
		DispatcherWpf::addFilter('optionsDefine', array($this, 'addOptions'));
		add_action('woocommerce_update_product', array($this, 'recalcProductMetaValues'), 100, 1);
		add_action('woocommerce_product_set_stock_status', array($this, 'recalcProductStockStatus'), 100, 1);
		add_action('woocommerce_variation_set_stock_status', array($this, 'recalcProductStockStatus'), 100, 1);
		add_action('wpf_calc_meta_indexing', array($this->getModel(), 'recalcMetaValues'), 10, 1);

		add_filter('woocommerce_product_csv_importer_steps', array($this, 'recalcAfterImporting'));
	}
	public function isGlobalCalcRunning() {
		return FrameWpf::_()->getModule('options')->getModel()->get('start_indexing') == 2;
	}
	public function isDisabledAutoindexing() {
		$param = FrameWpf::_()->getModule('options')->getModel()->get('disable_autoindexing');
		return false === $param ? 0 : ( (int) $param );
	}

	public function recalcAfterImporting( $steps ) {
		$step = ReqWpf::getVar('step');
		if (!is_null($step) && 'done' == $step && !$this->isDisabledAutoindexing()) {
			wp_schedule_single_event( time() + 1, 'wpf_calc_meta_indexing' );
		}
		return $steps;
	}
	
	public function addOptions( $options ) {
		$opts = array_merge(array(
			'start_indexing' => array(
				'label' => esc_html__('Start indexing product parameters', 'woo-product-filter'),
				'desc' => esc_html__('For correct and fast operation of filters, the plugin creates index tables for product parameters. This tables are automatically rebuilt by editing / creating products. But if you edited products with third-party plugins or methods, and/or noticed that the filter does not work correctly, then click this button to forcefully rebuild the index tables. If you have a lot of products, the process may take a while.', 'woo-product-filter'),
				'html' => 'startMetaButton',
				'def' => '',
			),
			'disable_autoindexing' => array(
				'label' => esc_html__('Disable automatic calculation of index tables after editing products.', 'woo-product-filter'),
				'desc' => esc_html__('This can be useful if you add products only through imports. Then after importing, just do a full recalculation of the index tables once by clicking the button above.', 'woo-product-filter'),
				'html' => 'checkboxHiddenVal',
				'def' => '0',
			),
			'logging' => array(
				'label' => esc_html__('Logging', 'woo-product-filter'),
				'desc' => esc_html__('Save debug messages to the WooCommerce SystemStatus Log', 'woo-product-filter'),
				'html' => 'checkboxHiddenVal',
				'def' => '0',
			),
		), $options['general']['opts']);

		$options['general']['opts'] = $opts;
		return $options;
	}
	public function recalcProductMetaValues( $productId ) {
		if (!$this->isDisabledAutoindexing()) {
			$this->getModel()->recalcMetaValues($productId);
		}
	}
	public function recalcProductStockStatus( $productId ) {
		$this->getModel()->recalcMetaValues($productId, array('meta_key' => '_stock_status'));
	}

	public function calcNeededMetaValues( $one = false ) {
		if (!$this->isGlobalCalcRunning()) {
			if (!$one || !$this->calculated) {
				$this->getModel()->recalcMetaValues(0, array('status' => array(0, 2)));
			}
			$this->calculated = true;
		}
	}

}
