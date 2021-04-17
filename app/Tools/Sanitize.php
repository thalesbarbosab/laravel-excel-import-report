<?php

namespace App\Tools;

class Sanitize
{
    public function onlyNumbers($string)
    {
        return preg_replace('/[^0-9]/', '', $string);
    }
    function validCpf($string){
        $clear_cpf = $this->onlyNumbers($string);
        if(is_numeric($clear_cpf)){
          $clear_cpf = substr(str_repeat("0",11).$clear_cpf, -11);
          return $clear_cpf;
        }
        return null;
      }
}
