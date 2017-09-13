<?php
    require_once 'db_connection.php';
    require_once 'positions.php';
  
    class Vote {
        private $currentVoter;
    	function __construct($user){	
			$this->currentVoter = $user;
		}

        public function addVote(){
            foreach(Position::getAllPositions() as $key => $value){
                $candidateID = $_REQUEST['position'.$value];
                $state =  boolQuery("INSERT INTO `voting_system`.`votes` (`positionID`, `voterID`, `candidateID`) VALUES ('{$value}', '{$this->currentVoter}', '{$candidateID}')");
            }
        } 

        public static function TotalVotes($ID){
            global $db;
            $result = $db->fetchArray(resultQuery("SELECT count(ID ) as count FROM `votes` WHERE positionID = '{$ID}' "));
            return $result['count'];
        }
    }
?>