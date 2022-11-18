<?php




/**
 * 4 status de fichier sur git =
 *      - untracked => les fichiers crée mais non suivies par git
 *      - tracked => fichier deja suivies par git mais non envoyé vers le repository
 *      - staged => les fichiers suivie, enregistré mais non envoyé vers le repository
 *      - commited => tous les fichiers envoyé et non modifié de mon projet
 */

require_once "init.php"; 

if (!empty($_POST)){ 
    
    debug($_POST);
   // debug($_FILES);

    if(!empty($_FILES['photo']['name'])){
        copy($_FILES['photo']['tmp_name'], 'photo/' . time() . $_FILES['photo']['name']);
    }

    $requete = $bdd ->prepare("INSERT INTO produit VALUES (NULL, :titre, :prix, :description, :photo)");

    $requete->execute([ 
        ':titre'=> $_POST['titre'],
        ':prix'=> $_POST['prix'],
        ':description'=> $_POST['description'],
        ':photo'=>time() .'-'. $_FILES['photo']['name']
    ]);


    if($successMessage = "Ca fonctionne"){
        echo "Ca fonctionne";
    }else{
        echo "Nope !";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"></head>

</head>
<body>

        <h1 class="text-center mt-5">Ajout produit</h1>

        <?php// afficher des messages d'erreur et de succès

        if(!empty($successMessage)){
            echo '<div class="alert-success col-md-6 mx-auto text-center">'
        }
        ?>

        <form action="" class="col-6 mx-auto" method="post" enctype="multipart/form-data">

        <label for="" class="form-label">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre">

            <label for="" class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix" id="prix">

            <label for="" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description">
            <label for="" class="form-label">Photo</label>
            <input type="file" class="form-control" name="photo" id="photo">

            <button class="btn btn-dark mt-3 d-block mx-auto">Ajouter</button>

        </form>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>


