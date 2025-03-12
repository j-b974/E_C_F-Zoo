<?php

namespace App\Controller\services\Validateur;
class ValideAvis extends Valide
{
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validator->rule('required',['pseudo','commentaire']);
        $this->validator->rule('lengthMax',['pseudo','commentaire'],200);
    }
}