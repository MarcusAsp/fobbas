<?php

    if (isset($_POST['action'])) {
        $host = 'localhost';
        $db   = 'classicmodels';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        
        try {
             $pdo = new PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
             throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        
        $stmt = $pdo->query("SELECT * FROM classicmodels.users WHERE username = 'micke' AND password='hemligt';");

        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_EMAIL);
        $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        print_r($user, $pass);
        $stmt = $pdo->prepare("SELECT * FROM classicmodels.users WHERE username = ? AND password = ? ;");
        $stmt->execute([$user, $pass]);
        $rowcount = $stmt->rowCount();

        $userLoggedIn = ($rowcount > 0);

        if ($userLoggedIn) {
            $_SESSION['user'] = $user;
            echo "Användare $user inloggad, välkommen!<br>";
        } else {
            echo "Det finns ingen sån användare<br>";
        }
        print_r($_SESSION);
        echo "<br>";

    }

    if (isset($_POST['signup'])) {
        $host = 'localhost';
        $db   = 'classicmodels';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        
        try {
             $pdo = new PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
             throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        $user1 = filter_input(INPUT_POST, 'user1', FILTER_SANITIZE_EMAIL);
        $pass1 = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING);
        print_r($user, $pass);
        $stmt = $pdo->prepare("INSERT INTO classicmodels.users (username, password) VALUES('$user1','$pass1' )");
        $stmt->execute([$user, $pass]);
        echo 'Lyckades';
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Classic models</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script-->
</head>
<body>
    <form method="POST">
        Username:<br>
        <input type="text" name="user"><br>
        Password:<br>
        <input type="password" name="password"><br>
        <input type="submit" name="action" value="Logga in">
    </form>
    <br>
    <br>
    <form method="POST">
        Sign up<br><br>
        Username:<br>
        <input type="text" name="user1"><br>
        Password:<br>
        <input type="password" name="password1"><br>
        <input type="submit" name="signup" value="Registrate me">
    </form>
    <?php if ($userLoggedIn): ?>
    <div>Detta erbjudande visas bara för våra inloggade medlemmar.</div>
    <?php endif; ?>
</body>
</html>