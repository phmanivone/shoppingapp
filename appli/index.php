<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>
<body>
    
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="recap.php">Récapitulatif</a></li>
        </ul>
    </nav>

    <h1>Ajouter un produit</h1>

    <div class="ajout">
        <form action="traitement.php" method="post">
            <p>
                <label>
                    Nom du produit : 
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit : 
                    <input type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée : 
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>
    </div>

<?php
    session_start();

    $somme = 0;
    
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<br><p>Aucun produit en session...</p>";
    }
    else{
        foreach($_SESSION['products'] as $product){
            $somme += $product['qtt'];
        }
    echo "<br>Nombre de produits dans la session : ".$somme;
    }
?>

</body>
</html>