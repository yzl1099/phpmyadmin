<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Database structure manipulation
 *
 * @package PhpMyAdmin
 */

namespace PMA;

use PMA\libraries\controllers\database\DatabaseStructureController;
use PhpMyAdmin\Response;
use PMA\libraries\Util;

require_once 'libraries/common.inc.php';
require_once 'libraries/db_common.inc.php';

$container = libraries\di\Container::getDefaultContainer();
$container->factory(
    'PMA\libraries\controllers\database\DatabaseStructureController'
);
$container->alias(
    'DatabaseStructureController',
    'PMA\libraries\controllers\database\DatabaseStructureController'
);
$container->set('PhpMyAdmin\Response', Response::getInstance());
$container->alias('response', 'PhpMyAdmin\Response');

/* Define dependencies for the concerned controller */
$dependency_definitions = array(
    'db' => $db,
);

/** @var DatabaseStructureController $controller */
$controller = $container->get(
    'DatabaseStructureController',
    $dependency_definitions
);
$controller->indexAction();
