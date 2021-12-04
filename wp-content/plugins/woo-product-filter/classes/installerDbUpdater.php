<?php
class InstallerDbUpdaterWpf {
	public static function runUpdate( $current_version ) {
		if (version_compare($current_version, '2.0.0') != 1) {
			if (DbWpf::get("SELECT 1 FROM `@__modules` WHERE code='meta'", 'one') != 1) {
				DbWpf::query("INSERT INTO `@__modules` (id, code, active, type_id, label) VALUES (NULL, 'meta', 1, 1, 'meta');");
			}
			if (!DbWpf::existsTableColumn('@__filters', 'meta_keys')) {
				DbWpf::query('ALTER TABLE `@__filters` ADD COLUMN `meta_keys` varchar(255) NULL DEFAULT NULL AFTER `setting_data`');
			}
			if (DbWpf::existsTableColumn('@__meta_values', 'key2')) {
				DbWpf::query('ALTER TABLE `@__meta_values` MODIFY COLUMN `key2` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL');
			}
			if (DbWpf::existsTableColumn('@__meta_values', 'key3')) {
				DbWpf::query('ALTER TABLE `@__meta_values` MODIFY COLUMN `key3` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL');
			}
			if (DbWpf::existsTableColumn('@__meta_values', 'key4')) {
				DbWpf::query('ALTER TABLE `@__meta_values` MODIFY COLUMN `key4` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL');
			}
			if (DbWpf::existsTableColumn('@__meta_values', 'value')) {
				DbWpf::query('ALTER TABLE `@__meta_values` MODIFY COLUMN `value` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin');
			}

		}
	}
}
