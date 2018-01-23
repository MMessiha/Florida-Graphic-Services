<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'fgs175806191217');

/** MySQL database username */
define('DB_USER', '561_media');

/** MySQL database password */
define('DB_PASSWORD', '561_media');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         ' Kz>@,-otmHaWv]8sv}GBPOHFA32$i&|#-*3C5cpxG^Gr_%u~LahL3Z!<K{-u[ 3');
define('SECURE_AUTH_KEY',  'HUpx*hJ]P!@fd_KM_uf}0G?s*_oj22jq,P|LfAK6u73#%TYFX8iO/a-Ej7%$Di(m');
define('LOGGED_IN_KEY',    'q2q$3iCR9}r8;>Qs|o=if4|Sqyhc#Rvm_dXD}pWdjfE]3-^4Y+3-AMbLxH9 0S9F');
define('NONCE_KEY',        'V(2f^0Ju[POzJ}-SPK,i<}cY9hz=|f,oeOKfZ[4Y9wl4c[}Kq!q&8hcLg|j-Lgwv');
define('AUTH_SALT',        'S#xy$9$<|(;kl$YC)fIg,|]/2+-*|[gZ:2n(aFWJ$w|T~+0/;^P+Ugaq>@%2<<ex');
define('SECURE_AUTH_SALT', 'D(gY|Z(&{t BmQgo)VW-2BRWv8d.3B `V/x->W=+k,3+uLqOx1eo%->/M~AJ$AY<');
define('LOGGED_IN_SALT',   'XB?>^oBE`z/F ^)%w{qQc~vT|%+,0kbP*BvRR,qQopJj^V),+h=C#sb-Hrbf{&jK');
define('NONCE_SALT',       'OOhC>Pc[bq4!kZpv!rTw3{,@W T7zf0HmXzs|UB]@cN`7@1ITYu^wqa=>W5JIPVl');


$table_prefix = 'wp_';





define('ALLOW_UNFILTERED_UPLOADS', true);
define('WP_MEMORY_LIMIT','64M');
define('WP_DEBUG', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('FS_METHOD','direct');
