<?php
class Profile extends MySqlDb {
	var $m_intId;
	var $m_strName;
	var $m_strDescription;
	var $m_strAddress;
	var $m_strEmailAddress;
	var $m_strMobile;
	var $m_strInterest;
	var $m_strPrimaryPhoto;
	
	function voidSetId($intValue) {
		$this -> m_intId = $intValue;
	}
	
	function voidGetId() {
		return $this -> m_intId;
	}
	
	function voidSetName($strValue) {
		$this -> m_strName = $strValue;
	}
	
	function strGetName() {
		return $this -> m_strName;
	}
	
	function voidSetDescription($strValue) {
		$this -> m_strDescription = $strValue;
	}
	
	function strGetDescription() {
		return $this -> m_strDescription;
	}
	
	function voidSetAddress($strValue) {
		$this -> m_strAddress = $strValue;
	}
	
	function strGetAddress() {
		return $this -> m_strAddress;
	}
	

	function voidSetEmailAddress($strValue) {
		$this -> m_strEmailAddress = $strValue;
	}
	
	function strGetEmailAddress() {
		return $this -> m_strEmailAddress;
	}	
	
	function voidSetMobile($strValue) {
		$this -> m_strMobile = $strValue;
	}
	
	function strGetMobile() {
		return $this -> m_strMobile;
	}
	
	function voidSetInterest($strValue) {
		$this -> m_strInterest = $strValue;
	}
	
	function strGetInterest() {
		return $this -> m_strInterest;
	}
	
	function voidSetPrimaryPhoto($strValue) {
	    $this -> m_strPrimaryPhoto = $strValue;
	}
	
	function strGetPrimaryPhoto() {
	    return $this -> m_strPrimaryPhoto;
	}
	
	function voidSetProfileInformation() {
		if ($this -> checkProfile() == true) {
			$strSql = 'UPDATE tblProfile SET fprName = "'.$this -> m_strName.'", fprDescription = "'.$this -> m_strDescription.'", fprAddress = "'.$this -> m_strAddress.'",
			           fprEmailAddress = "'.$this -> m_strEmailAddress.'", fprMobile = "'.$this -> m_strMobile.'", fprPrimaryPhoto = "'.$this -> m_strPrimaryPhoto.'"';
		} else {
			$strSql = 'INSERT INTO tblProfile (fprName, fprDescription, fprAddress, fprEmailAddress, fprMobile, fprPrimaryPhoto) 
				   VALUES ("'.$this -> m_strName.'", "'.$this -> m_strDescription.'", "'.$this -> m_strAddress.'", 
				           "'.$this -> m_strEmailAddress.'", "'.$this -> m_strMobile.'", "'.$this -> m_strPrimaryPhoto.'")';
		}
		if($rsData = mysqli_query($this -> voidConnect(), $strSql)) {
			return true;
		} else { 
			print mysqli_error($this -> voidConnect());
			return false;
		}		
	}

	function checkProfile()
	{
		$strSql = 'SELECT * FROM tblProfile';
		if($rsData = mysqli_query($this -> voidConnect(), $strSql)) {
			if (mysqli_num_rows($rsData) > 0) {
					return true;
				
			} else {
				return false;
			}
		}
	}
	
	function getProfileInformation() {
		$strSql = 'SELECT * FROM tblProfile';
		if($rsData = mysqli_query($this -> voidConnect(), $strSql)) {
			if (mysqli_num_rows($rsData) > 0) {
				if($rowData = mysqli_fetch_array($rsData)) {
					$this -> m_strName = $rowData['fprName'];
					$this -> m_strDescription = $rowData['fprDescription'];
					$this -> m_strAddress = $rowData['fprAddress'];
					$this -> m_strEmailAddress = $rowData['fprEmailAddress'];
					$this -> m_strMobile = $rowData['fprMobile'];		
					$this -> m_strPrimaryPhoto = $rowData['fprPrimaryPhoto'];	
					return true;
				}
			} else {
				return false;
			}
		}
	}
	
	function blnSetInterest () {
		$strSql = 'UPDATE tblInterest SET finDescription = "'.$this -> m_strInterest.'"';
		if($rsData = mysqli_query($this -> voidConnect(), $strSql)) {
			return true;
		} else { 
			print mysqli_error($this -> voidConnect());
			return false;
		}		
	}
	
	function blnGetInterest() {
        $strSql = 'SELECT finDescription FROM tblInterest';
		$arrInterest = array();
        $arrInterest = $this->arrGetAllSql($strSql);
        return $arrInterest;	
	}
}
?>