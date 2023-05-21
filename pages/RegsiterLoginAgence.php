<?php 
session_start();
require "connexion.php";

class RegisterAgence {

    public $ID;

    public $NAME;

    public $LOCALISATION;

    public $PHONE_NUMBER;

    public $EMAIL;

    public $PASSWORD;
    public $CONTACT;

    public $PHOTO;


    public function constructoruser($id,$name,$localisation,$phone_number,$contact,$email,$password,$photo)
    {
        $this->ID=$id;
        $this->NAME=$name;
        $this->LOCALISATION=$localisation;
        $this->PHONE_NUMBER=$phone_number;
        $this->CONTACT=$contact;
        $this->EMAIL=$email;
        $this->PASSWORD=$password;
        $this->PHOTO=$photo;
    }

public function register($conn){
    $st=$conn->prepare("insert into agence values(default,?,?,?,?,?,?,?)");
    $st->execute(array($this->NAME,$this->LOCALISATION,$this->PHONE_NUMBER,$this->CONTACT,$this->PHOTO,$this->EMAIL,$this->PASSWORD));
        }

public function verifierAgence ($conn){
    $st=$conn->prepare("select * from agence where EMAIL=? and PASSWORD=?");
    $st->execute(array($this->EMAIL,$this->PASSWORD));
    $num=$st->rowCount();
    var_dump($num);
    if($num==1)
    {
        $row=$st->fetch();
        //la variable session doit eter en majuscules
         $_SESSION['id_a']=$row['ID'];

         header("location:Agence/php/acceuilagence.php");
        
        echo 'vous etes connecté(e)';
        
    }
    
        else 
            echo 'votre login n\'est pas dans la base';


}
}
