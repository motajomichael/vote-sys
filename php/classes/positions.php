<?php
    require_once("db_connection.php");
    class Position{
        public function addPosition($posCaption){
            return boolQuery("INSERT INTO `voting_system`.`positions` (`positionID`, `positionCaption`) VALUES (NULL, '{$posCaption}')");
        }
        public static function getAllPositions(){
            global $db;
            $resultSet = resultQuery("SELECT * FROM `positions` ORDER BY `positionID` ASC");
            $positions = array();
            while ($ent = $db->fetchArray($resultSet)) {array_push($positions, $ent['positionID']);}
            return $positions;
        }
        
      public static function getPositionCaption($positionID){
        global $db;
        $result = resultQuery("SELECT positionCaption FROM `positions` WHERE positionID = '{$positionID}'");
        while($name = $db->fetchArray($result)) return $name['positionCaption'];
      }
    }
?>