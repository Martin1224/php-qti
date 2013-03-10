<?php
 
namespace PHPQTI\Model;
 
use PHPQTI\Model\Base\Expression;

class Gte extends \PHPQTI\Model\Gen\Gte implements Expression {

    protected $_elementName = 'gte';

    public function __invoke($controller) {
        $val1 = $this->_children[0]($controller);
        $val2 = $this->_children[1]($controller);
    
        return $val1->gte($val2);
    }
}