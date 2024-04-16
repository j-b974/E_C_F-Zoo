<?php

namespace App\Controller\services\Validateur;

class ValideCompteRenduEmployer extends Valide
{
    public function __construct(array $data, $lstNomAnimal)
    {
        parent::__construct($data);

        $this->validator->rule('required',['animal','nouriture', 'quantite', 'date', 'heure',]);
        $this->validator->rule('lengthMax',['animal','nouriture', 'quantite', 'date', 'heure'],200);
        $this->validator->rule('subset','animal',array_keys($lstNomAnimal) );
    }

}