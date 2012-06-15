--TEST--
Define entities
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";

$entityMapper = new NotORM_Entity_Mapper_Convention;
$software = new NotORM($connection, null, null, $entityMapper);

class Author extends NotORM_Entity {
	function getName() {
		return 'author: ' . $this->row['name'];
	}
}

class Application extends NotORM_Entity {
	function getTitle() {
		return 'app: ' . $this->row['title'];
	}
}

class Tag extends NotORM_Entity {
	function getName() {
		return 'tag: ' . $this->row['name'];
	}
}


foreach ($software->application() as $application) {
	echo "$application[title] (" . $application->author["name"] . ")\n";
	foreach ($application->application_tag() as $application_tag) {
		echo "\t" . $application_tag->tag["name"] . "\n";
	}
}
?>
--EXPECTF--
app: Adminer (author: Jakub Vrana)
	tag: PHP
	tag: MySQL
app: JUSH (author: Jakub Vrana)
	tag: JavaScript
app: Nette (author: David Grudl)
	tag: PHP
app: Dibi (author: David Grudl)
	tag: PHP
	tag: MySQL
