<?php

    $a = <<<EOD

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Landing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="header.css">
    <!-- script src="main.js"></script -->
</head>
<body>
    <header>
        <a href=""><img src="https://www.popsci.com/sites/popsci.com/files/styles/1000_1x_/public/images/2018/08/nasa-logo-web-rgb.png" alt="LOGO" style="width:30%; border: 1px solid black;"></a>
        <nav>
            <ul>
                <li><a href="">VEHICLES</a></li>
                <li><a href="">ABOUT US</a></li>
                <li><a href="">CONTACT US</a></li>
            </ul>
        </nav>
        <nav>
            <ul>
                <li><a href="">SIGN IN</a></li>
                <li><a href="">CART</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>

EOD;

echo $a;
?>