<?php

namespace App\Controller\services;

class BuildInput
{
    /**
     * @var data instence de class
     */
    private $data;

    private $error;

    public function __construct($dt, array $error)
    {
        $this->data = $dt;
        $this->error = $error;
    }

    public function select(string $key, string $label, array $option)
    {

        $nb_cat = count($option);
        $opt = [];
        foreach ($option as $k => $v) {
            $select = null;
            $role = (bool) $this->data->getRole() ;
            if( $role) {
                if ($v ==  $this->data->getRole()->getLabel()) {

                    $select = ' selected';
                }
            }

            $opt[] = "<option value ='$v' $select >$v</option>";
        }
        $opt_str = implode('', $opt);

        return <<<HTML
        <div class="form-group mb-3">
            <label class="font-weight-bold mb-2">$label</label> 
            <select class="form-select {$this->getInvalid($key)}" name ="{$key}"  size='{$nb_cat}'>
                {$opt_str}
            </select>
            {$this->getFeedback($key)}
        </div>
HTML;
    }

    public function getInput(string $key, string $label)
    {
        $type = $key === 'password' ? 'password' : 'text';
        return <<<HTML
            <div class="form-floating mb-3  text-dark">
                
                <input class="form-control {$this->getInvalid($key)}" type="{$type}" name="{$key}" id="{$key}" value = "{$this->getMethode($key)}" placeholder="{$key}@example.com">
                <label class="font-weight-bold" for="floatingInput">{$label}</label>
                {$this->getFeedback($key)}
            </div>
HTML;
    }

    public function getTextarea($key, string $label): ?string
    {
        return <<<HTML
        <div class="form-floating mb-3">
            <textarea class="form-control {$this->getInvalid($key)}" placeholder="Leave a comment here"  type="text" name="{$key}" id="floatingTextarea" style="height: 200px">{$this->getMethode($key)}</textarea>
            <label class="text-dark" for="floatingTextarea">{$label}</label>
            {$this->getFeedback($key)}
        </div>
HTML;

    }

    private function getMethode($key)
    {
        $met = 'get' .Ucfirst($key);

        $methode = $this->data->$met();
        if ($methode instanceof \DateTimeInterface) {
            return $methode->format('Y-m-d h:i:s');
        }
        return $methode;
    }

    private function getInvalid(string $key): ?string
    {
        return (!isset($this->error[$key])) ? '' : 'is-invalid';
    }

    private function getFeedback(string $key): ?string
    {

        if (key_exists($key, $this->error)) {
            $e = implode('<br/>', $this->error[$key]);
            return <<<HTML
                <div class="invalid-feedback text-warning ps-2">$e</div>
HTML;
        }
        return '';
    }
}
