<?php

function returnSum():void {
    $wichFunc = [
            'decToBin' => false,
            'binToDec' => false,
            'decToHex' => false,
            'hexToDec' => false,
            'binToHex' => false,
            'hexToBin' => false,
    ];

    foreach ($_POST['equation'] as $func) {
        $key = array_search($func, $_POST['equation']);
        if ($func !== "") {
            $wichFunc[$key] = true;

            switch ($key) {
                case 'decToBin':
                    decToBin(strval($_POST['equation'][$key]));
                    break;
                case 'binToDec':
                    binToDec(strval($_POST['equation'][$key]));
                    break;
                case 'decToHex':
                    decToHex(strval($_POST['equation'][$key]));
                    break;
                case 'hexToDec':
                    hexToDec(strval($_POST['equation'][$key]));
                    break;
                case 'binToHex':
                    binToHex(strval($_POST['equation'][$key]));
                    break;
                case 'hexToBin':
                    hexToBin(strval($_POST['equation'][$key]));
                    break;
            }
        } else {
            array_shift($wichFunc);
        }
    }
}

function decToBin(string $dec, bool $twoFunc = true):string {
    $title = "";
    if ($twoFunc) {
        $title = "<h3>Decimal to Binary</h3>";
    }
    $dec = intval($dec);
    $bin = '';
    $arr = [];
    $showDec = $dec;
    while ($dec > 0) {
        $bin = $dec % 2 . $bin;
        $r = $dec % 2;
        $dec = floor($dec / 2);
        $arr[] = $showDec . " / 2 = " . $dec . " R: " . $r;
        $showDec = $dec;
    }
    echo "<br><br>" . $title . implode("<br>",$arr) . "<br>Binary: " . $bin;
    return strrev($bin);
}

function binToDec(string $bin, bool $twoFunc = true, bool $lb = true):string {
    $title = "";
    $lb = "";
    if ($twoFunc) {
        $title = "<h3>Binary to Decimal</h3>";
    } elseif($lb) {
        $lb = "<br><br>";
    }
    $arr = str_split(strrev($bin));
    $dec = 0;
    $count = 1;
    $array = [];
    $countArr = [];
    $countString = "";

    foreach ($arr as $bit) {
        $bit = intval($bit);
        if($bit === 1) {
            $dec += ($bit * $count);
            $countString .= $count . " + ";
        }
        array_push($array, ($bit . " * " . $count . " = " . ($bit * $count)));
        array_push($countArr, $dec);
        $count *= 2;
    }

    $countString = rtrim($countString, " +");
    $result = implode("<br>", $array);
    $countValue = $countString . " = " . $dec;

    echo $lb . $title . $result . "<br>Decimal: " . $countValue;
    return $dec;
}


function decToHex(string $dec, bool $twoFunc = true):string {
    $title = "";
    if ($twoFunc) $title = "<h3>Decimal to Hexadecimal</h3>";
    $dec = intval($dec);
    $hex = '';
    $arr = [];
    $showDec = $dec;
    while ($dec > 0) {
        $r = $dec % 16;
        if ($r > 9) {
            switch ($r) {
                case 10:
                    $r = 'A';
                    break;
                case 11:
                    $r = 'B';
                    break;
                case 12:
                    $r = 'C';
                    break;
                case 13:
                    $r = 'D';
                    break;
                case 14:
                    $r = 'E';
                    break;
                case 15:
                    $r = 'F';
                    break;
            }
        }
        $hex = $r . $hex;
        $dec = floor($dec / 16);
        $arr[] = $showDec . " / 16 = " . $dec . " R: " . $r;
        $showDec = $dec;
    }
    echo "<br>" . $title . implode("<br>",$arr) . "<br>Hexadecimal: " . $hex;
    return $hex;
}

function hexToDec(string $hex, bool $twoFunc = true, bool $lb = true):string {
    $title = "";
    if ($twoFunc) {
        $title = "<h3>Hexadecimal to Decimal</h3>";
    } elseif($lb) {
        $lb = "<br><br>";
    }
    $arr = str_split(strrev($hex));
    $dec = 0;
    $count = 1;
    $array = [];
    $countArr = [];
    foreach ($arr as $bit) {
        switch ($bit) {
            case 'A':
                $bit = 10;
                break;
            case 'B':
                $bit = 11;
                break;
            case 'C':
                $bit = 12;
                break;
            case 'D':
                $bit = 13;
                break;
            case 'E':
                $bit = 14;
                break;
            case 'F':
                $bit = 15;
                break;
        }
        $bit = intval($bit);
        $value = $bit * $count;
        $dec += $value;
        array_push($array, ($bit . " * " . $count . " = " . $value));
        array_push($countArr, $value);
        $count *= 16;
    }
    $result = implode("<br>",$array);
    $countValue = "";

    for ($i = 0; $i < count($countArr); $i++) {
        if ($i === count($countArr) - 1){
            $countValue .= $countArr[$i]." = ";
            break;
        }
        $countValue .= $countArr[$i]." + ";
    }
    echo $lb . $title . $result . "<br>Decimal: " . $countValue. $dec;
    return $dec;
}

function binToHex(string $bin):string {
    echo "<br><h3>Binary to Hexadecimal</h3>";
    $dec = binToDec($bin, false, false);
    return decToHex($dec, false);
}

function hexToBin(string $hex):string {
    echo "<br><h3>Hexadecimal to Binary</h3>";
    $dec = hexToDec($hex, false, false);
    return decToBin($dec, false);
}

//decToBin("127");
//binToDec("01111111");
//decToHex("127");
//hexToDec("7F");
//binToHex("01111111");
//hexToBin("7F");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="css/style.css" rel="stylesheet">
        <title>M114 Rechner</title>
    </head>
    <body>
        <section class="mx-auto sm:w-fit flex justify-center items-center h-screen">
            <div class="bg-slate-100 rounded-lg w-fit opacity-80">
                <div class="w-fit px-3 mx-auto">
                    <?php returnSum() ?>
                </div>
            </div>
        </section>
    </body>
</html>
