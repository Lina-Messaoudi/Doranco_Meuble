<?php
// appel de la connexion à la base de donnée

require_once "init.php"; 
    // Ecriture de ma requete. Classe objet
    $requete = $bdd->prepare("SELECT * FROM produit");

    // Execution de la requete. Objet classe pdostatement. executer la requete est les envoyer en base de donnée.
    $requete->execute();
    // recuperation des données a l'interieur de l'objet.
    $produit = $requete->fetchAll(PDO::FETCH_ASSOC);

    debug($produit);


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"></head>

</head>
<body>

<h1 class="text-center mt-4">Boutique</h1>

<!-- div.container>div.d-flex.flex-wrap.justify-content-evenly -->
    <div class="container">
        <div class="d-flex flex-wrap justify-content-evenly">
            <!-- Affichage des nos produits -->

            <?php foreach($produit as $produit){ ?>
                <div class="card my-3" style="width: 16rem;">
                    <img class="card-img-top"  src="./photos/<?php echo $produit['photo']?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <span class="fs-5 badge bg-success rounded-pill"><?php echo $produit['prix']?>€</span>
                    </div>
                </div>
                <?php } ?>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
</body>
</html>