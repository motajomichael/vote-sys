<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../stylesheet/index.css" />
</head>

<body>
    <header>Voting System
    </header>
</body>

<form action="../php/other/auth.php" id="genpass" method="post">
    <div class="form-head">Login</div>

    <fieldset>
        <label for="indexnumber">index number</label>
        <input type="text" placeholder="index number" id="indexnumber" name="index_number" />
    </fieldset>

    <fieldset>
        <label for="code">Password</label>
        <input type="text" placeholder="code" id="code" name="pass">
    </fieldset>
    <input type="submit" value="enter">
</form>

</html>