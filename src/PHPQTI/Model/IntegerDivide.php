<?php
 
namespace PHPQTI\Model;
 
use PHPQTI\Model\Base\Expression;

class IntegerDivide extends \PHPQTI\Model\Gen\IntegerDivide implements Expression {

    protected $_elementName = 'integerDivide';

    public function __invoke($controller) {
        $val1 = $this->_children[0]($controller);
        $val2 = $this->_children[1]($controller);
    
        return $val1->integerDivide($val2);
    }
}