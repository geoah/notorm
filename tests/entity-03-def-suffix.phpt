--TEST--
Define suffix
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";

$entityMapper = new NotORM_Entity_Mapper_Convention('', '%s_Entity');
$software = new NotORM($connection, null, null, $entityMapper);

class Author_Entity extends NotORM_Entity {
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
