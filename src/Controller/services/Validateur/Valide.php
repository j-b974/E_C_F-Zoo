<?php

namespace App\Controller\services\Validateur;

use Valitron\Validator;

abstract class Valide
{
    protected $validator;

    public function __construct(array $data)
    {
        Validator::lang('fr');
        $v = new Validator($data);
        $this->validator = $v;

        $this->validator::addRule('image' , function($champ , $valeur , array $param , array $fields){
            return false;
        }, " n'est pas valide !!!");
    }
    public function valideur(): bool
    {
        return $this->validator->validate();

    }
    public function get_errors(): array
    {
        return $this->validator->errors();
    }

}