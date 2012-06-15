--TEST--
Define prefix, array mapper
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";

$entityMapper = new NotORM_Entity_Mapper_Convention('', 'Entity%s', array('author' => 'User'));
$software = new NotORM($connection, null, null, $entityMapper);

class EntityUser extends NotORM_Entity {
	function getName() {
		return '(' . $this->row['name'] . ')';
	}
}

foreach ($software->author() as $author) {
	echo "$author[id] $author[name]\n";
}
?>
--EXPECTF--
11 (Jakub Vrana)
12 (David Grudl)
