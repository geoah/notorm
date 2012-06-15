--TEST--
Define namespace, prefix, array mapper
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
include_once 'entity-07-inc.php';

$entityMapper = new NotORM_Entity_Mapper_Convention('Entity\\', '%sModel', array('author' => 'User'));
$software = new NotORM($connection, null, null, $entityMapper);

foreach ($software->author() as $author) {
	echo "$author[id] $author[name]\n";
}
?>
--EXPECTF--
11 (Jakub Vrana)
12 (David Grudl)
