<DOCTYPE html>
    <html>
        <head>
            <title> NSR LOGIN </title>
            <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2> LOGIN </H2>
      <?php if(isset($_GET['error'])) { ?>
         <div class="error-msg"><?php echo $_GET['error']; ?></div>
    <?php } ?>

        <lable> User Name </lable>
        <input type="text" name="username" placeholder="username"> <br>
        <lable> Password </lable>
        <input class="password" type="password" name="password" placeholder="password"> <br>
        <button type="submit">Login</button>
    </form>
</body>
<html>
