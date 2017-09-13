<?php
    require "../include.php";
    if(isset($_REQUEST['fullName'])){
        $photo = $_FILES['photoPath']['tmp_name'];
        $fullName = $_REQUEST['fullName'];
        $posID = $_REQUEST['position'];
        
        $candidate = new Candidate();
        echo $candidate->addCandidate($posID, $fullName, $photo) ? "<h1 style='color:#2980B9;text-align:center'>Candidate was added successfully</h1>" : 'OOPS!';

    }elseif(isset($_POST['nposition']) && !empty($_POST['nposition'])){
    	$position = new Position();
    	echo ($position->addPosition($_POST['nposition'])) ? 'Position added successfully' : 'There is problem with the system!!';
    }elseif($_POST['delcandidate']){
        $candidate = new Candidate();
        if($candidate->deleteCandidate($_POST['position'], $_POST['delcandidate'])){
            echo 'Candidate was deleted successfully';
        }else echo "Candidate could not be deleted";
    }
?>