<?php

$decToBin = false;
$binToDec = false;
$decToHex = false;
$hexToDec = false;
$binToHex = false;
$hexToBin = false;

foreach ($_POST['choose'] as $value) {
    switch ($value) {
        case 'decToBin':
            $decToBin = true;
            break;
        case 'binToDec':
            $binToDec = true;
            break;
        case 'decToHex':
            $decToHex = true;
            break;
        case 'hexToDec':
            $hexToDec = true;
            break;
        case 'binToHex':
            $binToHex = true;
            break;
        case 'hexToBin':
            $hexToBin = true;
            break;
    }
}
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
                    <h2 class="text-2xl mb-8">Wähle, welche Umrechnungen du durchführen möchtest</h2>
                    <form action="index.php" method="post">
                        <div class="grid auto-rows-max gap-4 mb-4">
                            <div class="grid grid-cols-2">
                                <label for="decToBin" <?php if ($decToBin !== true):?> hidden <?php endif;?>>Dezimal zu Binär:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="decToBin" name="choose[]">
                                </label>
                            </div>
                            <div class="grid grid-cols-2">
                                <label for="binToDec" <?php if ($binToDec !== true):?> hidden <?php endif;?>>Binär zu Dezimal:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="binToDec" name="choose[]">
                                </label>
                            </div>
                            <div class="grid grid-cols-2">
                                <label for="decToHex" <?php if ($decToHex !== true):?> hidden <?php endif;?>>Dezimal zu Hexadezimal:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="decToHex" name="choose[]">
                                </label>
                            </div>
                            <div class="grid grid-cols-2">
                                <label for="hexToDec" <?php if ($hexToDec !== true):?> hidden <?php endif;?>>Hexadezimal zu Dezimal:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="hexToDec" name="choose[]">
                                </label>
                            </div>
                            <div class="grid grid-cols-2">
                                <label for="binToHex" <?php if ($binToHex !== true):?> hidden <?php endif;?>>Binär zu Hexadezimal:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="binToHex" name="choose[]">
                                </label>
                            </div>
                            <div class="grid grid-cols-2">
                                <label for="hexToBin" <?php if ($hexToBin !== true):?> hidden <?php endif;?>>Hexadezimal zu Binär:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="hexToBin" name="choose[]">
                                </label>
                            </div>
                        </div>
                        <button class="text-left rounded-full bg-sky-500 py-1 px-3 w-fit mb-4" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>
