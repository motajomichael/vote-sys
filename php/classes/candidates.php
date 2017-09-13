<?php
    //require_once("db_connection.php");
    // require_once('../other/allFunctions.php');
    class Candidate{
    	public function addCandidate($posID, $fullname, $photo){
    		$array  = explode(' ', $fullname);
    		$string = implode('_', $array);
    		$filepath = $fullname.".jpg";
            if(move_uploaded_file($photo, "../../images/candidates/".$string.".jpg")){
            	return boolQuery("INSERT INTO `candidates` (`fullName`, `positionID`, `photoPath`) VALUES ('{$fullname}', '{$posID}', '{$filepath}')");
            }
    	}
        
        public function deleteCandidate($posID, $candidate){
            return boolQuery("DELETE FROM `candidates` WHERE `candidates`.`fullName` = '{$candidate}' AND `candidates`.`positionID` = '{$posID}' ");
        }
    }
?>