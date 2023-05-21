<?php 
session_start();
require "connexion.php";

class RegisterUser {

    public $ID;

    public $FULLNAME;

    public $SEXE;

    public $PHONE_NUMBER;

    public $COMPANY;

    public $EMAIL;

    public $PASSWORD;

    public $PHOTO;


    public function constructoruser($id,$fullname,$sexe,$phone_number,$company,$email,$password,$photo)
    {
        $this->ID=$id;
        $this->FULLNAME=$fullname;
        $this->SEXE=$sexe;
        $this->PHONE_NUMBER=$phone_number;
        $this->COMPANY=$company;
        $this->EMAIL=$email;
        $this->PASSWORD=$password;
        $this->PHOTO=$photo;
    }

public function register($conn){
        $st=$conn->prepare("insert into user values(default,?,?,?,?,?,?,?)");
        $st->execute(array($this->FULLNAME,$this->SEXE,$this->PHONE_NUMBER,$this->COMPANY,$this->EMAIL,$this->PASSWORD,$this->PHOTO));
        }

public function verifier ($conn){
    $st=$conn->prepare("select * from user where EMAIL=? and PASSWORD=?");
    $st->execute(array($this->EMAIL,$this->PASSWORD));
    $num=$st->rowCount();
    var_dump($num);
    if($num==1)
    {
        $row=$st->fetch();
        //la variable session doit eter en majuscules
         $_SESSION['id_u']=$row['ID'];

         header("location:User/php/home.php");
        
        echo 'vous etes connecté(e)';
        
    }
    
        else 
            echo 'votre login n\'est pas dans la base';


}
}
