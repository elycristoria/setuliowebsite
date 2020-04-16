<?php
class Experience extends MySqlDb {
	
	var $m_intId;
	var $m_strPositionTitle;
	var $m_strCompany;
	var $m_strDescription;
	var $m_strStartDate;
	var $m_strEndDate;
	var $m_blnIsCurrentJob;
	
	function voidSetId($intValue) {
		$this -> m_intId = $intValue;
	}
	
	function intGetId() {
		return $this -> m_intId;
	}
	
	function voidSetPositionTitle($strValue) {
		$this -> m_strPositionTitle = $strValue;
	}
	
	function strGetPositionTitle() {
		return $this -> m_strPositionTitle;
	}	
	
	function voidSetCompany($strValue) {
		$this -> m_strCompany = $strValue;
	}
	
	function strGetCompany() {
		return $this -> m_strCompany;
	}	
	
	function voidSetDescription($strValue) {
		$this -> m_strDescription = $strValue;
	}
	
	function strGetDescription() {
		return $this -> m_strDescription;
	}
	
	function voidSetStartDate($strValue) {
		$this -> m_strStartDate = $strValue;
	}
	
	function strGetStartDate() {
		return $this -> m_strStartDate;
	}	
	
	function voidSetEndDate($strValue) {
		$this -> m_strEndDate = $strValue;
	}
	
	function strGetEndDate() {
		return $this -> m_strEndDate;
	}
	
	function voidSetIsCurrentJob($blnValue) {
		$this -> m_blnIsCurrentJob = $blnValue;
	}
	
	function blnGetIsCurrentJob() {
		return $this -> m_blnIsCurrentJob;
	}

	function blnInsertNewExperience() {
        $arrValuePairs = array(
            'fexPositionTitle' => $this -> m_strPositionTitle,
            'fexCompany' => $this -> m_strCompany,
            'fexDescription' => $this -> m_strDescription,
            'fexStartDate' => $this -> m_strStartDate,
            'fexEndDate' => $this -> m_strEndDate,
            'fexIsCurrentJob' => $this -> m_blnIsCurrentJob);
        $this -> voidSetTableName('tblExperience');
        if ($intId = $this -> intInsertData($arrValuePairs))
        {
            $this -> m_strMessage = "A new Experience was succesfully added!";
            return true;
        }
        else 
        {
            return 0;
        }		
	}
	
	function blnUpdateExperience($intExperienceId) {
       $arrValuePairs = array(
            'fexPositionTitle' => $this -> m_strPositionTitle,
            'fexCompany' => $this -> m_strCompany,
            'fexDescription' => $this -> m_strDescription,
            'fexStartDate' => $this -> m_strStartDate,
            'fexEndDate' => $this -> m_strEndDate,
            'fexIsCurrentJob' => $this -> m_blnIsCurrentJob);
        $this -> voidSetTableName('tblExperience');
        if ($intId = $this -> blnUpdateData($arrValuePairs,'fexId',$intExperienceId))
        {
            $this -> m_strMessage = "A new Experience was succesfully updated!";
            return true;
        }
        else 
        {
            return 0;
 		}
	}
	
	function updateIsCurrentJob() {
       $arrValuePairs = array(
            'fexIsCurrentJob' => 0);
        $this -> voidSetTableName('tblExperience');
        if ($intId = $this -> blnUpdateData($arrValuePairs,'fexIsCurrentJob','1'))
        {
            $this -> m_strMessage = "Current Job is now updated!";
            return true;
        }
        else 
        {
            return 0;
 		}		
	}
	
	    function arrGetAllExperience() {
        $strSql = 'SELECT * FROM tblExperience ORDER BY fexIsCurrentJob DESC';
        $arrStudents = array();
        $arrStudents = $this->arrGetAllSql($strSql);
        return $arrStudents;
    }
}
?>