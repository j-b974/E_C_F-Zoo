<?php

namespace App\Controller\services\Validateur;

use App\Model\repository\TableUtilisateur;

class valideConnection extends Valide
{
    private array $data = [];

    public function __construct(array $PostData , TableUtilisateur $Tutilisateur)
    {
        parent::__construct($PostData);
        $this->data = $PostData;
        $this->validator->rule('required',['username','password']);
        $this->validator->rule('lengthMax', ['username','password'], 225);
        if(!$this->authentifieUtilisateur($Tutilisateur))
        {
            $this->validator->rule(function($fiel,$value)
            {
                return false;
            }, ['username','password'], 'incorrect !!!');
        }

    }
    private function authentifieUtilisateur(TableUtilisateur $Tutilisateur)
    {
        return  $Tutilisateur->Validation($this->data['username'], $this->data['password']);
    }


}