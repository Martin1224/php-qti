<?php
 
namespace PHPQTI\Model;
 
use PHPQTI\Model\Base\Expression;

class Match extends \PHPQTI\Model\Gen\Match implements Expression {

    protected $_elementName = 'match';

    public function __invoke($controller) {
        $val1 = $this->_children[0]($controller);
        $val2 = $this->_children[1]($controller);
    
        return $val1->match($val2);
    }
}