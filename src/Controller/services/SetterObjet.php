<?php

namespace App\Controller\services;

class SetterObjet
{
    /**
     * @descript hydrate l'object avec la data en fonction des champs
     * @param $objet
     * @param $data array
     * @param $lstfield array liste de champs a hydraté !
     * @param string $exclude cet methode ne sera pas appeller
     * @return void
     * @throws \Exception
     */
    public static function hydrate($objet , $data , $lstfield, $exclude = "null")
    {

        foreach($lstfield as $field)
        {
            if($data[$field] == null || $field === $exclude) continue;

            $names = explode("_",$field);
            $name2 = array_map(function($n){
                return ucfirst($n);
            },$names);
            $methode = "set".implode($name2);

            if(\method_exists($objet,$methode) )
            {
                $objet->$methode($data[$field]);
            }
        }
        return $objet;
    }
}