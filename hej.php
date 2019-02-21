<?php
function raknaArea($tal1, $tal2){
    $summa = $tal1 * $tal2;
    echo "$summa";
    return;
}

$rakna = raknaArea(10,5);
echo "$rakna";
?>
<br><br>
<?php
function raknaArea2($tal1, $tal2){
    $tal1 = $tal1 *2;
    $tal2 = $tal2 *2;
    $summa = $tal1 * $tal2;
    echo "$summa";
    return;
}

raknaArea2(10,5);
?>

<br>

<?php 
function whut($slut=5){
    $start = 1;
    while($start <= $slut){
        raknaArea($start, 2);
        $start++;
        ?>
        <br>
        <?php
    }
    return;
}
whut(10);

?>
<br>
<?php

function toCelc($far){
    return ($far - 32) * 5/9;
}

echo toCelc(100);

?>
<br>
<?php
    function hittaStor($tal1, $tal2){
        if($tal1 < $tal2){
            return $tal2;
        }else{
            return $tal1;
        }
    }

    echo hittaStor(20, 10);

?>
<br><br>
<?php

    function raknaFakult($x){
        echo $x;
        ?>
        <br> 
        <?php 
        return $x <= 1 ? 1 : $x*raknaFakult($x-1) ;
    }

echo raknaFakult(5);

?>