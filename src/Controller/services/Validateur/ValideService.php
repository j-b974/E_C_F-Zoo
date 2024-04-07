<?php

namespace App\Controller\services\Validateur;

class ValideService extends Valide
{
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validator->rule('required',['nom','description']);
        $this->validator->rule('lengthMax',['nom','description'],200);
    }
}