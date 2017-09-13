<?php
       require "../classes/users.php";
       if(isset($_POST['password'])) {
              $user = new Users();
              if($user->resetPassword($_POST['password'], $_POST['indexnumber'])){
                     echo "<h1>Password reset successfully</h1>";
              }
       }
?>