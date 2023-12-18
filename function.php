
<?php


class Connection{

  private $p;

  public function __construct($dbname,$host,$user,$password)
  {
      try {
        $this->p=new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$password);
    } catch (PDOException $error1) {
      echo 'Something went wrong with your connection...!';
    } catch (Exception $error2) {
      echo 'Generic error...!';
    }
  }
  public function insertData($lastname,$firstname,$phone, $email, $password) 
  {
    $p=$this->p->prepare('INSERT INTO user(lastname,firstname,phone,email,password) VALUES(:l,:f,:ph,:e,:p)');
    $p->bindValue(':l',$lastname);
    $p->bindValue(':f',$firstname);
    $p->bindValue(':ph',$phone);
    $p->bindValue(':e',$email);
    $p->bindValue(':p',$password);
    $p->execute();
  }
  

}

// class RoomsRepository {

//   public function getRows(){             
//       // retrieve all cars
//       // url : /cars
//       $query = "SELECT * FROM room";
//       $RoomsRepository=new RoomsRepository();
//       $Rooms=$RoomRepository->getRows();

//       require "./details.php";
//   }

// }


?>
