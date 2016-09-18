UPDATE tblcharacteritemxr SET blnEquipped = 0 WHERE intItemID = 15;
DELETE FROM tblcharactereventxr WHERE intEventID = 2;
ALTER TABLE `tblrpgcharacter` ADD `blnLikesFatSelf` TINYINT(1) NOT NULL DEFAULT '1' AFTER `strFatStance`;
ALTER TABLE `tblrpgcharacter` ADD `blnLikesFatOthers` TINYINT(1) NOT NULL DEFAULT '1' AFTER `blnLikesFatSelf`;
UPDATE tblrpgcharacter SET blnLikesFatSelf = 0 WHERE strFatStance IN ('Negative', 'Neutral');
UPDATE tblrpgcharacter SET blnLikesFatOthers = 0 WHERE strFatStance IN ('Negative', 'Neutral');
ALTER TABLE `tblrpgcharacter` DROP `strFatStance`;
ALTER TABLE `tblnpcskillxr` ADD `intReqLevel` INT NOT NULL DEFAULT '1' AFTER `intSkillID`;
INSERT INTO `dbwgrpg`.`tblenchant` (`intEnchantID`, `strEnchantName`, `strEnchantType`, `dtmCreatedOn`, `strCreatedBy`, `dtmModifiedOn`, `strModifiedBy`) VALUES (NULL, 'Resilient', 'Prefix', '2016-09-11 00:00:00', 'admin', NULL, NULL);
ALTER TABLE `tblenchantstatchanges` CHANGE `intStatusEffectID` `intStatusEffectID` INT(11) NULL;
INSERT INTO `dbwgrpg`.`tblenchantstatchanges` (`intEnchantStatChangeID`, `intEnchantID`, `strStatName`, `intStatChangeMin`, `intStatChangeMax`, `intStatusEffectID`) VALUES (NULL, '3', 'Willpower', '0', '10', NULL);
INSERT INTO `dbwgrpg`.`tblevent` (`intEventID`, `strEventName`, `txtEventDesc`, `strXML`, `strEventType`, `blnRepeating`, `dtmCreatedOn`, `strCreatedBy`, `dtmModifiedOn`, `strModifiedBy`) VALUES (NULL, 'Seraphine 2nd Convo', 'Seraphine''s 2nd conversation.', 'seraphine2.xml', 'Event', '0', '2016-09-11 00:00:00', 'admin', NULL, NULL);
INSERT INTO `dbwgrpg`.`tbleventconversation` (`intEventConversationID`, `intEventID`, `intNPCID`, `intConversationLevel`) VALUES (NULL, '27', '2', '1');
INSERT INTO `dbwgrpg`.`tblflooreventxr` (`intFloorEventXRID`, `intFloorID`, `intEventID`, `intOccurrenceRating`, `intCountPerFloor`) VALUES (NULL, '2', '27', '1000', '1');
INSERT INTO `dbwgrpg`.`tblfloornpcxr` (`intFloorNPCXRID`, `intFloorID`, `intNPCID`, `intOccurrenceRating`) VALUES (NULL, '2', '2', '9999');
INSERT INTO `dbwgrpg`.`tblitem` (`intItemID`, `strItemName`, `txtItemDesc`, `strItemType`, `strHandType`, `intCalories`, `intHPHeal`, `intDamage`, `intMagicDamage`, `intDefence`, `intMagicDefence`, `intWaitTime`, `intFullness`, `strStatDamage`, `strFileName`, `intSellPrice`, `strCreatedBy`, `dtmCreatedOn`, `strModifiedBy`, `dtmModifiedOn`) VALUES (NULL, 'Battle Wand', 'A wand that resembles a club with a large rugged head instead of the usual narrow tip. This wand sacrifices magical capacity for the slight advantage in a melee.', 'Weapon:Wand', 'Primary', NULL, '0', NULL, '4', NULL, NULL, '10', NULL, 'Intelligence', NULL, '5', 'admin', '2016-09-17 00:00:00', NULL, NULL);
INSERT INTO `dbwgrpg`.`tblitem` (`intItemID`, `strItemName`, `txtItemDesc`, `strItemType`, `strHandType`, `intCalories`, `intHPHeal`, `intDamage`, `intMagicDamage`, `intDefence`, `intMagicDefence`, `intWaitTime`, `intFullness`, `strStatDamage`, `strFileName`, `intSellPrice`, `strCreatedBy`, `dtmCreatedOn`, `strModifiedBy`, `dtmModifiedOn`) VALUES (NULL, 'Hypno Staff', 'A staff with a unique property: Powerful sleep magic is injected into its wood, granting a chance at putting your enemies to sleep with any magic spell.', 'Weapon:Staff', 'Both', NULL, '0', '0', '6', NULL, NULL, '15', NULL, 'Intelligence', NULL, '25', 'admin', '2016-09-17 00:00:00', NULL, NULL);
UPDATE `dbwgrpg`.`tblitem` SET `strFileName` = 'HypnoStaff' WHERE `tblitem`.`intItemID` = 46;
INSERT INTO `dbwgrpg`.`tblevent` (`intEventID`, `strEventName`, `txtEventDesc`, `strXML`, `strEventType`, `blnRepeating`, `dtmCreatedOn`, `strCreatedBy`, `dtmModifiedOn`, `strModifiedBy`) VALUES (NULL, 'Trapped Chest', 'Player comes across a locked chest and is given the opportunity to disarm the trap or avoid it.', 'lockedchest.xml', 'Event', '1', '2016-09-17 00:00:00', 'kestrel', NULL, NULL);
INSERT INTO `dbwgrpg`.`tblflooreventxr` (`intFloorEventXRID`, `intFloorID`, `intEventID`, `intOccurrenceRating`, `intCountPerFloor`) VALUES (NULL, '1', '28', '1000', '1');
INSERT INTO `dbwgrpg`.`tbleventitemxr` (`intEventItemXRID`, `intEventID`, `intItemID`, `intDrawGroup`, `intOccurrenceRating`) VALUES (NULL, '28', '18', '1', '1000'), (NULL, '28', '45', '1', '5000');