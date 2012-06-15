--TEST--
Entity does not brake basic operations
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";

$EntityMapper = new NotORM_Entity_Mapper_Convention;
$software = new NotORM($connection, null, null, $EntityMapper);

foreach ($software->application() as $application) {
	echo "$application[title] (" . $application->author["name"] . ")\n";
	foreach ($application->application_tag() as $application_tag) {
		echo "\t" . $application_tag->tag["name"] . "\n";
	}
}
?>
--EXPECTF--
Adminer (Jakub Vrana)
	PHP
	MySQL
JUSH (Jakub Vrana)
	JavaScript
Nette (David Grudl)
	PHP
Dibi (David Grudl)
	PHP
	MySQL
