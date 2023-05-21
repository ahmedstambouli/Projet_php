<?php 

require '../../connexion.php';



class Agence {

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

public function insert($conn){
        $st=$conn->prepare("insert into agence values(default,?,?,?,?,?,?,?)");
        $st->execute(array($this->NAME,$this->LOCALISATION,$this->PHONE_NUMBER,$this->CONTACT,$this->PHOTO,$this->EMAIL,$this->PASSWORD));
       
        }

    public function selection($con){
   
        $st=$con->prepare("select * from agence");
        $st->execute();
        return $st;
        
    }

    public function selection_id($con,$id)
    {
        $st=$con->prepare("select * from agence where ID=?");
        $st->execute(array($id));
        $row=$st->fetch();
        
        
        $this->NAME=$row['NAME'];
        $this->LOCALISATION=$row['LOCALISATION'];
        $this->PHONE_NUMBER=$row['PHONE_NUMBER'];
        $this->CONTACT=$row['CONTACT'];
        $this->PHOTO=$row['PHOTO'];
        $this->EMAIL=$row['EMAIL'];
        $this->PASSWORD=$row['PASSWORD'];
        
      
    }

    public function selectionprofil($con,$id){
   
        $st=$con->prepare("select * from agence where ID=$id ");
        $st->execute(array($id));
       
        return $st;
        
    }

    public function update ($conn,$id){
        $st=$conn->prepare("update agence set NAME=?,LOCALISATION=?,PHONE_NUMBER=? ,CONTACT=?, PHOTO=?,EMAIL=?,PASSWORD=?  where ID=?");
        $r=$st->execute(array($this->NAME,$this->LOCALISATION,$this->PHONE_NUMBER,$this->CONTACT,$this->PHOTO,$this->EMAIL,$this->PASSWORD,$id));
        var_dump($r);
        
    }
    public function supprimer($con,$id){
        $st=$con->prepare("delete from agence where ID=?");
        $st->execute(array($id));
    }

    public function verifieragence ($conn){
        $st=$conn->prepare("select * from agence where EMAIL=? and PASSWORD=?");
        $st->execute(array($this->EMAIL,$this->PASSWORD));
        $num=$st->rowCount();
        var_dump($num);
    //     if($num==1)
    //     {
    //         $row=$st->fetch();
    //         //la variable session doit eter en majuscules
    //          $_SESSION['id_a']=$row['ID'];
    
    //          header("location:pages/Agence/php/acceuilagence.php");
            
    //         echo 'vous etes connecté(e)';
            
    //     }
        
    //         else 
    //             echo 'votre login n\'est pas dans la base';
    
    
     }

}

?>