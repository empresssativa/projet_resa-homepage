<?php

class ViewCart {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
// la foction va recupere les choix de chambre de l'utilisateur connecté (si il y en a)
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

    public function deleteChoiceRoom() {
        if (isset($_SESSION['user_id'])) {
            $iduser = $_SESSION['user_id'];
            $deleteChoiceRoom = $this->pdo->prepare('DELETE FROM choiceRoom WHERE userid = :user_id');
            $deleteChoiceRoom->bindParam(':user_id', $iduser);
            $deleteChoiceRoom->execute();
            return "Chambre supprimée avec succès.";
        }
        return "Utilisateur non connecté.";
    }

    // Autres méthodes pour updateChoiceRoom et validateChoiceRoom
    // reste a faire les redirections vers les pages correspondantes

}
?>
