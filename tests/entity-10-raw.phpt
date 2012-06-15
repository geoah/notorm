--TEST--
Set and get raw data
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";

$entityMapper = new NotORM_Entity_Mapper_Convention('', '%s10');
$software = new NotORM($connection, null, null, $entityMapper);

class Author10 extends NotORM_Entity {
	
	public function getName() {
		return '[' . $this->row['name'] . ']';
	}
	
	public function setName($value) {
		$this->row['name'] = $value . ' setter';
	}
}

$author = $software->author[11];

echo "$author[name]\n";
echo $author->getRaw('name') . "\n";
$author['name'] = 'John Doe';
echo "$author[name]\n";
$author->setRaw('name', 'John Doe');
echo "$author[name]\n";

?>
--EXPECTF--
[Jakub Vrana]
Jakub Vrana
[John Doe setter]
[John Doe]
