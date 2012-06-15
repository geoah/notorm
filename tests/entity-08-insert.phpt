--TEST--
Define namespace, prefix, array mapper
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";

$entityMapper = new NotORM_Entity_Mapper_Convention('', '%s08');
$software = new NotORM($connection, null, null, $entityMapper);

class Author08 extends NotORM_Entity {
	function getName() {
		return 'author: ' . $this->row['name'];
	}
}

$author = $software->author()->insert(array(
	'id' => 13,
	'name' => 'John Doe',
	'web' => 'http://www.johndoe.com',
));

echo get_class($author) . "\n";
echo "$author[id], $author[name], $author[web]\n";

$author->delete();

?>
--EXPECTF--
Author08
13, author: John Doe, http://www.johndoe.com
