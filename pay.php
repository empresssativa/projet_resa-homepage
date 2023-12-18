<?php
// On démarre la session

class PayCart {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
} 
    public function getChoiceRoom() {
    if (isset($_SESSION['user_id'])) {
        $iduser = $_SESSION['user_id'];
        $getChoiceRoom = $this->pdo->prepare('SELECT choice_id, startDate, endDate, numberOfAdults, numberOfChildren, userid, pricePerNight 
        FROM choiceRoom 
        JOIN room ON choiceRoom.roomid = room.room_id 
        WHERE choiceRoom.userid = :user_id');
        $getChoiceRoom->bindParam(':user_id', $iduser);
        $getChoiceRoom->execute();
        $result = $getChoiceRoom->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    return [];
}

    public function calculateTotalCost($row){
        // Assurez-vous que les clés des tableaux correspondent aux noms de colonnes dans votre base de données
        $result['pricePerNight'] = $row['pricePerNight'];
        $result['numberOfAdults'] = $row['numberOfAdults'];
        $result['numberOfChildren'] = $row['numberOfChildren'];
    
        // Vérifiez si toutes les valeurs nécessaires sont définies
        if (isset($result['pricePerNight']) && isset($result['numberOfAdults']) && isset($result['numberOfChildren'])) {
            // Effectuez le calcul
            $totalCost = $result['pricePerNight'] * ($result['numberOfAdults'] + $result['numberOfChildren']);
            return $totalCost;
        } else {
            // Affichez un message si certaines valeurs ne sont pas définies
            echo "Certaines valeurs ne sont pas définies.";
            return null; // Ou une autre valeur par défaut si nécessaire
        }
    }
    
}
    

?> 
