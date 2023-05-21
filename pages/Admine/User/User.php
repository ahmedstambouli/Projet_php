<?php 

require '../../connexion.php';



class User {

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

public function insert($conn){
        $st=$conn->prepare("insert into user values(default,?,?,?,?,?,?,?)");
        $st->execute(array($this->FULLNAME,$this->SEXE,$this->PHONE_NUMBER,$this->COMPANY,$this->EMAIL,$this->PASSWORD,$this->PHOTO));
        }

    public function selection($con){
   
        $st=$con->prepare("select * from User");
        $st->execute();
        return $st;
        
    }
    public function selectionprofil($con,$id){
   
        $st=$con->prepare("select * from user where ID=$id ");
        $st->execute(array($id));
       
        return $st;
        
    }

    public function selection_id($con,$id)
    {
        $st=$con->prepare("select * from user where ID=?");
        $st->execute(array($id));
        $row=$st->fetch();
        
        $this->FULLNAME=$row['FULLNAME'];
        $this->SEXE=$row['SEXE'];
        $this->PHONE_NUMBER=$row['PHONE_NUMBER'];
        $this->COMPANY=$row['COMPANY'];
        $this->EMAIL=$row['EMAIL'];
        $this->PASSWORD=$row['PASSWORD'];
        $this->PHOTO=$row['PHOTO'];
        return $row;
    }

    public function update ($conn,$id){
        $st=$conn->prepare("update user set FULLNAME=?,SEXE=?,PHONE_NUMBER=?,COMPANY=?,EMAIL=?,PASSWORD=?,PHOTO=? where ID=?");
        $r=$st->execute(array($this->FULLNAME,$this->SEXE,$this->PHONE_NUMBER,$this->COMPANY,$this->EMAIL,$this->PASSWORD,$this->PHOTO,$id));
        var_dump($r);
        
    }
    public function supprimer($con,$id){
        $st=$con->prepare("delete from user where ID=?");
        $st->execute(array($id));
    }

}

?>