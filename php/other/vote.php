<?php
    session_start();
    require_once "../include.php";

    $vote = new Vote($_SESSION['user']);
    $vote->addVote();
    boolQuery("update `voters` set `voted` = '1' where `voterID` = '{$_SESSION['user']}'");
    echo "<h1 style='color:#2980B9;text-align:center'>Thank You for Voting!</h1>";
    session_destroy();
?>