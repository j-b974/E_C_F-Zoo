<?php

namespace App\Controller\services;

class UploadImageZoo
{
    public static function upload($Objet, string $pathDirectory )
    {
        $dossier = PATH_IMAGE.$pathDirectory;
        $image = $Objet->getImage();
        if(empty($image) || $Objet->isUploaded()) return ;

        if(file_exists($dossier) === false)
        {
            mkdir($dossier , 0777 , true);
        }
        if(!empty($Objet->getoldImage())){
            $oldFile = $dossier.DIRECTORY_SEPARATOR.$Objet->getOldImage();
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
        }
        $fileName = uniqid().'.jpg';
        move_uploaded_file($image , $dossier.DIRECTORY_SEPARATOR.$fileName);
        $Objet->setImage($fileName);

    }
    public static function deleteImage($Objet , string $pathDirectory)
    {
        if(!empty($Objet->getImage()))
        {
            $file = PATH_IMAGE.$pathDirectory.DIRECTORY_SEPARATOR.$Objet->getImage();
            if(file_exists($file))
            {
                unlink($file);
            }
        }
    }

}