
<?php 
    $host = 'localhost';
    $db = 'guestbook';
    $db1 = 'classicmodels';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $dsn1 = "mysql:host=$host;dbname=$db1;charset=$charset";
    
    try {
    $pdo = new PDO($dsn, $user, $pass);
    
    } catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    
   if (isset($_POST['action'])){
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
        $forraNamn = $user;
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $sql = "INSERT INTO posts (name, message) VALUES ('$user', '$message')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
   };

   if (isset($_GET['remove'])){
     $removeId = filter_input(INPUT_GET, 'remove', FILTER_SANITIZE_NUMBER_INT);
     $sql = "DELETE FROM posts WHERE Id = '$removeId'";
     $stmt = $pdo->prepare($sql);
     $stmt->execute();
     };

     try {
          $pdo1 = new PDO($dsn1, $user, $pass);
     } catch (\PDOException $e) {
          throw new \PDOException($e->getMessage(), (int)$e->getCode());
     }