<?php require_once "head.php" ?>
<h1 class="text-center">Enregistrez vous !</h1>
<form method="post">
    <label for="email">Email :</label>
    <input type="email" class="form-control" name="email" id="email" required>
    <label for="password">Mot de passe :</label>
    <input type="password" class="form-control" name="password" id="password" required>
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" class="form-control" required>
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname" id="firstname" class="form-control" required>
    <button class="btn btn-primary mt-2">Valider</button>
</form>
<div class="alert alert-danger" style="display: none"></div>

<script>
    let form = document.querySelector("form");
    let data = {};
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        Array.from(form.elements).forEach((i) => {
            if(i.name !== "" && i.value !== ""){
                data[i.name] = i.value;
            }
        });
        fetch("../Controller/UserController.php?register",
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        }).then((response) => {
            if(!response.ok){
                document.querySelector(".alert-danger").style.display = "block";
                document.querySelector(".alert-danger").textContent = "Il y a eu un soucis";
            }else{
                // window.location = "/";
            }
        })
    })
</script>
<?php require_once "foot.php" ?>
