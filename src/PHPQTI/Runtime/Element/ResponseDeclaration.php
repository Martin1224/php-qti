<?php

namespace PHPQTI\Runtime\Element;

use PHPQTI\Runtime\Processing\Variable;

class ResponseDeclaration extends VariableDeclaration {
	
	public function setVariable($controller, $result) {
		$controller->response[$this->attrs['identifier']] = $result;
	}
	
}