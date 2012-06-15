<?php
namespace Entity;

class UserModel extends \NotORM_Entity {
	function getName() {
		return '(' . $this->row['name'] . ')';
	}
}
