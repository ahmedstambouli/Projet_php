<?php 

require '../../connexion.php';



class Voiture {

    public $ID;

    public $matricule;

    public $marque;

    public $PHOTO;

    public $prix;

    public $nbvoiture;

    public $id_agence;


    public function constructoruser($id,$matricule,$marque,$photo, $prix,$nbvoiture,$id_agence)
    {
        $this->ID=$id;
        $this->matricule=$matricule;
        $this->marque=$marque;
        $this->PHOTO=$photo;
        $this->prix=$prix;
        $this->nbvoiture=$nbvoiture;
        $this->id_agence=$id_agence;
        
       
    }

public function insert($conn){
        $st=$conn->prepare("insert into voiture values(default,?,?,?,?,?,?)");
        $st->execute(array($this->matricule,$this->marque,$this->PHOTO,$this->prix,$this->nbvoiture,$this->id_agence));
       
        }

          public function selection_matriculation($con,$matricule)
    {
        $st=$con->prepare("select * from voiture where matricule='$matricule'");
        $st->execute(array($matricule));
        $row=$st->rowCount();
           return $row;
        
        
      
    }
    public function selectiontous($con){
   
        $st=$con->prepare("select * from voiture ");
        $st->execute();
        return $st;
        
    }

    public function selection($con,$id_agence){
   
        $st=$con->prepare("select * from voiture where id_agence= $id_agence");
        $st->execute();
        return $st;
        
    }

    public function selection_id($con,$id)
    {
        $st=$con->prepare("select * from voiture where ID=?");
        $st->execute(array($id));
        $row=$st->fetch();
        return $row;
        
      

        // $this->ID=$id;
        // $this->matricule=$row['matricule'];
        // $this->marque=$row['marque'];
        // $this->PHOTO=$row['photo'];
        // $this->prix=$row['prix'];
        // $this->nbvoiture=$row['nbvoiture'];
        // $this->id_agence=$row['id_agence'];
        
        
        
        
      
    }

    public function update ($conn,$id){
        $st=$conn->prepare("update voiture set matricule=?,marque=?,PHOTO=? ,prix=?, nbvoiture=?,id_agence=? where ID=?");
        $r=$st->execute(array($this->matricule,$this->marque,$this->PHOTO,$this->prix,$this->nbvoiture,$this->id_agence,$id));
        var_dump($r);
        
     }
    // public function supprimer($con,$id){
    //     $st=$con->prepare("delete from agence where ID=?");
    //     $st->execute(array($id));
    // }

    

}
