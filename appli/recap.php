<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>
</head>
<body>

    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="recap.php">Récapitulatif</a></li>
        </ul>
    </nav>
    
    <h1>Récapitulatif</h1>

    <?php 

        session_start();

        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else{
    
            echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            $somme = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'],2,",","&nbsp;")."&nbsp;€</td>",
                        "<td>".$product['qtt']."</td>",
                        "<td>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
                "</tr>";
                $totalGeneral+= $product['total']; 
                $somme += $product['qtt'];            
            }
            echo "<tr>",
                    "<td colspan=3><strong>Total général : </strong></td>",
                    "<td><strong>".$somme."</strong></td>",
                    "<td><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
                "</tbody>",
                
                "</table>";
        }
    ?>

    <form action="deleteall.php" method="post">
        <p><input type="button" name="button" value="Supprimer tout"></p>
    </form>

</body>
</html>