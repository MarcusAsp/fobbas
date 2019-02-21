<?php 
    require_once('sec.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <title>php4</title>
</head>
<body>
    <h1>Gästbok</h1>
    <form method="POST">
        Namn: <br>
        <input type="text" name="user" placeholder="<?php echo $forraNamn; ?>">
        Meddelande:<br>
        <textarea name="message"></textarea>
        <input type="submit" name="action" value="Skicka">
    </form>

    <?php
        $stmt = $pdo->query("SELECT * FROM posts");
        while ($row = $stmt->fetch())
     {
    ?>
        <div class="mess">
        <span class='remove'>
            <a href="?remove=<?php echo $row['Id']; ?>" onclick="return confirm('Vill du verkligen ta bort meddelandet')">Ta bort</a>
        </span>
        <em><?php echo $row['Name']; ?></em> har skrivit: <br> <?php echo $row['Message'];?>
        </div>


<?php
     }
?>
    <form method="POST">
    <input type="submit" name="tjena">
    </form>
    <table>
    <?php
        $stmt1 = $pdo1->query("SELECT * FROM $db1.products");
        while ($row = $stmt1->fetch())
     {
        if (isset($_POST['tjena'])){
            ?>
             <tr>
             <td><?php echo $row['productCode']; ?></td>
             <td><?php echo $row['productName']; ?></td>
             <td><?php echo $row['productLine']; ?></td>
             <td><?php echo $row['productScale']; ?></td>
             <td><?php echo $row['productVendor']; ?></td>
             <td><?php echo $row['productDescription']; ?></td>
             <td><?php echo $row['quantityInStock']; ?></td>
             <td><?php echo $row['buyPrice']; ?></td>
             <td><?php echo $row['MSRP']; ?></td>
             </tr>
             <?php
        };
     }
    ?>
    </table>
    
</body>
</html>