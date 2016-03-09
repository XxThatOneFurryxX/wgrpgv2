<?php

class DisplayCharacterInfo{

	public function DisplayCharacterInfo(){
	
	}
	
	public function toHTML(){
		ob_start(); ?>
		
			<div class='characterDiv hidden' id='characterDivInfo'>
				<table align='center'>
					<tr>
						<th class='tableHeader borderBottom statHeader' colspan='2'>Basic Stats</th>
					</tr>
					<tr>
						<td class='background0'>Name:</td><td class='background0' id='charName'><?=$_SESSION['objRPGCharacter']->getRPGCharacterName()?></td>
					</tr>
					<tr>
						<td class='background1'>Gender:</td><td class='background1' id='charGender'><?=$_SESSION['objRPGCharacter']->getGender()?></td>
					</tr>
					<tr>
						<td class='background0'>Sexual Orientation:</td><td class='background0' id='charOrientation'><?=$_SESSION['objRPGCharacter']->getOrientation()?></td>
					</tr>
					<tr>
						<td class='background1'>Personality:</td><td class='background1' id='charPersonality'><?=$_SESSION['objRPGCharacter']->getPersonality()?></td>
					</tr>
					<tr>
						<td class='background0'>Stance on Fat:</td><td class='background0' id='charFatStance'><?=$_SESSION['objRPGCharacter']->getFatStance()?></td>
					</tr>
					<tr>
						<td class='borderTop' colspan='2'>&nbsp;</td>
					</tr>
				</table>
				<table align='center'>
					<tr>
						<th class='tableHeader borderBottom statHeader' colspan='2'>Body Stats</th>
					</tr>
					<tr>
						<td class='background0'>Height:</td><td class='background0' id='charHeight'><?=$_SESSION['objRPGCharacter']->getHeightInFeet()?></td>
					</tr>
					<tr>
						<td class='background1'>Weight:</td><td class='background1' id='charWeight'><?=round($_SESSION['objRPGCharacter']->getWeight(), 2)?> lbs</td>
					</tr>
					<tr>
						<td class='background0'>Digestion Rate:</td><td class='background0' id='charDigestion'><?=$_SESSION['objRPGCharacter']->getDigestionRate()?> cal/tick</td>
					</tr>
					<tr>
						<td class='borderTop' colspan='2'>&nbsp;</td>
					</tr>
				</table>
				<table align='center'>
					<tr>
						<th class='tableHeader borderBottom statHeader' colspan='2'>Combat Stats</th>
					</tr>
					<?php if($_SESSION['objRPGCharacter']->getStatPoints() != 0 && !$_SESSION['objUISettings']->getDisableStats()){?>
						<form method='post' action='changeEventWindow.php'>
							<tr><td>You have <span id='unspentStats'><?=$_SESSION['objRPGCharacter']->getStatPoints()?></span> unspent stat points!</td><td><button type='submit'>Spend</button></td></tr>
							<input type='hidden' name='changeTo' value='StatGain'/>
						</form>
					<?php } ?>
					<tr>
						<td class='background0'>Level:</td><td class='background0' id='charLevel'><?=$_SESSION['objRPGCharacter']->getLevel()?></td>
					</tr>
					<tr>
						<td class='background1'>Experience:</td><td class='background1' id='charExperience'>
						<?=$_SESSION['objRPGCharacter']->getExperience()?> / <?=$_SESSION['objRPGCharacter']->getRequiredExperience()?></td>
					</tr>
					<tr>
						<td class='background0'>Current HP:</td><td class='background0' id='charMaxHP'><?=max(0, $_SESSION['objRPGCharacter']->getCurrentHP())?> / <?=$_SESSION['objRPGCharacter']->getModifiedMaxHP()?></td>
					</tr>
					<tr>
						<td class='background1'>Strength:</td><td class='background1' id='charStrength'>
							<?php $intCombinedStrength = $_SESSION['objRPGCharacter']->getStats()->getBaseStats()['intStrength'] + $_SESSION['objRPGCharacter']->getStats()->getAbilityStats()['intStrength']; ?>
							<?=$intCombinedStrength?>
						</td>
					</tr>
					<tr>
						<td class='background0'>Intelligence:</td><td class='background0' id='charIntelligence'>
							<?php $intCombinedIntelligence = $_SESSION['objRPGCharacter']->getStats()->getBaseStats()['intIntelligence'] + $_SESSION['objRPGCharacter']->getStats()->getAbilityStats()['intIntelligence']; ?>
							<?=$intCombinedIntelligence?>
						</td>
					</tr>
					<tr>
						<td class='background1'>Agility:</td><td class='background1' id='charAgility'>
							<?php $intCombinedAgility = $_SESSION['objRPGCharacter']->getStats()->getBaseStats()['intAgility'] + $_SESSION['objRPGCharacter']->getStats()->getAbilityStats()['intAgility']; ?>
							<?=$intCombinedAgility?>
						</td>
					</tr>
					<tr>
						<td class='background0'>Vitality:</td><td class='background0' id='charVitality'>
							<?php $intCombinedVitality = $_SESSION['objRPGCharacter']->getStats()->getBaseStats()['intVitality'] + $_SESSION['objRPGCharacter']->getStats()->getAbilityStats()['intVitality']; ?>
							<?=$intCombinedVitality?>
						</td>
					</tr>
					<tr>
						<td class='background1'>Willpower:</td><td class='background1' id='charWillpower'>
							<?php $intCombinedWillpower = $_SESSION['objRPGCharacter']->getStats()->getBaseStats()['intWillpower'] + $_SESSION['objRPGCharacter']->getStats()->getAbilityStats()['intWillpower']; ?>
							<?=$intCombinedWillpower?>
						</td>
					</tr>
					<tr>
						<td class='background0'>Dexterity:</td><td class='background0' id='charDexterity'>
							<?php $intCombinedDexterity = $_SESSION['objRPGCharacter']->getStats()->getBaseStats()['intDexterity'] + $_SESSION['objRPGCharacter']->getStats()->getAbilityStats()['intDexterity']; ?>
							<?=$intCombinedDexterity?>
						</td>
					</tr>
					<tr>
						<td class='borderTop' colspan='2'>&nbsp;</td>
					</tr>
				</table>
				<table align='center'>
					<tr>
						<tr>
						<th class='tableHeader borderBottom statHeader' colspan='2'>Status Effects</th>
					</tr>
					<?php
						$arrStatusEffectList = $_SESSION['objRPGCharacter']->getStatusEffectList();
						if(!empty($arrStatusEffectList)){
							$intCounter = 0;
							foreach($arrStatusEffectList as $key => $objStatusEffect){
								echo
								"<tr>
									<td class='background" . ($intCounter % 2) . "'>" . $objStatusEffect->getStatusEffectName() . "</td>
								</tr>";
								$intCounter++;
							}
						}
						else{
							echo "<tr><td class='background1'>None</td></tr>";
						}
					?>
					<tr>
						<td class='borderTop' colspan='2'>&nbsp;</td>
					</tr>
				</table>
			</div>
		
		<?php
		$strHTML = ob_get_contents();
		ob_end_clean();
		
		echo $strHTML;
	}

}

?>