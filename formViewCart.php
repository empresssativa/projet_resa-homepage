<?php
require_once 'header.php';
require_once 'ViewCart.php';
// On démarre la session
if (isset($_SESSION['user_id'])) {
    $iduser = $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
</head>
<body>
    
    <?php
    // On inclut le fichier de connexion à la base de données
    $viewCart = new ViewCart(new PDO('mysql:host=localhost;dbname=project_resa', 'root', ''));

    // Affichage des choix de chambre
    $choices = $viewCart->getChoiceRoom();
    if (!empty($choices)) {
        foreach ($choices as $choice) {
            echo "Chambre ID: " . $choice['choice_id'] . "<br>";
            echo "Date de début: " . $choice['startDate'] . "<br>";
            echo "Date de fin: " . $choice['endDate'] . "<br>";
            echo "Nombre d'adultes: " . $choice['numberOfAdults'] . "<br>";
            echo "Nombre d'enfants: " . $choice['numberOfChildren'] . "<br>";
            echo "Prix par nuit: " . $choice['pricePerNight'] . "<br>";


            echo "<hr>";
        }
    } else {
        echo "Aucune chambre dans le panier.";
    }
    ?>
    <form method="post">
        <input type="submit" name="modifier_selection" value="Modifier">
        <input type="submit" name="supprimer_selection" value="Supprimer">
        <div>
             <a href="validation.php" class="btn btn-primary">Aller à la page de destination</a> 
        </div>
    </form>
</body>
</html>


