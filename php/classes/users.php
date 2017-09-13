<?php
        require_once(dirname(__FILE__)."/db_connection.php");
    class Users{
        public static function auth($username, $password){
			global $db;
	        $User = resultQuery("SELECT * FROM `voters` WHERE voterID ='{$username}' AND password = '{$password}' AND registered <> '0' ");
	       	return is_array($db->fetchArray($User));
        }

        public static function auth_admin($username, $password){
        	global $db;
	        $User = resultQuery("SELECT * FROM `admin` WHERE username ='{$username}' AND password = '{$password}'");
	       	return is_array($db->fetchArray($User));
        }
           
       public function resetPassword($newPass, $voterID){
              return boolQuery("UPDATE `voters` SET `password` = '{$newPass}' WHERE `voters`.`voterID` = '{$voterID}'");
       }
           
       public function getVotedStatus($user){
              global $db;
              $resultset = resultQuery("SELECT voted FROM `voters` WHERE voterID ='{$user}' AND registered <> '0'");
              while($result = $db->fetchArray($resultset)){
                     return $result['voted'];
              }
       }
    }
?>