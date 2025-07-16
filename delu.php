<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="delu.css">
</head>
<body>
    <?php 
    require 'config.php';

    ?>

<form action="dup.php" method = "POST">
<h1>Delete Account</h1>
<input type="text" name = "del" placeholder ="Enter Email">
<input type="submit" values = "Delete">
</form>


</body>
</html>