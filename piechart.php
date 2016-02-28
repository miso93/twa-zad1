<?php
require_once "function.php";

/**
 *  Zdroj: http://php.net/manual/en/function.imagefilledarc.php
 */

$values = explode(',', $_GET['values']);
$labels = explode(',', $_GET['labels']);
$title = $_GET['title'];

$total = count($values);
$data = ($total == 0) ? array(360) : array_values($values);
//$keys = ($total == 0) ? array("") : array_keys($values);
$radius = 30;
$imgx = 1400 + $radius;
$imgy = 600 + $radius;
$cx = 400 + $radius;
$cy = 200 + $radius;
$sx = 800;
$sy = 400;
$sz = 150;
$data_sum = array_sum($data);
$angle_sum = array(-1 => 0, 360);
$typo = "./fonts/arial.ttf";
$im = imagecreate($imgx, $imgy);
imagecolorallocate($im, 255, 255, 255);

// write the columns over the background
$colord = [];
$colorsf = [];

$white = imagecolorallocate($im, 0xff, 0xff, 0xff);

$factorx = array();
$factory = array();
for ($i = 0; $i < $total; $i++) {
//    if($data[$i] > 0){

    $angle[$i] = (($data[$i] / $data_sum) * 360);
    $angle_sum[$i] = array_sum($angle);

    $hex = ltrim($colors[$i], '#');
    $a = hexdec(substr($hex, 0, 2));
    $b = hexdec(substr($hex, 2, 2));
    $c = hexdec(substr($hex, 4, 2));

    $colorsf[$i] = imagecolorallocate($im, $a, $b, $c);
    $colord[$i] = imagecolorallocate($im, $a / 1.5, $b / 1.5, $c / 1.5);


    $factorx[$i] = cos(deg2rad(($angle_sum[$i - 1] + $angle_sum[$i]) / 2));
    $factory[$i] = sin(deg2rad(($angle_sum[$i - 1] + $angle_sum[$i]) / 2));

}
for ($z = 1; $z <= $sz; $z++) {
    for ($i = 0; $i < $total; $i++) {
        if ($data[$i] > 0) {
            imagefilledarc($im, $cx + ($factorx[$i] * $radius), (($cy + $sz) - $z) + ($factory[$i] * $radius), $sx, $sy, $angle_sum[$i - 1], $angle_sum[$i], $colord[$i], IMG_ARC_PIE);
        }

    }
}
for ($i = 0; $i < $total; $i++) {
    if ($data[$i] > 0) {
        imagefilledarc($im, $cx + ($factorx[$i] * $radius), $cy + ($factory[$i] * $radius), $sx, $sy, $angle_sum[$i - 1], $angle_sum[$i], $colorsf[$i], IMG_ARC_PIE);
    }
    $hex = ltrim($colors[$i], '#');
    $a = hexdec(substr($hex, 0, 2));
    $b = hexdec(substr($hex, 2, 2));
    $c = hexdec(substr($hex, 4, 2));
    $color = imagecolorallocate($im, $a, $b, $c);

    imagefilledrectangle($im, 900, 50 + ($i * 30 * 2), 950, 100 + ($i * 30 * 2), $color);
    imagettftext($im, 40, 0, 970, 97 + ($i * 30 * 2), imagecolorallocate($im, 0, 0, 0), $typo, $labels[$i] . " - " . $data[$i] . " žiakov");
    if ($data[$i] > 0) {
        imagettftext($im, 40, 0, $cx + ($factorx[$i] * ($sx / 4)) - 40, $cy + ($factory[$i] * ($sy / 4)) + 10, imagecolorallocate($im, 0, 0, 0), $typo, number_format($data[$i] / array_sum($data) * 100, 2) . "%");
    }

}
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>