<?php
function decToBin(string $dec, bool $twoFunc = true):string {
    $title = "";
    if ($twoFunc) {
        $title = "<h4>Decimal to Binary</h4>";
    }
    $dec = intval($dec);
    $bin = '0';
    $arr = [];
    $showDec = $dec;
    while ($dec > 0) {
        $bin = $dec % 2 . $bin;
        $r = $dec % 2;
        $dec = floor($dec / 2);
        $arr[] = $showDec . " / 2 = " . $dec . " R: " . $r;
        $showDec = $dec;
    }
    echo "<br><br>" . $title . implode("<br>",$arr) . "<br>Binary: " . strrev($bin);
    return strrev($bin);
}

function binToDec(string $bin, bool $twoFunc = true, bool $lb = true):string {
    $title = "";
    $lb = "";
    if ($twoFunc) {
        $title = "<h4>Binary to Decimal</h4>";
    } elseif($lb) {
        $lb = "<br><br>";
    }
    $arr = str_split(strrev($bin));
    $dec = 0;
    $count = 1;
    $array = [];
    $countArr = [];
    foreach ($arr as $bit) {
        $bit = intval($bit);
        if($bit === 1) {
            $dec += ($bit * $count);
        }
        array_push($array, ($bit . " * " . $count . " = " . ($bit * $count)));
        array_push($countArr, $dec);
        $count *= 2;
    }
    $result = implode("<br>",$array);
    $countValue = "";

    for ($i = 1; $i < count($countArr); $i++) {
        if ($i === count($countArr) - 2){
            $countValue .= $countArr[$i-1]." = ";
            break;
        }
        $countValue .= $countArr[$i-1]." + ";
    }
    echo $lb . $title . $result . "<br>Decimal: " . $countValue . $dec;
    return $dec;
}

function decToHex(string $dec, bool $twoFunc = true):string {
    $title = "";
    if ($twoFunc) $title = "<h4>Decimal to Hexadecimal</h4>";
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
        $title = "<h4>Decimal to Binary</h4>";
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
    echo "<br><h4>Binary to Hexadecimal</h4>";
    $dec = binToDec($bin, false, false);
    return decToHex($dec, false);
}

function hexToBin(string $hex):string {
    echo "<br><h4>Hexadecimal to Binary</h4>";
    $dec = hexToDec($hex, false, false);
    return decToBin($dec, false);
}

decToBin("127");
binToDec("01111111");
decToHex("127");
hexToDec("7F");
binToHex("01111111");
hexToBin("7F");
