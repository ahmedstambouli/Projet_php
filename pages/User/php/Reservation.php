<?php 

require '../../connexion.php';

class Reservation 
{

    public $id;
    public $iduser;
    public $idvoitur;
    public $nbjoure;	
    public $prixtotal;	
    public $etat;

    public function constructoruser($id,$iduser,$idvoitur,$nbjoure,$prixtotal,$etat)
    {
        $this->id=$id;
        $this->iduser=$iduser;
        $this->idvoitur=$idvoitur;
        $this->nbjoure=$nbjoure;
        $this->prixtotal=$prixtotal;
        $this->etat=$etat;
       
    }

    public function insert($conn){
        $st=$conn->prepare("insert into reservation values(default,?,?,?,?,?)");
        $st->execute(array($this->iduser,$this->idvoitur,$this->nbjoure,$this->prixtotal,$this->etat));
        }

    //     public function selection_id($con,$id)
    // {
    //     $st=$con->prepare("select * from reservation where ID=$id");
    //     $st->execute(array($id));
    //     $row=$st->fetch();
        
    //     $this->iduser=$row['iduser'];
    //     $this->idvoitur=$row['id_voiture'];
    //     $this->nbjoure=$row['nbjoure'];
    //     $this->prixtotal=$row['prixtotal'];
    //     $this->etat=$row['etat'];
       
        
    // }

        public function selectioniduser($con,$iduser){
   
            $st=$con->prepare("select * from reservation where id_user=$iduser");
            $st->execute();
            return $st;
            
        }


        public function selectionetatvoiture($con,$iduser){
   
            $st=$con->prepare("select etat from reservation where id_user=$iduser");
            $st->execute();
            return $st;
            
        }

        

        public function nbreservoition($con){
            $st=$con->prepare("SELECT COUNT(*) AS 'nbvoiture' FROM reservation");
            $st->execute();
            return $st;
        }

        public function idvoiture($con,$iduser)
        {
            $st=$con->prepare("SELECT id_voiture FROM reservation WHERE `id_user`=$iduser");
            $st->execute();
            $row=$st->fetch();
            return $row;
        }
    
        public function selction_iduser_idvoitur_idagence($con,$idagence)
        {
            $st=$con->prepare("SELECT * from reservation JOIN voiture on id_voiture=voiture.id JOIN user on id_user=user.ID WHERE voiture.id_agence=$idagence");
            $st->execute();
            
            return $st;
        }


        public function selcetion_reservation_iduser($con,$idu){
            $st=$con->prepare("SELECT * from reservation JOIN voiture on id_voiture=voiture.id JOIN user on id_user=user.ID WHERE user.ID=$idu;");
            $st->execute();
            return $st;
        }



        public function updateetat ($conn,$idR){
            $st=$conn->prepare("update reservation set id_user=?,id_voiture=?,nbjoure=?,prixtotal=?,etat=? where id=?");
            $r=$st->execute(array( $this->iduser,$this->idvoitur,$this->nbjoure,$this->prixtotal,$this->etat,$idR));
           // var_dump($r);
            
        }

}
