<?php require "head.php" ?>
<h1 class="text-center mb-4">Page de connexion</h1>
<form action="/Controller/ConnexionController.php?connect" method="post">
    <div class="d-flex justify-content-around flex-row">
        <div class="col-5">
            <label for="username">Email : </label>
            <input type="email" id="username" name="username" class="form-control">
        </div>
        <div class="col-5">
            <label for="password">Mot de Passe :</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
    </div>
    <button class="btn btn-primary offset-10 my-4">Vous connectez</button>
</form>
<div class="text-center">
    <small>Vous n'avez pas encore de compte? <a href="../Controller/InscriptionController.php">Inscrivez-vous ici !</a></small>
</div>
<?php require "foot.php" ?>