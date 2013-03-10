<?php
 
namespace PHPQTI\Model;
 
use PHPQTI\Model\Base\InlineStatic;
use PHPQTI\Model\Base\FlowStatic;
use PHPQTI\Model\Base\BodyElement;
use PHPQTI\Model\Base\SimpleInline;

class A extends \PHPQTI\Model\Gen\A implements SimpleInline, BodyElement, FlowStatic, InlineStatic {

    protected $_elementName = 'a';

    
}