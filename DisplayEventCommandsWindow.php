<?php

class DisplayEventCommandsWindow{

	public function DisplayEventCommandsWindow(){
		
	}
	
	public static function toHTML(){
		ob_start(); ?>
		
			<div class='commandsDiv' id='commandsDivEventCommands'>
				<form method='post' action='command.php'>
					<?php
					$objEvent = new RPGEvent($_SESSION['objRPGCharacter']->getEventID());
					$objXML = new RPGXMLReader($objEvent->getXML());
					$intCounter = 0;
					foreach($objXML->getCommandList($_SESSION['objRPGCharacter']->getEventNodeID()) as $key => $value){
						if(($objXML->hasCommandPrecondition($_SESSION['objRPGCharacter']->getEventNodeID(), $intCounter) == true && DialogConditionFactory::evaluateCondition($objXML->getCommandPrecondition($_SESSION['objRPGCharacter']->getEventNodeID(), $intCounter)) == true)
						|| $objXML->hasCommandPrecondition($_SESSION['objRPGCharacter']->getEventNodeID(), $intCounter) == false){
							if($objXML->hasCommandAction($_SESSION['objRPGCharacter']->getEventNodeID(), $intCounter) == true){
								echo "<input type='hidden' name='eventAction" . $objXML->getCommandID($_SESSION['objRPGCharacter']->getEventNodeID(), $intCounter) . "' value='" . $objXML->getCommandAction($_SESSION['objRPGCharacter']->getEventNodeID(), $intCounter) . "'/>";
								$_SESSION['previousCommand'] = $_SESSION['objRPGCharacter']->getEventNodeID();
							}
							echo "<button type='submit' name='command' value='" . $objXML->getCommandID($_SESSION['objRPGCharacter']->getEventNodeID(), $intCounter) . "'>" . $value . "</button>";
							$intCounter++;
						}
					}
					?>
				</form>
			</div>
		
		<?php
		$strHTML = ob_get_contents();
		ob_end_clean();
		
		echo $strHTML;
	}

}

?>