<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
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
define( 'DB_NAME', 'admin_partners' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'admin_partner' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'yw9vacv3CE' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ';grY|)bFP`= g$e1d+d 9vxEjNUJ1;oZOXmb]Se!vM<9z]-$L[!L@mo_gDk~Fh>l' );
define( 'SECURE_AUTH_KEY',  'dNH!TA8`<YxDn`WIu/SRob6R9<Q-%1wV~aXe->9F~6QgxD+t(BPSM}Xgdvf`,9+i' );
define( 'LOGGED_IN_KEY',    '/<sq~ql4l^eH|uS:vUVk-jg~jZu3Ba^zKX0gQn?QvP(>+c^<8ZY#TY q%MPh:lMN' );
define( 'NONCE_KEY',        '6QurITijP*q=_jSE)cVADO[abkR?cFd#v%jm?@R1XEJDtv9A$/GDbw@^o)(FyKRz' );
define( 'AUTH_SALT',        '^<{h~n[K0r2bN~&=1z`@^m!t{/WXLQ<Q#;-*j{FSe_<}%$]IV~|CCN2* Zc6OBOl' );
define( 'SECURE_AUTH_SALT', 'z]i|Na/L#@0/b0OXX09O6zBC^)X ds#EDQPc{W.ab&0u;*e?rEfN&d{Z0KvNl;Sl' );
define( 'LOGGED_IN_SALT',   'w_2})i/`2*yp@3(qk.yhYK?XZSx4kfiU.CJ/:W*_Ul.&xmT<Q%fD+r8!kX6*BJ&{' );
define( 'NONCE_SALT',       '6QX-u4,i|5wbFZ9>mj$8ga4?)w|buxTRF@Fxfwj{^vd&}-pt.+Vm-#afn[ulPq}O' );

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


/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
