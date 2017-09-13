 <?php
    require_once "db_connection.php";
    require_once "../other/allFunctions.php";
class Registration {
    private $currentPass;
    private function create_password($length)
    {
        $letters = array('a','b','c','d','e','f','g','h','i','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',0,1,2,3,4,5,6,7,8,9);
        $pass = "";
        for ($i = 0; $i < $length; $i++) {
            $char = $letters[rand(1, count($letters) - 1)];
            $pass .= $char;
        }
        return $pass;
    }

    private function send_password($to){
        $subject = 'Password for voting';
        $this->currentPass = $this->create_password(8);
        $message = 'Your password is'.$this->currentPass.'. Visit /login to start vote now!';
        $mailSent = mail($to, $subject, $message);
        echo $mailSent ? '<h1>Mail was sent, check your inbox!</h1>' : 'There is a problem with the system at the moment!';
    }

    public function register_user($to, $index){
        global $db;
        $validRegistrant = $db->fetchArray(resultQuery("select * from `voters` where voters.voterID = '{$index}' and email_address = '{$to}' and registered = '0'"));
        if(is_array($validRegistrant)){ 
    //        self::send_password($to);
                $this->currentPass = $this->create_password(8);
             if(boolQuery("UPDATE `voters` SET `registered` = '1', password = '{$this->currentPass}' WHERE `voters`.`voterID` = '{$index}'")){
                 echo "<h1 style='color:#2980B9;text-align:center'>You just registered successfully, your password is ",$this->currentPass,"</h1>";
             }
        }else{
            echo "<h1 style='color:#2980B9;text-align:center'>You can't register at the moment</h1>";
        }
    }
}
?> 