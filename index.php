<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
    <link rel="stylesheet" href="stylesheet/index.css" />
</head>

<body>
    <header>Voting System</header>
    <a href="vote/" class="nav-button">Login</a>
</body>

<form action="php/other/register_user.php" id="genpass" method="post">
    <div class="form-head"><?php echo isset($_GET['index']) ? 'Update':'Get'?> Password</div>

    <fieldset>
        <label for="indexnumber">index number</label>
        <input type="text" placeholder="index number" id="indexnumber" name="indexnumber" value="<?php echo isset($_GET['index']) ? $_GET['index'] : null ?>"/>
    </fieldset>

    <fieldset>
       <?php if(!isset($_GET['index'])):?>
            <label for="email">email</label>
            <input type="email" placeholder="email" id="email" name="email_address">
        <?php else: ?>
        <label for="newpassword">password</label>
        <input type="text" placeholder="new password" id="newpassword" name="newpassword">
        <input type="hidden" name="password_change" value="1">
        <?php endif; ?>
    </fieldset>
    <input type="submit" value="<?php echo isset($_GET['index']) ? 'update':'done'?>">
</form>

</html>