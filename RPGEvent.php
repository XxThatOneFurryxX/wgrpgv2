<?php

require_once "Database.php";

class RPGEvent{

	private $_intEventID;
	private $_strEventName;
	private $_txtEventDesc;
	private $_strXML;
	private $_strEventType;
	private $_blnRepeating;
	private $_blnForcedEvent;
	private $_dtmCreatedOn;
	private $_strCreatedBy;
	private $_dtmModifiedOn;
	private $_strModifiedBy;
	
	public function RPGEvent($intEventID = null){
		if($intEventID){
			$this->loadEventInfo($intEventID);
		}
	}
	
	private function populateVarFromRow($arrEventInfo){
		$this->setEventID($arrEventInfo['intEventID']);
		$this->setEventName($arrEventInfo['strEventName']);
		$this->setEventDesc($arrEventInfo['txtEventDesc']);
		$this->setXML($arrEventInfo['strXML']);
		$this->setEventType($arrEventInfo['strEventType']);
		$this->setRepeating($arrEventInfo['blnRepeating']);
		$this->setForcedEvent($arrEventInfo['blnForcedEvent']);
		$this->setCreatedOn($arrEventInfo['dtmCreatedOn']);
		$this->setCreatedBy($arrEventInfo['strCreatedBy']);
		$this->setModifiedOn($arrEventInfo['dtmModifiedOn']);
		$this->setModifiedBy($arrEventInfo['strModifiedBy']);
	}
	
	private function loadEventInfo($intEventID){
		$objDB = new Database();
		$arrEventInfo = array();
			$strSQL = "SELECT *
						FROM tblevent
							WHERE intEventID = " . $objDB->quote($intEventID);
			$rsResult = $objDB->query($strSQL);
			while ($arrRow = $rsResult->fetch(PDO::FETCH_ASSOC)){
				$arrEventInfo['intEventID'] = $arrRow['intEventID'];
				$arrEventInfo['strEventName'] = $arrRow['strEventName'];
				$arrEventInfo['txtEventDesc'] = $arrRow['txtEventDesc'];
				$arrEventInfo['strXML'] = $arrRow['strXML'];
				$arrEventInfo['strEventType'] = $arrRow['strEventType'];
				$arrEventInfo['blnRepeating'] = $arrRow['blnRepeating'];
				$arrEventInfo['blnForcedEvent'] = $arrRow['blnForcedEvent'];
				$arrEventInfo['dtmCreatedOn'] = $arrRow['dtmCreatedOn'];
				$arrEventInfo['strCreatedBy'] = $arrRow['strCreatedBy'];
				$arrEventInfo['dtmModifiedOn'] = $arrRow['dtmModifiedOn'];
				$arrEventInfo['strModifiedBy'] = $arrRow['strModifiedBy'];
			}
		$this->populateVarFromRow($arrEventInfo);
	}
	
	public function getLinkName($intLocationID){
		$objDB = new Database();
		$strSQL = "SELECT strLinkName
					FROM tbllocationeventlink
						WHERE intLocationID = " . $objDB->quote($intLocationID) . "
							AND intEventID = " . $objDB->quote($this->_intEventID);
		$rsResult = $objDB->query($strSQL);
		$arrRow = $rsResult->fetch(PDO::FETCH_ASSOC);
		return $arrRow['strLinkName'];
	}
	
	public function getEventID(){
		return $this->_intEventID;
	}
	
	public function setEventID($intEventID){
		$this->_intEventID = $intEventID;
	}
	
	public function getEventName(){
		return $this->_strEventName;
	}
	
	public function setEventName($strEventName){
		$this->_strEventName = $strEventName;
	}
	
	public function getEventDesc(){
		return $this->_txtEventDesc;
	}
	
	public function setEventDesc($txtEventDesc){
		$this->_txtEventDesc = $txtEventDesc;
	}
	
	public function getXML(){
		return $this->_strXML;
	}
	
	public function setXML($strXML){
		$this->_strXML = $strXML;
	}
	
	public function getEventType(){
		return $this->_strEventType;
	}
	
	public function setEventType($strEventType){
		$this->_strEventType = $strEventType;
	}
	
	public function getRepeating(){
		return $this->_blnRepeating;
	}
	
	public function setRepeating($blnRepeating){
		$this->_blnRepeating = $blnRepeating;
	}
	
	public function getForcedEvent(){
		return $this->_blnForcedEvent;
	}
	
	public function setForcedEvent($blnForcedEvent){
		$this->_blnForcedEvent = $blnForcedEvent;
	}
	
	public function getCreatedOn(){
		return $this->_dtmCreatedOn;
	}
	
	public function setCreatedOn($dtmCreatedOn){
		$this->_dtmCreatedOn = $dtmCreatedOn;
	}
	
	public function getCreatedBy(){
		return $this->_strCreatedBy;
	}
	
	public function setCreatedBy($strCreatedBy){
		$this->_strCreatedBy = $strCreatedBy;
	}
	
	public function getModifiedOn(){
		return $this->_dtmModifiedOn;
	}
	
	public function setModifiedOn($dtmModifiedOn){
		$this->_dtmModifiedOn = $dtmModifiedOn;
	}
	
	public function getModifiedBy(){
		return $this->_strModifiedBy;
	}
	
	public function setModifiedBy($strModifiedBy){
		$this->_strModifiedBy = $strModifiedBy;
	}
}

?>