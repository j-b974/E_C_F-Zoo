<?php

namespace App\Controller\services\Validateur;


class ValideGestionCompte extends Valide
{
    public function __construct($data)
    {
        parent::__construct($data);
        $this->validator->rule('required',['username','nom','prenom','password', 'label']);
        $this->validator->rule('lengthMax',['username','nom','prenom','password', 'label'],200);

    }

}