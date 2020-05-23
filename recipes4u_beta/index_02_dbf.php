<?php
    // Step 1 Open a connection to DB
    require 'include/db.php';

    // Step 2 perform a datbase table query
    $table = 'recipes';
    $query = "select * FROM {$table}";
    $result = mysqli_query($connection, $query);

    //Check for errors in SQL statement
    if (!$result) {
        die ('Databse query failed');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDM232_Red73_Beta</title>

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://use.typekit.net/bpu8cyi.css">
</head>
<body>

    <?php
        while($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
            $title = $row['tle'];
            $subtitle = $row['subtitle'];
            echo $title;
            echo $subtitle;
            echo "<hr>";
        }

        // Step 4 Release returned data
        mysqli_free_result($result);

        // Step 5 Close database connection
        mysqli_close($connection);
    ?>

    <div class="header">
            <div id="navigation_container">
                <ul id="navigation">
                    <li class="one"><a href="/work">BEEF</a></li>
                    <li class="two"><a href="/blog">CHICKEN</a></li>
                    <li class="three"><a href="/about">PORK</a></li>
                    <li class="four"><a href="/about">VEGETARIAN</a></li>
                </ul>
            </div>
        <h1><a href="index_02_dbf.php">Recipes4U</a></h1>
    </div>
    
    <div class="hero">
        <img id="hero" src="../assets/images/0101_FPV_Broccoli-Calzones_97286_WEB_SQ_hi_res.jpg" alt="Recipe_Broccoli_Mozzarella_Calzones_with_Caesar_Salad">
        <div class="search">
            <label for="gsearch">Search:</label>
            <input type="search" id="gsearch" name="gsearch">
        </div>
    </div>

    <div class="box">
        <a class="button" href="#popup1"><b>HELP</b></a>
    </div>
    
    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>HELP</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                Try to click on a featured recipe! <br>
                OR <br>
                Search or Filter through recipes using the menus above!
            </div>
        </div>
    </div>

    <div class="featured">
        <div class="container">
            <div class="food">
                <a href="recipe.html"> <img class="food" src="../assets/images/Recipe_Ancho-Orange_Chicken_with_Kale_Rice_Roasted_Carrots/0101_FPP_Chicken-Rice_97338_WEB_SQ_hi_res.jpg" alt="Recipe_Ancho-Orange_Chicken_with_Kale_Rice_Roasted_Carrots"></a>
            </div>
            <div class="tle">
                    <b>Ancho Orange chicken</b> 
            </div>
            <div class="subtitle">
                    with Kale, Rice, and Roasted Carrots
            </div>
        </div>

        <div class="container">
            <div class="food">
                <img class="food" src="../assets/images/Recipe_Ancho-Orange_Chicken_with_Kale_Rice_Roasted_Carrots/0101_FPP_Chicken-Rice_18630_WEB_high_feature.jpg" alt="Recipe_Ancho-Orange_Chicken_with_Kale_Rice_Roasted_Carrots">
            </div>
            <div class="tle">
                    <b>Ancho Orange chicken</b> 
            </div>
            <div class="subtitle">
                    with Kale, Rice, and Roasted Carrots
            </div>
        </div>

        <div class="container">
            <div class="food">
                <img class="food" src="../assets/images/Recipe_Ancho-Orange_Chicken_with_Kale_Rice_Roasted_Carrots/0101_FPP_Chicken-Rice_18630_WEB_high_feature.jpg" alt="Recipe_Ancho-Orange_Chicken_with_Kale_Rice_Roasted_Carrots">
            </div>
            <div class="tle">
                    <b>Ancho Orange chicken</b> 
            </div>
            <div class="subtitle">
                    with Kale, Rice, and Roasted Carrots
            </div>
        </div>
    </div>
</body>
</html>