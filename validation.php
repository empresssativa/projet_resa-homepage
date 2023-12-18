<?php
include "header.php";
require_once 'ViewCart.php';
include 'pay.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  type="text/css" rel="stylesheet" href="style.css">
    <title>Fake Payment Form</title>
</head>
<body class="plus">
    <h1>Panier</h1>
<?php
$viewCart = new ViewCart(new PDO('mysql:host=localhost;dbname=project_resa', 'root', ''));
    // Affichage des choix de chambre
    $choices = $viewCart->getChoiceRoom();
    if (!empty($choices)) {
        foreach ($choices as $choice) {
            echo "Résumé De Votre Commande: <br>";
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
   <?php
   $paymentProcessor = new PayCart (new PDO('mysql:host=localhost;dbname=project_resa', 'root', ''));
    $totalCost = $paymentProcessor->calculateTotalCost($choice);
   echo "Total: " . $totalCost . "<br>";
   ?>

<?php
class FakePaymentProcessor {
    public function processPayment($cardNumber, $expirationDate, $cvv, $amount) {
        // Ici, vous pouvez simplement simuler le succès du paiement
        // Dans une vraie application, vous devriez effectuer des vérifications plus approfondies et utiliser une passerelle de paiement réelle

        // Simuler un paiement réussi
        return true;
    }
}

class PaymentForm {
    private $fakePaymentProcessor;

    public function __construct(FakePaymentProcessor $fakePaymentProcessor) {
        $this->fakePaymentProcessor = $fakePaymentProcessor;
    }
   
    public function displayForm() {
        // Affichez ici le formulaire de paiement
        echo "
        <form method='post' action='pay.php' class='bul'>
            <label for='card_number'>Numéro de carte de crédit</label>
            <input type='text' name='card_number' required>
            <br>
            <label for='expiration_date'>Date d'expiration (MM/AA)</label>
            <input type='text' name='expiration_date' required>
            <br>
            <label for='cvv'>Code de sécurité (CVV)</label>
            <input type='text' name='cvv' required>
            <br>
            <button type='submit'>Payer</button>
        </form>";
    }

    public function processPayment($cardNumber, $expirationDate, $cvv, $amount) {
        // Traitez le paiement avec les informations de carte fournies
        $paymentResult = $this->fakePaymentProcessor->processPayment($cardNumber, $expirationDate, $cvv, $amount);

        if ($paymentResult) {
            // Le paiement a réussi
            echo "Paiement réussi! Montant payé : " . $amount . " €";
        } else {
            // Le paiement a échoué
            echo "Erreur de paiement. Veuillez réessayer.";
        }
    }
}

// Exemple d'utilisation
$fakePaymentProcessor = new FakePaymentProcessor();
$paymentForm = new PaymentForm($fakePaymentProcessor);

// Affichez le formulaire
$paymentForm->displayForm();

// Traitement du paiement (cette partie peut être dans un fichier séparé comme process_payment.php)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cardNumber = $_POST["card_number"];
    $expirationDate = $_POST["expiration_date"];
    $cvv = $_POST["cvv"];
    $amount = 1000; // Montant en centimes (10.00 €)

    // Traitez le paiement avec les informations de carte fournies
    $paymentForm->processPayment($cardNumber, $expirationDate, $cvv, $amount);
}

?>
