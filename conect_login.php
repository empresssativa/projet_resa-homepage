<?php

class UserLogin {
    private $pdo;
    private $email;
    private $password;

    public function __construct( string $email, string $password, $pdo) {
        $this->email = $email;
        $this->password = $password;
        $this->pdo = $pdo;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        return $this->email=$email;
    }
    
    public function getPassword(){
        return $this->password;
    }
    

    public function setPassword($password){
        return $this->password=$password;
    }

      // Vérifie si tous les champs sont remplis
    public function validateInput() {
      
        return !empty($this->email) && !empty($this->password);
    }
     // Vérifie la validité de l'email
    public function validEmail(){
        // on rajoute un filtre qui va verifier que le mail est correct
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }


      // Vérifie la validité des champs
    public function authenticate() {
      
        if (!$this->validateInput()) {
            return "Veuillez remplir tous les champs.";
        } 

    


        // Requête pour récupérer l'utilisateur en fonction de l'email
        $stmt = $this->pdo->prepare("SELECT * FROM project_resa.user WHERE email = :email");
        $stmt->execute(['email' => $this->email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si l'utilisateur existe et que le mot de passe est correct
        if ($user && password_verify($this->password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: index.php");
            return "Connexion réussie !";
            
            
        } else {
            return "Email ou mot de passe incorrect.";
        }
         
    }
}

// Authentification de l'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $pdo = new PDO("mysql:host=localhost;dbname=project_resa", "root", '');

   
    $user = new UserLogin($_POST['email'], $_POST['password'], $pdo);

    
    $message = $user->authenticate();

   
    echo $message;
}

?>
