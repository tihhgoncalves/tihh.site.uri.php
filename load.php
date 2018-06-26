<?php
class tihh_URI {

  static private $protocolo;
  static private $host;
  static private $scriptName;
  static private $finalBase;

  protected function Protocolo(){
    
    if(strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === false) {
      self::$protocolo = 'http://'; //Atribui o valor http
    } else {
      self::$protocolo = 'https://'; //Atribui o valor https
    }
    
    return self::$protocolo;
  }
  
  protected function Host(){
    self::$host = $_SERVER['HTTP_HOST']; //Atribui o valor www.example.com.br

    return self::$host;
  }

  protected function scriptName(){
    
    $scr = dirname($_SERVER['SCRIPT_NAME']);
    
    if(!empty($scr) || substr_count($scr, '/') > 1) {
      self::$scriptName = $scr . '/'; //atribui o valor do diretório com uma "/" na sequência
    } else {
      self::$scriptName = ''; //atribui um valor vazio
    }
    
    return self::$scriptName;
  }
  
  public function base() {
    //Concatena os valores
    self::$finalBase = self::Protocolo() . self::Host() . self::scriptName();
    
    return self::$finalBase;
  }
}
?>