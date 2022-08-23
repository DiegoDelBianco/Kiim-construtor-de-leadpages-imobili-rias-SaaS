<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMedia extends Model
{
    use HasFactory;


    protected $pathTeamDir = 'images/team_medias/team-<team_id>/';
    protected $pathDir = '<size>/';
    protected $mediaName = 'm<media_id>-<media_name>';


    private function get_path($size, $ext = '.webp'){
        $pathTeam = $this->pathTeamDir;
        $pathTeam = public_path(str_replace("<team_id>", $this->team_id, $pathTeam));
        if(!is_dir($pathTeam)){
            mkdir($pathTeam, 0777, true);
        }

        $path = $this->pathDir;
        $path = $pathTeam.str_replace("<size>", $size, $path);
        if(!is_dir($path)){
            mkdir($path, 0777, true);
        }

        $mediaName = $this->mediaName;
        $mediaName = str_replace("<media_id>", $this->id, $mediaName);
        $mediaName = str_replace("<media_name>", $this->name, $mediaName);


        return $path.$mediaName.$ext;
    }


    public function pathLogoOriginal($noPublic = FALSE){

        $path = $this->get_path("logo/original", '.png') ;

        if($noPublic){
            $path = str_replace(public_path('/'), '', $path);
        }

        return $path;
    }


    public function pathLogo16($noPublic = FALSE){

        $path = $this->get_path("logo/16x16", '.png') ;

        if($noPublic){
            $path = str_replace(public_path('/'), '', $path);
        }

        return $path;
    }


    public function pathLogo150($noPublic = FALSE){

        $path = $this->get_path("logo/h150", '.png') ;

        if($noPublic){
            $path = str_replace(public_path('/'), '', $path);
        }

        return $path;
    }


    public function storeLogo($file){

        $tmp = $file['tmp_name'];
        $sourceProperties = getimagesize($tmp);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];

        //cutType true adapta a imagem, cutType false corta a imagem
        $cutType = FALSE;

        $gdInstance = NULL;
        switch ($uploadImageType)
        {
            case IMAGETYPE_JPEG:
                $gdInstance = \imagecreatefromjpeg($tmp);
            break;

            case IMAGETYPE_GIF:
                $gdInstance = \imagecreatefromgif($tmp);
            break;

            case IMAGETYPE_PNG:
                $gdInstance = \imagecreatefrompng($tmp);
            break;

            case IMAGETYPE_JPG:
                $gdInstance = \imagecreatefrompng($tmp);
            break;

            case IMAGETYPE_WEBP:
                $gdInstance = \imagecreatefromwebp($tmp);
            break;
        }
        //define os novos width e height, sem distorcer;
        $radio = $sourceImageWidth / $sourceImageHeight;

        //Salva a original
        $original = $gdInstance;
        imagealphablending($original, false);
        imagesavealpha($original, true);
        imagepng($original, $this->pathLogoOriginal());

        //Gera a 16
        $newDim = $this->get_dim($radio, 'auto', 16);
        $image16 = imagescale($gdInstance, $newDim['width'], $newDim["height"]);
        imagealphablending($image16, false);
        imagesavealpha($image16, true);
        imagepng($image16, $this->pathLogo16());

        //Gera a 150
        $newDim = $this->get_dim($radio, 'auto', 150);
        $image150 = imagescale($gdInstance, $newDim['width'], $newDim["height"]);
        imagealphablending($image150, false);
        imagesavealpha($image150, true);
        imagepng($image150, $this->pathLogo150());

        return TRUE;

    }

    private function get_dim($radio, $width, $height){
        // Caso o novo Width ou height for auto, calcula o mesmo levando em conta  a proporção da imagem
        if($width == "auto")
            $width = $height * $radio;
        
        if($height == "auto")
            $height = $width / $radio;

        return ['width' => $width, 'height' => $height];
    }

    private function prepare_image($gdInstance, $newWidth, $newHeight, $oriWidth, $oriHeight, $cut = TRUE){
        if($newWidth == 'auto' & $newHeight == 'auto'){
            $newHeight = $oriHeight;
            $newWidth = $oriWidth;
        }
        //define os novos width e height, sem distorcer;
        $radio = $oriWidth / $oriHeight;

        $newDim = $this->get_dim($radio, $newWidth, $newHeight);
        $newWidth = $newDim['width'];
        $newHeight = $newDim['height'];

        $nw = $newWidth;
        $nh = $newHeight;
        $left = 0;
        $top = 0;
        if($radio > 1){
            if($cut){
                $nh = $newWidth / $radio; 
                $top = ($newHeight - $nh) / 2;
            }else{
                $nw = $newHeight * $radio;
                $left = ($newWidth - $nw) / 2;
            }
        }else{
            if($cut){
                $nw = $newHeight * $radio; 
                $left = ($newWidth - $nw) / 2;
            }else{
                $nh = $newWidth / $radio;
                $top = ($newHeight - $nh) / 2;
            }
        }

        //Cria nova imagem em em branco nos tamanhos novos
        $imageNew = ImageCreateTrueColor($newWidth, $newHeight);
        //imagecolortransparent($imageNew, imagecolorallocate($imageNew, 0, 0, 0));
        //Adiciona a imagem por cima como uma layer, expremida na tamanho novo
        imagecopyresampled($imageNew, $gdInstance, 0, 0, 0, 0, $newWidth, $newHeight, $oriWidth, $oriHeight);
        
        //adiciona desfoque na imagem toda
        for ($x=1; $x<=15; $x++) imagefilter($imageNew, IMG_FILTER_GAUSSIAN_BLUR);
        //adiciona um pouco do brilho da imagem
        imagefilter($imageNew, IMG_FILTER_BRIGHTNESS, 30);


        //adiciona a imgem por novamente por cima da desfocada, mas sem ditorcer;
        imagecopyresampled($imageNew, $gdInstance, $left, $top, 0, 0, $nw, $nh, $oriWidth, $oriHeight);

        //Retorna imagem
        return $imageNew;
    }
}
