<?php 
    session_start();
    // require "../php/include.php";
    global $db;
?>
    <?php if(!isset($_SESSION['admin_state'])):?>
        <!doctype html>
        <html>

        <head>
            <meta charset="UTF-8">
            <title>Login</title>
            <link rel="stylesheet" href="../stylesheet/index.css" />
        </head>

        <body>
            <header>Admin Login</header>
              <form action="../php/other/auth.php" id="genpass" method="post">
                <div class="form-head">Login</div>

                <fieldset>
                    <label for="user">Username</label>
                    <input type="text" placeholder="username" id="user" name="admin_user" />
                </fieldset>

                <fieldset>
                    <label for="pass">Password</label>
                    <input type="password" placeholder="password" id="pass" name="pass">
                </fieldset>
                <input type="submit" value="enter" name="adminform">
            </form>
             <style>
                form fieldset {
                    width: 70%!important;
                    margin: 10px auto!important;
                    margin-left: 14%!important;
                }
                 #genpass input[type="submit"] {
                    width: 69%!important;
                    margin-left: 14%!important;
                 }
                 form{
                     padding-bottom:10px!important;
                     max-width:40%!important;
                 }
            </style>
        </body>
        </html>
    <?php endif ?>

<?php if(isset($_SESSION['admin_state'])):?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Vote</title>
    <link rel="stylesheet" href="../stylesheet/index.css" />
    <link rel="stylesheet" href="../stylesheet/vote.css" />
    <link rel="stylesheet" href="../stylesheet/admin.css" />
</head>

<body>
    <div id="fixedNotification"></div>
    <header>Welcome <a id="signOut" href="../php/other/auth.php?action=signOut">Leave</a></header>
    <section class="wrapper">
        <div class="sub-head">Admin</div>
        <div class="dashboard">
            <ul>
                <li data-view="results">View Results</li>
                <li data-view="resetpass">Reset Passwords</li>
                <li data-view="candidates">Candidates & Positions</li>
            </ul>
        </div>
        <section class="subWrapper">
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
            <div id="resetpass" class="views">
                <form action="../php/other/resetpassword.php" id="genpass" method="post">
                    <div class="form-head">Reset Passwords</div>

                    <fieldset>
                        <label for="indexnumber">index number</label>
                        <input type="text" placeholder="index number" id="indexnumber" name="indexnumber" />
                    </fieldset>

                    <fieldset>
                        <label for="code">new password</label>
                        <input type="text" placeholder="password" id="code" name="password">
                    </fieldset>
                    <input type="submit" value="Reset">
                </form>
            </div>
            <div class="views" id="candidates">
                <form action="../php/other/candpost.php" method="post" name="addCandidte" enctype="multipart/form-data">
                <div>
                    <label for="post">Choose a Position</label>
                    <select name="position" id="post">
                    <?php foreach (Position::getAllPositions() as $key => $value): ?>
                        <option value="<?= $value?>"><?= Position::getPositionCaption($value)?></option>
                    <?php endforeach?>
                    </select>
                </div>
                    <div>
                        <label for="candidate">Candidate</label>
                        <input type="text" name="fullName" placeholder="Candidate Name" id="candidate">
                    </div>
                    <input type="file" name="photoPath">
                    <button class="file">Photo</button>
                    <button class="addcandidate">Add Candidate</button>
               </form> 
               <form action="../php/other/candpost.php" method="post" name="addCandidte">
                    <div>
                        <label for="nposition">Position</label>
                        <input type="text" name="nposition" placeholder="Position Name" id="nposition">
                    </div>
                    <button class="addcandidate addPost">Add Position</button>
               </form> 
                <form action="../php/other/candpost.php" method="post" name="addCandidte">
                   <select name="delposition" id="post">
                    <?php foreach (Position::getAllPositions() as $key => $value): ?>
                        <option value="<?= $value?>"><?= Position::getPositionCaption($value)?></option>
                    <?php endforeach?>
                    </select>
                    <div>
                        <label for="delcandidate">Candidate</label>
                        <input type="text" name="delcandidate" placeholder="Candidate Full Name" id="delcandidate">
                    </div>
                    <button class="addcandidate delCand">Delete Candidate</button>
               </form>
            </div>
        </section>
    </section>
    <script src="../script/jquery.js"></script>
    <script src="../script/admin.js"></script>
</body>


</html>
<?php endif ?>