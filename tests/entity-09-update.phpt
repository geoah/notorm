--TEST--
Setter
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";

$entityMapper = new NotORM_Entity_Mapper_Convention('', '%s09');
$software = new NotORM($connection, null, null, $entityMapper);

class Author09 extends NotORM_Entity {
	function getName() {
		return 'author: ' . $this->row['name'];
	}
	
	function setName($value) {
		$this->row['name'] = $value . ' (setter)';
	}
}

$author = $software->author[11];
echo "$author[name]\n";
$author['name'] = 'Jon Doe';
echo "$author[name]\n";

?>
--EXPECTF--
author: Jakub Vrana
author: Jon Doe (setter)
