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
                    <h2 class="text-2xl mb-8">Wähle, welche Zahlen du umrechnen möchtest</h2>
                    <form action="index.php" method="post">
                        <div class="grid auto-rows-max gap-4 mb-4">
                            <div class="grid grid-cols-2">
                                <label for="decToBin" <?php if ($decToBin !== true):?> hidden <?php endif;?>>Dezimal zu Binär:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="decToBin" name="equation[decToBin]">
                                </label>
                            </div>
                            <div class="grid grid-cols-2">
                                <label for="binToDec" <?php if ($binToDec !== true):?> hidden <?php endif;?>>Binär zu Dezimal:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="binToDec" name="equation[binToDec]">
                                </label>
                            </div>
                            <div class="grid grid-cols-2">
                                <label for="decToHex" <?php if ($decToHex !== true):?> hidden <?php endif;?>>Dezimal zu Hexadezimal:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="decToHex" name="equation[decToHex]">
                                </label>
                            </div>
                            <div class="grid grid-cols-2">
                                <label for="hexToDec" <?php if ($hexToDec !== true):?> hidden <?php endif;?>>Hexadezimal zu Dezimal:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="hexToDec" name="equation[hexToDec]">
                                </label>
                            </div>
                            <div class="grid grid-cols-2">
                                <label for="binToHex" <?php if ($binToHex !== true):?> hidden <?php endif;?>>Binär zu Hexadezimal:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="binToHex" name="equation[binToHex]">
                                </label>
                            </div>
                            <div class="grid grid-cols-2">
                                <label for="hexToBin" <?php if ($hexToBin !== true):?> hidden <?php endif;?>>Hexadezimal zu Binär:
                                    <input class="rounded-md py-0.5 px-2" type="text" id="hexToBin" name="equation[hexToBin]">
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
