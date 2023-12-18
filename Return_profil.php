<?php 

class InsertRows {

        private $pdo;
       
        private $userId;  
       

     
    
        public function __construct( $userId, $pdo) {
           
            $this->userId = $userId;
            $this->pdo = $pdo;
        }
// recupere les infos du formulaire du formulaire inscription 
        

        // recupere sur la base de donner 

        public function Read(){
            try{
            $stmt = $this->pdo->prepare("SELECT * FROM project_resa.user WHERE id = :id");
            $stmt->execute(['id' => $this->userId]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            // Gestion des erreurs si pas de recup
            echo "Erreur lors de la récupération des données : " . $e->getMessage();
            return null; 
        }
    }


    //    on fait la connexion de la session de la personne conneter et on introduit les donner dans le formulaire 
    
        }
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
            $pdo = new PDO("mysql:host=localhost;dbname=project_resa", "root", '');
            
            $userId= $_SESSION['user_id'];

            // recupere les infos mis lors de l'inscription
           
            $insertRows = new InsertRows($userId, $pdo);
        
            
            $user= $insertRows->Read();
        
           
            
        }




?>