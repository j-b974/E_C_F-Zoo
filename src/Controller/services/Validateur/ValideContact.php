<?php

namespace App\Controller\services\Validateur;

class ValideContact extends Valide
{
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->validator->rule('required',['addressEmail','titre','description']);
        $this->validator->rule('email', 'addressEmail');
        $this->validator->rule('lengthMax',['addressEmail','titre','description'],200);

    }
}