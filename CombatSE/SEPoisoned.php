<?php

include_once "RPGCombatStatusEffect.php";

class SEPoisoned extends RPGCombatStatusEffect{
	
	public function SEPoisoned($objGiver, $objReceiver, $intRemainingTurns, $strEntityName){
		parent::__construct($objGiver, $objReceiver, $intRemainingTurns, $strEntityName);
	}
	
	public function trigger(){
		$intDamage = parent::getReceiver()->takeDamage(3);
		if(parent::getReceiver()->isDead()){
			parent::endEffect();
		}
		else{
			$strCombatMessage = parent::getReceiver()->getNPCName() . " suffers from " . $intDamage . " poison damage. ";
			$_SESSION['objCombat']->writeCombatMessage(parent::getEntityName(), $strCombatMessage);
			parent::tick();
		}
	}
	
}

?>