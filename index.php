<?php
#
# include configuration: include configuration file, containing 
# database access info and all.
include('configurations.php');
include('autoload.php');

#including mvc and data-structure files
define('JAMBURA_MVC', 'vendor/prepmock/jambura-core/src/mvc');
define('JAMBURA_DS', 'vendor/prepmock/jambura-core/src/data-structure');

foreach (glob(JAMBURA_MVC . '/*' . EXT) as $filename) {
    include $filename;
}

foreach (glob(JAMBURA_DS . '/*' . EXT) as $filename) {
    include $filename;
}

# Register autoloader
spl_autoload_register('jamburaAutoload');
#
# define Paths
define('JAMBURA_CORE', 'vendor/prepmock/jambura-core/src/helpers');
define('JAMBURA_MODS', 'applications/models/');
define('JAMBURA_CONTROLLERS', 'applications/controllers/');
define('JAMBURA_VIEWS', 'applications/views/');
define('JAMBURA_VENDORS', 'applications/vendors/');
define('JAMBURA_CLASSES', 'applications/classes/');
define('JAMBURA_TEMPLATES', 'templates/');
define('JAMBURA_MOD', 'PROD');
#
# include all required php libraries.
# include third party libraries
include(JAMBURA_VENDORS.'idiorm/idiorm.php');
# include core libraries
foreach (glob(JAMBURA_CORE.'/*'.EXT) as $filename) {
    include $filename;
}

#
# configure ORM
ORM::configure('mysql:host='.DB_SERVER.';dbname='.DB_NAME);
ORM::configure('username', DB_SERVER_USERNAME);
ORM::configure('password', DB_SERVER_PASSWORD);
#
# check controller and actions: render default page if controller
# or action is not found.
#
try {
    (new jRouter())->route()->display();
} catch (Exception $e) {
    if (JAMBURA_MOD == 'DEV') {
        echo $e->getMessage().'<br>';
        echo $e->getTraceAsString().'<br>';
    } else {
        include('404.html');
    }
}
