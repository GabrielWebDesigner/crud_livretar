<?php
if (!defined('DB_NAME')) {
    define('DB_NAME', 'wda_catalog');
}

if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}

if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

if (!defined('BASEURL')) {
    define('BASEURL', '/crud_library/');
}

if (!defined('DBAPI')) {
    define('DBAPI', ABSPATH . 'inc/database.php');
}

if (!defined('HEADER_TEMPLATE')) {
    define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
}

if (!defined('FOOTER_TEMPLATE')) {
    define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
}

if (!defined('DB_SERVER')) {
    define('DB_SERVER', 'localhost');
}

if (!defined('DB_DATABASE')) {
    define('DB_DATABASE', 'your_database_name');
}
?>
