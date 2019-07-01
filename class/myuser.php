<?php
    class myuser
{
    private $login;
   private $pwd;   
   
 public  function __construct($login,$pwd)
  {
   $this->login = $login;
    $this->pwd = $pwd; 
  
      
  }
  public function getLogin(){
    return $this->login;
    
}
public function setLogin($login){
    $this->login= $login;
}
public function getPwd(){
    return $this->pwd;
}
public function setPwd($pwd){
    $this->pwd = $pwd;
}
    
       
}
    









?>