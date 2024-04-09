<?php

namespace App\Controller\services\Validateur;

class ValideAnnimale extends Valide
{
        public function __construct(array $data, array $lstLabelRace , array $lstNomHabitat)
        {
            parent::__construct($data);
            $this->validator->rule('required',['prenom','etat']);
            $this->validator->rule('lengthMax',['prenom','etat'],200);
            $this->validator->rule('subset','label',array_keys($lstLabelRace) );
            $this->validator->rule('subset','nom',array_keys($lstNomHabitat) );
        }
}