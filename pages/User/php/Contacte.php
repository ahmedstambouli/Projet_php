<?php 

require '../../connexion.php';

class Contacte{
    public $id;
    public $id_user;

    public $name;

    public $email;

    public $message;


    public function constructoruser($id,$id_user,$name,$email,$message)
    {
        $this->id=$id;
        $this->id_user=$id_user;
        $this->name=$name;
        $this->email=$email;
        $this->message=$message;
       
    }

    public function insert($conn){
        $st=$conn->prepare("insert into conatctuser values(default,?,?,?,?)");
        $st->execute(array($this->id_user,$this->name,$this->email,$this->message));
        var_dump($st);
        }

}



?>