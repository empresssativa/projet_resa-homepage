<?php

require "header.php"

?>
    <div class="container">
        <div class="col-lg-12 text-center text-lg-start">
            <center><h3>Contact</h3>
            <p>Vous avez une suggestion ou une question ?<br>
                Envoyez-nous un message en utilisant notre formulaire de contact.</p></center>
        </div>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputFirstName" class="form-label">Prénom</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name">
            </div>
            <div class="col-md-6">
                <label for="inputLastName" class="form-label">Nom</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Addresse</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Complément d'addresse</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Pays</label>
                <select id="inputState" class="form-select">
                    <option selected>Choisir...</option>
                    <option>France</option>
                    <option>Espagne</option>
                    <option>Belgique</option>
                    <option>Lituanie</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Ville</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">code postal</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-12">
                <center><button type="submit" class="btn btn-primary">Envoyer</button></center>
            </div>
        </form>
    <div class="container">

<?php

require "footer.php"

?>