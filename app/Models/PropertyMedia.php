<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyMedia extends Model
{
    use HasFactory;

    protected $pathTeamDir = 'images/team_medias/team-<team_id>/';
    protected $pathDir = '<size>/';
    protected $mediaName = 'p<property_id>m<media_id>-<media_name>.webp';


    private function get_path($team_id, $size, $property_id, $media_id, $media_name){
        $pathTeam = $this->pathTeamDir;
        $pathTeam = public_path(str_replace("<team_id>", $team_id, $pathTeam));
        if(!is_dir($pathTeam)){
            mkdir($pathTeam, 0777, true);
        }

        $path = $this->pathDir;
        $path = $pathTeam.str_replace("<size>", $size, $path);
        if(!is_dir($path)){
            mkdir($path, 0777, true);
        }

        $mediaName = $this->mediaName;
        $mediaName = str_replace("<property_id>", $property_id, $mediaName);
        $mediaName = str_replace("<media_id>", $media_id, $mediaName);
        $mediaName = str_replace("<media_name>", $media_name, $mediaName);


        return $path.$mediaName;
    }

    public function pathOriginal($noPublic = FALSE){
        $property = $this->property;

        $path = $this->get_path(
            $property->team_id, 
            "originals", 
            $property->id, 
            $this->id, 
            $this->name) ;

        if($noPublic){
            $path = str_replace(public_path('/'), '', $path);
        }

        return $path;
    }

    public function path200($noPublic = FALSE){
        $property = $this->property;

        $path = $this->get_path(
            $property->team_id, 
            "400x225", 
            $property->id, 
            $this->id, 
            $this->name) ;

        if($noPublic){
            $path = str_replace(public_path('/'), '', $path);
        }

        return $path;
        
    }

    public function path400x225($noPublic = FALSE){
        $property = $this->property;

        $path = $this->get_path(
            $property->team_id, 
            "400x225", 
            $property->id, 
            $this->id, 
            $this->name) ;

        if($noPublic){
            $path = str_replace(public_path('/'), '', $path);
        }

        return $path;
        
    }

    public function path1200x675($noPublic = FALSE){
        $property = $this->property;

        $path = $this->get_path(
            $property->team_id, 
            "1200x675", 
            $property->id, 
            $this->id, 
            $this->name) ;

        if($noPublic){
            $path = str_replace(public_path('/'), '', $path);
        }

        return $path;
        
    }


    public function path800($noPublic = FALSE){
        $property = $this->property;

        $path = $this->get_path(
            $property->team_id, 
            "800x800", 
            $property->id, 
            $this->id, 
            $this->name) ;

        if($noPublic){
            $path = str_replace(public_path('/'), '', $path);
        }

        return $path;
    }

    public function storeImages($file, $cutImage = TRUE){

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

        //Salva a original
        imagewebp($gdInstance, $this->pathOriginal());

        //Gera a 400x225
        $image400x225 = $this->prepare_image(
            $gdInstance, 
            400, 
            225, 
            $sourceImageWidth, 
            $sourceImageHeight, 
            $cutImage);
        imagewebp($image400x225, $this->path400x225());

        //Gera a 1200x675
        $image800 = $this->prepare_image(
            $gdInstance, 
            1200, 
            675, 
            $sourceImageWidth, 
            $sourceImageHeight, 
            $cutImage);
        imagewebp($image800, $this->path1200x675());

        return TRUE;
    }

    private function prepare_image($gdInstance, $newWidth, $newHeight, $oriWidth, $oriHeight, $cut = TRUE){
        
        //define os novos width e height, sem distorcer;
        $radio = $oriWidth / $oriHeight;
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

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
