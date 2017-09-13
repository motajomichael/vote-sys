<?php 
    session_start();
    require "../php/other/allFunctions.php";
    require_once "../php/classes/db_connection.php";
    require "../php/classes/candidates.php";
    require "../php/classes/users.php";
    require "../php/classes/positions.php";
    global $db;
    if(!isset($_SESSION['user'])) redirect_to('../login');

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Vote</title>
    <link rel="stylesheet" href="../stylesheet/index.css" />
    <link rel="stylesheet" href="../stylesheet/vote.css" />
</head>

<body>
   <div id="fixedNotification"></div>
    <header>Welcome <?php echo $_SESSION['user']?>
        <a id="signOut" href="../php/other/auth.php?action=signOut">Leave</a>
        <a class="nav-button" id="change-pass" href="../?index=<?php echo $_SESSION['user']?>">Change Password</a>
    </header>
    <section class="wrapper">
        <div class="sub-head">President</div>
        <?php $voter = new Users();?>
        <?php if($voter->getVotedStatus($_SESSION['user']) == 0):?>
        <figure class="start-vote">Start Vote</figure>
        <form action="../php/other/vote.php" id="vote" method="post">
            <?php foreach (Position::getAllPositions() as $key => $value): ?>
                <fieldset id="<?php echo Position::getPositionCaption($value)?>">
                   <div class="form-head"> <?= Position::getPositionCaption($value)?> </div>
                   <input type="hidden" class="hiddenCheck"/>
                    <ul class="candidates">
                        <?php $resultSet = resultQuery("SELECT * FROM `candidates` WHERE positionID = {$value}");?>
                           <?php while($candidate = $db->fetchArray($resultSet)):?>
                            <li>
                                <label for="<?= $candidate['fullName']?>">
                                    <div class="imgHolder" style="background-image:url(../images/candidates/<?= $candidate['photoPath']?>)"></div>
                                    <div class="inputs">
                                        <span class="name"><?= $candidate['fullName']?></span>
                                        <input type="radio" value="<?= $candidate['candidateID']?>" name="<?= 'position'.$value?>" id="<?= $candidate['fullName']?>" />
                                        <span class="radio"></span>
                                    </div>
                                </label>
                            </li>
                            <?php endwhile; ?>
                    </ul>
                    <div class="buttonset">
                        <button class="next">Next</button>
                    </div>
                </fieldset>
            <?php endforeach; ?>
            <div class="buttonset">
                <button type="submit" id="finish">Finish</button>
            </div>
        </form>
        
        <?php else: ?>
        <a href="results.php" class="start-vote">View Results</a>
        <?php redirect_to('');?>
        <?php endif; ?>
    </section>
    <script src="../script/jquery.js"></script>
    <script src="../script/vote.js"></script>
</body>


</html>