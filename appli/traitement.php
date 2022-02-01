<?php
    // une session est un espace de stockage temporaire 
    // jusqu'au moment où on quitte ou détruit la session 
    session_start();

    if(isset($_POST['submit'])){
        //les filters input permettent de se prémunir des failles XSS
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
    
        if($name && $price && $qtt){

            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];

            $_SESSION['products'][] = $product;
        }

        header("Location:index.php");
    } 
    
    echo "<p>Vous n'avez rien à faire là !</p>";

    header("Refresh: 3;URL=index.php");
