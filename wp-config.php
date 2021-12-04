<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'u3677576_shop' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'u3677576' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'jfnno' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         't+~Ik4G+ZhT;|w<@h>4F)htE$JDY;7XZXo(w8xQPvV@+L?>sl7/{Pb0AsC:O`RNn' );
define( 'SECURE_AUTH_KEY',  'xpenK^X_i[[S_icjBvid>U.HS-_KAN88E<,W:GW#&(O5`}Sg:HE`viA88Ta<Uvh$' );
define( 'LOGGED_IN_KEY',    'AT#MUU/mXW}iOTj{2de`h1 6:UZAd,>??ppy1${#[U~37aWAO6ammZMq~B]J@*tX' );
define( 'NONCE_KEY',        'frJ>@-wH8JHH)J:zphk?. #:J~1cYVI2%Dh14hPo$pfkAt|MP(zy bzlt]Kwx(]f' );
define( 'AUTH_SALT',        'J;ZmNFV%>3>b7ySvpTH@0AG$lI 8=]Gr.;-Oc!mG_0sI!InzMQ;:<p [GiGhn`1u' );
define( 'SECURE_AUTH_SALT', 'hG~PFN3@QX/#W*7~C2+KuW:y6=A6SQ!Xe[kF*kE3X(CgQ0_$u9d`iXVX#Z.CYf0S' );
define( 'LOGGED_IN_SALT',   'YO~I^MrZM1[b6~LbrLv^7NJ:}2o:-LIyhGTc`Y[2^:U@, x a+R{hx;=:Q{6G2Rx' );
define( 'NONCE_SALT',       '9Wgk>h-tqG>pd@fFGbb;wZK2$;1U1^e$uGcaaRpl0y0:!{]KTKw&ybZ;)-yW%ARN' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';