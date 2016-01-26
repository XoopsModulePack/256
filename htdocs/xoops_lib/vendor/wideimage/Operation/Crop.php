<?php
/*
    WideImage_for_xoops
    By CHG-WEB
    2012/04/08
    Cédric MONTUY (montuy337513 / black_beard)
    Original author : Gaspar Kozak
*/
if (!defined('XOOPS_ROOT_PATH')) {
    die("XOOPS root path not defined");
}
class WideImage_Operation_Crop{
    function execute($img, $left, $top, $width, $height){
        $width = WideImage_Coordinate::fix($width, $img->getWidth(), $width);
        $height = WideImage_Coordinate::fix($height, $img->getHeight(), $height);
        $left = WideImage_Coordinate::fix($left, $img->getWidth(), $width);
        $top = WideImage_Coordinate::fix($top, $img->getHeight(), $height);
        if ($left < 0){
            $width = $left + $width;
            $left = 0;
        }
        if ($width > $img->getWidth() - $left)
            $width = $img->getWidth() - $left;
        if ($top < 0){
            $height = $top + $height;
            $top = 0;
        }
        if ($height > $img->getHeight() - $top)
            $height = $img->getHeight() - $top;
        if ($width <= 0 || $height <= 0)
            throw new WideImage_Exception("Can't crop outside of an image.");
        $new = $img->doCreate($width, $height);
        if ($img->isTransparent() || $img instanceof WideImage_PaletteImage){
            $new->copyTransparencyFrom($img);
            if (!imagecopyresized($new->getHandle(), $img->getHandle(), 0, 0, $left, $top, $width, $height, $width, $height))
                throw new WideImage_GDFunctionResultException("imagecopyresized() returned false");
        }else{
            $new->alphaBlending(false);
            $new->saveAlpha(true);
            if (!imagecopyresampled($new->getHandle(), $img->getHandle(), 0, 0, $left, $top, $width, $height, $width, $height))
                throw new WideImage_GDFunctionResultException("imagecopyresampled() returned false");
        }
        return $new;
    }
}
?>