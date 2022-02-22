<?php require "head.php" ?>
<form action="../Controller/InscriptionController.php?register" id="register" method="post">
    <div class="d-flex justify-content-around flex-row">
        <div class="col-5">
            <label for="firstname">Prénom:</label>
            <input type="text" id="firstname" name="firstname" class="form-control">
        </div>
        <div class="col-5">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
    </div>
    <div class="d-flex justify-content-around flex-row">
        <div class="col-5">
            <label for="username">Email: </label>
            <input type="email" id="username" name="username" class="form-control">
        </div>
        <div class="col-5">
            <label for="password">Mot de passe: </label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
    </div>

    <button class="btn btn-primary offset-11 my-4"> Vous inscrire</button>
</form>

<div class="text-center">
    <small class="mt-4">Vous avez déjà un compte? <a href="../Controller/ConnexionController.php">Venez ici !</a></small>
</div>
<?php require "foot.php" ?>