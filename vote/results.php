<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Results</title>
    <link rel="stylesheet" href="../stylesheet/admin.css">
    <link rel="stylesheet" href="../stylesheet/index.css">
    <link rel="stylesheet" href="../stylesheet/vote.css">
</head>
<body>
           <header>
               <a id="signOut" href="index.php">Go Back</a>
           </header>
            <form action="" id="results" class="views">
                <?php 
                    require_once "../php/other/allFunctions.php"; 
                    require_once "../php/classes/positions.php"; 
                    require_once "../php/classes/voting.php"; 
                ?>
               <?php foreach (Position::getAllPositions() as $key => $value): ?>
                <fieldset id="<?php echo Position::getPositionCaption($value)?>">
                   <div class="form-head"> <?= Position::getPositionCaption($value)?> </div>
                    <ul class="candidates">
                        <?php $resultSet = resultQuery("SELECT * FROM `candidates` WHERE positionID = {$value}");
                        $totalVotes = Vote::TotalVotes($value);
                        ?>
                           <?php while($candidate = $db->fetchArray($resultSet)):?>
                            <li>
                                <label for="<?= $candidate['fullName']?>">
                                    <div class="imgHolder" style="background-image:url(../images/candidates/<?= $candidate['photoPath']?>)"></div>
                                    <div class="inputs">
                                        <span class="name"><?= $candidate['fullName']?></span>
                                       
                                       <?php  global $db;
                                        $noOfVotes = $db->numRows(resultQuery("SELECT * FROM `votes` WHERE positionID = '{$value}' AND candidateID = '{$candidate['candidateID']}'"));
                                      $percentage = ($noOfVotes/$totalVotes)*100 ?>
                                        <span class="radio"><?php echo $noOfVotes.' votes ',round($percentage, 2).'%';?></span>
                                    </div>
                                </label>
                            </li>
                            <?php endwhile; ?>
                    </ul>
                </fieldset>
            <?php endforeach; ?>
            </form>
</body>
</html>