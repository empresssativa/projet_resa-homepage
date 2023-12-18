<?php
session_start();
if (!isset($_SESSION['user_id']))
header('Location: index.php');
exit;

class ChoiceRoom {
    private $startDate;
    private $endDate;
    private $numberOfAdults;
    private $numberOfChildren;
    private $userId;
    private $roomId;
    private $pdo;

    public function __construct($startDate, $endDate, $numberOfAdults, $numberOfChildren, $userId, $roomId) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->numberOfAdults = $numberOfAdults;
        $this->numberOfChildren = $numberOfChildren;
        $this->userId = $userId;
        $this->roomId = $roomId;

        $this->pdo = new PDO('mysql:host=localhost;dbname=project_resa', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }

    public function isRoomAvailable() {
        // Vérifier si la chambre est disponible pour les dates spécifiées
        $checkAvailability = $this->pdo->prepare('SELECT * FROM project_resa.choiceRoom 
            WHERE roomid = :roomId 
            AND NOT (:endDate <= startDate OR :startDate >= endDate)');
        
        $checkAvailability->bindParam(':roomId', $this->roomId);
        $checkAvailability->bindParam(':startDate', $this->startDate);
        $checkAvailability->bindParam(':endDate', $this->endDate);

        $checkAvailability->execute();

        return $checkAvailability->rowCount() === 0;
    } 

    public function insertChoiceRoom() {
        // Vérifier la disponibilité de la chambre
        if (!$this->isRoomAvailable()) {
            // La chambre n'est pas disponible pour les dates spécifiées
            echo "La chambre n'est pas disponible pour ces dates.";
            return;
        }
    }
}


//         // La chambre est disponible, insérer la réservation
//         $insertChoiceRoom = $this->pdo->prepare('INSERT INTO project_resa.choiceRoom 
//             (startDate, endDate, numberOfAdults, numberOfChildren, userid, roomid) 
//             VALUES 
//             (:startDate, :endDate, :numberOfAdults, :numberOfChildren, :userId, :roomId)');

//         $insertChoiceRoom->bindValue(':startDate', $this->startDate);
//         $insertChoiceRoom->bindValue(':endDate', $this->endDate);
//         $insertChoiceRoom->bindValue(':numberOfAdults', $this->numberOfAdults);
//         $insertChoiceRoom->bindValue(':numberOfChildren', $this->numberOfChildren);
//         $insertChoiceRoom->bindValue(':userId', $this->userId);
//         $insertChoiceRoom->bindValue(':roomId', $this->roomId);

//         $insertChoiceRoom->execute();

//         echo "Réservation effectuée avec succès!";
//     }
// }

// // Vérifier si la requête est de type POST
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $startDate = $_POST["date_darivée"];
//     $endDate = $_POST["date_départ"];
//     $numberOfAdults = $_POST["nbAdult"];
//     $numberOfChildren = $_POST["nbChild"];
//     $roomType = $_POST["roomType"];

//     // Vous pouvez ajouter d'autres vérifications et validations ici

//     // Récupérer l'ID de l'utilisateur connecté depuis la session
//     if (isset($_SESSION['user_id'])) {
//         // Récupérer l'ID de l'utilisateur connecté
//         $userId = $_SESSION['user_id'];
    
//         // Utiliser $userId dans votre code
//     } else {
//         // La clé 'user_id' n'est pas définie, vous pouvez gérer cela en conséquence
//         echo "L'utilisateur n'est pas connecté.";
//     }
//     // Remplacez cela par l'ID de la chambre que vous souhaitez utiliser
//     $roomId = 1;

//     // Créer une instance de la classe ChoiceRoom avec les valeurs du formulaire
//     $choiceRoom = new ChoiceRoom($startDate, $endDate, $numberOfAdults, $numberOfChildren, $userId, $roomId);

//     // Appeler la méthode insertChoiceRoom pour insérer les données dans la base de données
//     $choiceRoom->insertChoiceRoom();
// }


// ?>
