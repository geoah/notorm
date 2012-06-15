<?php
namespace Software\Entity;

class Author extends \NotORM_Entity {
	function getName() {
		return '(' . $this->row['name'] . ')';
	}
}
