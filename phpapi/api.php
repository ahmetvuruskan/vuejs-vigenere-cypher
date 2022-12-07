<?php
if (isset($_GET['type']) && $_GET['type'] == 'encrypt') {

    echo encrypt($_GET);
}
if (isset($_GET['type']) && $_GET['type'] == "decrypt") {
    echo decrypt($_GET);
}
function getSubText($data)
{
    header("Access-Control-Allow-Origin: *");
    $text = str_split($data['text']);
    $alphabet = ['a', 'b', 'c', 'd', 'b', 'c', 'd', 'e', 'f', 'g', 'ğ', 'h', 'i', 'ı', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'r', 's', 'ş', 't', 'u', 'ü', 'v', 'y', 'z'];
    $k = 0;
    $count = count($text);

    while (count($text) < 16) {
        $text[$count] = $alphabet[$k];
        $k++;
        $count++;
    }
    $matrix = array();
    $index = 0;
    for ($i = 1; $i <= 4; $i++) {
        for ($j = 1; $j <= 4; $j++) {
            $matrix[$j][$i] = $text[$index];
            $index++;

        }

    }
    return implode("", $matrix[1]) . implode("", $matrix[2]) . implode("", $matrix[3]) . implode("", $matrix[4]);


}


function encrypt($data)
{
    header("Access-Control-Allow-Origin: *");
    $requiredParameters = ['cipher', 'text'];
    $parameters = array_keys($_GET);
    if (in_array($requiredParameters, $parameters)) {
        return ['message' => 'Missing Parameters', 'code' => 500];
    }
    $text = getSubText($data);
    $pswd = strtolower($data['cipher']);
    $ki = 0;
    $kl = strlen($pswd);
    $length = strlen($text);
    for ($i = 0; $i < $length; $i++) {
        if (ctype_alpha($text[$i])) {
            if (ctype_upper($text[$i])) {
                $text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
            }
            else {
                $text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
            }
            $ki++;
            if ($ki >= $kl) {
                $ki = 0;
            }
        }
    }

    return json_encode([
        'subText' => getSubText($data),
        'encrypted' => $text,
        'message' => 'Success',
        'code' => 200
    ]);
}

function decrypt($data)
{
    header("Access-Control-Allow-Origin: *");
    $pswd = strtolower($data['cipher']);
    $text = $data['text'];

    $ki = 0;
    $kl = strlen($pswd);
    $length = strlen($text);

    for ($i = 0; $i < $length; $i++) {
        if (ctype_alpha($text[$i])) {
            if (ctype_upper($text[$i])) {
                $x = (ord($text[$i]) - ord("A")) - (ord($pswd[$ki]) - ord("a"));

                if ($x < 0) {
                    $x += 26;
                }

                $x = $x + ord("A");

                $text[$i] = chr($x);
            } else {
                $x = (ord($text[$i]) - ord("a")) - (ord($pswd[$ki]) - ord("a"));

                if ($x < 0) {
                    $x += 26;
                }

                $x = $x + ord("a");

                $text[$i] = chr($x);
            }

            $ki++;
            if ($ki >= $kl) {
                $ki = 0;
            }
        }
    }
    $_GET['text'] = $text;
    $decrypted = getSubText($_GET);
    return json_encode([
        'decrypted' => $decrypted,
        'subText' => $text,
        'message' => 'Success',
        'code' => 200
    ]);
}