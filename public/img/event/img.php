<?php
header("Content-Type: image/jpeg");

$getid = isset($_GET['i']) ? trim($_GET['i']): 0;

$image= $getid.'.jpg';
$imageth= $getid.'-th.jpg';

if ( file_exists( $image ) ) {

    //$img= file_get_contents($image); //no gd

    $im=resize_image($image);
    if (imagefilter ( $im , IMG_FILTER_GRAYSCALE) )  echo imagejpeg($im);
    echo imagejpeg($im);
} else {
    $img= file_get_contents("blank.jpg");
    echo $img;
}

function resize_image($file, $w=150, $h=250, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*($r-$w/$h)));
        } else {
            $height = ceil($height-($height*($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}
?>