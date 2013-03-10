<?php
 
namespace PHPQTI\Model;

use PHPQTI\Model\Base\InlineStatic;
use PHPQTI\Model\Base\FlowStatic;
use PHPQTI\Model\Base\BodyElement;
use PHPQTI\Model\Base\SimpleInline;

class Tt extends \PHPQTI\Model\Gen\Tt implements SimpleInline, BodyElement, FlowStatic, InlineStatic {

    protected $_elementName = 'tt';

    
}