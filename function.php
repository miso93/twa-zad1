<?php
error_reporting(-1);

$font = 'fonts/arial.ttf';

require __DIR__ . '/vendor/autoload.php';

$colors = [
    "#2364aa", // A
    "#3da5d9", // B
    "#73bfb8", // C
    "#fec601", // D
    "#ea7317", // E
    "#CB9173", // FX
    "#E0D68A"  // FN
];
$data = [
    "2012_13" => [
        "data" => [
            "A"  => 20,
            "B"  => 11,
            "C"  => 13,
            "D"  => 7,
            "E"  => 5,
            "FX" => 0,
            "FN" => 1,
        ],
        "title" => "I. Štatistiky úspešnosti študentov na predmete TWA - rok 2012/13"
    ],
    "2013_14" => [
        "data" => [
            "A"  => 20,
            "B"  => 19,
            "C"  => 6,
            "D"  => 3,
            "E"  => 1,
            "FX" => 0,
            "FN" => 0,
        ],
        "title" => "II. Štatistiky úspešnosti študentov na predmete TWA - rok 2013/14"
    ],
    "2014_15" => [
        "data" => [
            "A" => 9,
            "B" => 19,
            "C" => 22,
            "D" => 0,
            "E" => 0,
            "FX" => 0,
            "FN" => 3,
        ],
        "title" => "III. Štatistiky úspešnosti študentov na predmete TWA - rok 2014/15"
    ]
];


function hexColorAllocate($im,$hex){
    $hex = ltrim($hex,'#');
//    var_dump(substr($hex,0,2));
    $a = hexdec(substr($hex,0,2));
    $b = hexdec(substr($hex,2,2));
    $c = hexdec(substr($hex,4,2));
    var_dump($a);var_dump($b);var_dump($c);
    return imagecolorallocate($im, $a, $b, $c);
}

