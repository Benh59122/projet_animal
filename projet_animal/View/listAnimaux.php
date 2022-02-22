<?php
if (!isset($_SESSION['user'])) {
    die(header("location:/"));
}
require_once "head.php";
?>
<h1 class="text-center">Liste des animaux</h1>
<div id="users" class="d-flex justify-content-around flex-wrap">

</div>
    <script>
        fetch("../Controller/UserController.php?users").then((response) => {
            if(response.ok){
                return response.json();
            }
        }).then((data) => {
            data.forEach(d => {
                createCard(d.id_us, d.nom, d.prenom);
            })
        })

        function createCard(id,nom,prenom){
            let card = '<div class="card mt-3" style="width: 20rem;">'+
                          '<div class="card-body">'+
                            '<h5 class="card-title text-center">'+prenom +' ' +nom + '</h5>'+
                            '<div class="d-flex justify-content-around mt-3">'+
                            '<a href="../Controller/NavigationController.php?user&id='+id+'" class="btn btn-primary">Voir le profil</a>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
            document.querySelector("#users").insertAdjacentHTML("beforeend",card);
        }
    </script>
<?php require_once "foot.php" ?>