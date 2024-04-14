<?php

namespace App\Controller\services\Validateur;

class ValideHabitat extends Valide
{
     public function __construct(array $data)
    {
        parent::__construct($data);
        parent::__construct($data);
        $this->validator->rule('required',['nom','description','commentaireHabitat']);
        $this->validator->rule('lengthMax',['nom','description','commentaireHabitat'],200);
    }

}