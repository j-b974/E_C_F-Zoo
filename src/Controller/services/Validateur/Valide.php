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