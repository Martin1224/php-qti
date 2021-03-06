<?php
 
namespace PHPQTI\Model;

use PHPQTI\Model\Base\Interaction;
use PHPQTI\Model\Base\Flow;
use PHPQTI\Model\Base\Block;
use PHPQTI\Model\Base\BlockInteraction;

class OrderInteraction extends \PHPQTI\Model\Gen\OrderInteraction 
    implements BlockInteraction, Block, Flow, Interaction {

    protected $_elementName = 'orderInteraction';

    public function __invoke($controller) {
    	$variableName = $this->responseIdentifier;
    	$result = "<div id=\"orderInteraction_{$variableName}\" class=\"qti_blockInteraction\">";
    
    	// Work out what kind of HTML tag will be used for simpleChoices
    	if (!isset($controller->response[$variableName])) {
    		throw new Exception("Declaration for $variableName not found");
    	}
    
    	$responseVariable = $controller->response[$variableName];
    	$simpleChoiceType = 'input';
    	$brackets = ''; // we need brackets for multiple responses
    
    	$this->simpleChoice = array();
    	$this->fixed = array();
    
    	// Count simple choices
    	$numberOfChoices = 0;
    	foreach($this->_children as $child) {
    		if ($child instanceof SimpleChoice) {
    			$numberOfChoices++;
    		}
    	}
    	// Process child nodes
    	foreach($this->_children as $child) {
    		if ($child instanceof Prompt) {
    			$this->prompt = $child;
    		} else if ($child instanceof SimpleChoice) {
    			$child->inputType = 'input';
    			$child->interactionType = 'orderInteraction';
    			$child->name = $variableName.$brackets;
    			$child->numberOfChoices = $numberOfChoices;
    			$this->simpleChoice[] = $child;
    			if(isset($child->fixed) && $child->fixed === 'true') {
    				$this->fixed[] = count($this->simpleChoice) - 1;
    			}
    		}
    	}
    	$result .= $this->prompt->__invoke($controller);
    
    	// Work out an order to display them in
    	// TODO: Worst implementation ever!
    	$order = range(0, count($this->simpleChoice) - 1);
    	if ($this->shuffle === 'true') {
    		$notfixed = array_diff($order, $this->fixed);
    		shuffle($notfixed);
    		$shuffledused = 0;
    		for($i = 0; $i < count($this->simpleChoice); $i++) {
    			if(in_array($i, $this->fixed)) {
    				$result .= $this->simpleChoice[$i]->__invoke($controller);
    			} else {
    				$result .= $this->simpleChoice[$notfixed[$shuffledused++]]->__invoke($controller);
    			}
    		}
    	} else {
    		foreach($order as $i) {
    			$result .= $this->simpleChoice[$i]->__invoke($controller);
    		}
    	}
   
    	$result .= "</div>";
    	return $result;
    }
}