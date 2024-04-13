<?php

namespace App\Controller\services\Validateur;

class ValideCompteRenduVeterinaire extends Valide
{

    public function __construct(array $data, $lstNomAnimal)
    {
        parent::__construct($data);

        $this->validator->rule('required',['animal','nouriture', 'quantite', 'detailEtat', 'etat']);
        $this->validator->rule('lengthMax',['animal','nouriture', 'quantite', 'detailEtat', 'etat'],200);
        $this->validator->rule('subset','animal',array_keys($lstNomAnimal) );
    }
}