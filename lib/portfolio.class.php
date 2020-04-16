<?php
class Portfolio extends MySqlDb{
	
	var $m_intId;
	var $m_intSetId;
	var $m_strTitle;
	var $m_strDescription;
	var $m_strDate;
	var $m_blnIsActive;
	
	//variables for the Images
	
	var $m_intImageId;
	var $m_strImageFilename;
	var $m_strImageName;
	var $m_blnImageIsActive;
	
	function voidSetId($intValue) {
		$this -> m_intId = $intValue;
	}
	
	function intGetId() {
		return $this -> m_intId;
	}
	
	function voidSetSetId($intValue) {
		$this -> m_intSetId = $intValue;
	}
	
	function intGetSetId() {
		return $this -> m_intSetId;
	}
	
	function voidSetTitle($strValue) {
		$this -> m_strTitle = $strValue;
	}
	
	function strGetTitle() {
		return $this -> m_strTitle;
	}
	
	function voidSetDescription($strValue) {
		$this -> m_strDescription = $strValue;
	}
	
	function strGetDescription() {
		return $this -> m_strDescription;
	}	
	
	function voidSetDate($strValue) {
		$this -> m_strDate = $strValue;
	}
	
	function strGetDate() {
		return $this -> m_strDate;
	}
	
	function voidSetIsActive($blnValue) {
		$this -> m_blnIsActive = $blnValue;
	}
	
	function blnGetIsActive() {
		return $this -> m_blnIsActive;
	}
	
	//Getters and Setters for Image Portfolio
	
	function voidSetImageId($intValue) {
	    $this -> m_intImageId = $intValue;
	}
	
	function intGetImageId() {
	    return $this -> m_intImageId;
	}
	
	function voidSetImageFilename($strValue) {
	    $this -> m_strImageFilename = $strValue;
	}
	
	function strGetImageFilename() {
	    return $this -> m_strImageFilename;
	}
	
	function voidSetImageName($strValue) {
	    $this -> m_strImageName = $strValue;
	}
	
	function strGetImageName() {
	    return $this -> m_strImageName;
	}

	function voidSetImageIsActive($blnValue) {
	    $this -> m_blnImageIsActive = $blnValue;
	}
	
	function blnGetImageIsActive() {
	    return $this -> m_blnImageIsActive;
	}
	
	function bnInsertPortfolio() {
		$strSql = 'INSERT INTO tblPortfolio (fstId, fportTitle, fportDescription, fportDate, fportIsActive) 
	               VALUES ("'.$this -> m_intSetId.'", "'.$this -> m_strTitle.'", "'.$this -> m_strDescription.'", 
			       "'.$this -> m_strDate.'", "'.$this -> m_blnIsActive.'")';
		if($rsData = mysqli_query($this -> voidConnect(), $strSql)) {
			return true;
		} else { 
			print mysqli_error($this -> voidConnect());
			return false;
		}		
	}
	
	function blnUpdatePortfolio() {
		$strSql = 'UPDATE tblPortfolio SET fstId = "'.$this -> m_intSetId.'", fportTitle = "'.$this -> m_strTitle.'", 
		           fportDescription = "'.$this -> m_strDescription.'", fportDate = "'.$this -> m_strDate.'", fportIsActive = "'.$this -> m_blnIsActive.'"
				   WHERE fportId = "'.$this -> m_intId.'"';
		if($rsData = mysqli_query($this -> voidConnect(), $strSql)) {
			return true;
		} else { 
			print mysqli_error($this -> voidConnect());
			return false;
		}		
	}

	function getPortfolioById() {
		$strSql = 'SELECT * FROM tblPortfolio WHERE fportId = "'.$this -> m_intId.'"';
		if($rsData = mysqli_query($this -> voidConnect(), $strSql)) {
			if (mysqli_num_rows($rsData) > 0) {
				if($rowData = mysqli_fetch_array($rsData)) {
					$this -> m_strTitle = $rowData['fportTitle'];
					$this -> m_intSetId = $rowData['fstId'];
					$this -> m_strDescription = $rowData['fportDescription'];
					$this -> m_strDate = $rowData['fportDate'];
					$this -> m_blnIsActive = $rowData['fportIsActive'];
					return true;
				}
			} else {
				return false;
			}
		}
	}

    function arrGetAllPortfolio()
    {
        $strSql = 'SELECT a.*, b.fstName FROM tblPortfolio a INNER JOIN tblSetType b ON a.fstId = b.fstId WHERE a.fportIsActive = 1';
        $arrStudents = array();
        $arrStudents = $this->arrGetAllSql($strSql);
        return $arrStudents;
    }

	function deletePortofolioById() {
		$strSql = 'DELETE FROM tblPortfolio WHERE fportId = "'.$this -> m_intId.'"';
		if($rsData = mysqli_query($this -> voidConnect(), $strSql)) {
			return true;
		} else { 
			print mysqli_error($this -> voidConnect());
			return false;
		}		
	}
	
	function arrGetPortfolioGallery() {
        $strSql = 'SELECT a.fportTitle, b.* FROM tblPortfolio a INNER JOIN  tblPortfolioImage b 
                   ON a.fportId = b.fportId WHERE b.fportId = "'.$this -> m_intId.'"' ;	   
        $arrPortfolioImages = array();
        $arrPortfolioImages = $this->arrGetAllSql($strSql);
        return $arrPortfolioImages;
	}
    
	function blnInsertPortfolioImage() {
	    $arrValuePairs = array(
	        'fportId' => $this -> m_intId,
	        'fportImgFilename' => $this -> m_strImageFilename,
	        'fportImgName' => $this -> m_strImageName,
	        'fportImgIsActive' => $this -> m_blnImageIsActive);
	    $this -> voidSetTableName('tblPortfolioImage');
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
	
	function deleteImageById() {
	    $strSql = 'DELETE FROM tblPortfolioImage WHERE fportImgId = "'.$this -> m_intImageId.'"';
	    if($rsData = mysqli_query($this -> voidConnect(), $strSql)) {
	        return true;
	    } else {
	        print mysqli_error($this -> voidConnect());
	        return false;
	    }
	}
	
	function deleteImageResource($strImageUrl) {
	    unlink($strImageUrl);
	}
	
	function getPortfolioImageById() {
	    $strSql = 'SELECT * FROM tblPortfolioImage WHERE fportImgId = "'.$this -> m_intImageId.'"';
	    if($rsData = mysqli_query($this -> voidConnect(), $strSql)) {
	        if (mysqli_num_rows($rsData) > 0) {
	            if($rowData = mysqli_fetch_array($rsData)) {
	                $this -> m_strImageFilename = $rowData['fportImgFilename'];
	                $this -> m_intId = $rowData['fportId'];
	                return true;
	            }
	        } else {
	            return false;
	        }
	    }
	}
}
?>