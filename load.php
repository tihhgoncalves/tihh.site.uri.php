<?php
class tihh_uri {


   public function Protocolo(){

    if(@$_SERVER['HTTPS'] == 'on' ) {
      $protocolo = 'https://'; //Atribui o valor http
    } else {
      $protocolo = 'http://'; //Atribui o valor https
    }

    return $protocolo;
  }

  public function Host(){
    return $_SERVER['HTTP_HOST']; //Atribui o valor www.example.com.br
  }

  public function scriptName(){
    
    $scr = dirname($_SERVER['SCRIPT_NAME']);
    
    if(!empty($scr) || substr_count($scr, '/') > 1) {
      $scriptName = $scr . '/'; //atribui o valor do diretório com uma "/" na sequência
    } else {
      $scriptName = ''; //atribui um valor vazio
    }
    
    return $scriptName;
  }
  
  public function base() {
    //Concatena os valores
    return $this->Protocolo() . $this->Host() . $this->scriptName();

  }
}
?>
