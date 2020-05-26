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

    <div class="header">
            <div id="navigation_container">
                <ul id="navigation">
                    <li class="one"><a href="">BEEF</a></li>
                    <li class="two"><a href="">CHICKEN</a></li>
                    <li class="three"><a href="">PORK</a></li>
                    <li class="four"><a href="">VEGETARIAN</a></li>
                </ul>
            </div>
        <h1><a href="index_03_integration.php">Recipes4U</a></h1>
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
        
        <?php
            while($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="container">
            <div class="food">
                <a href="recipe.html"> <img class="food" src="../assets/images/<?php echo $row['main_img'];?>"></a>
            </div>
            <div class="tle">
                    <b>
                        <?php echo $row['tle']; ?> <br>
                    </b> 
                    <?php echo $row['subtitle']; ?>
            </div>
                   
          
        </div>        

        <?php
            } // end php while loop

            // Step 4 Release returned data
            mysqli_free_result($result);

            // Step 5 Close database connection
            mysqli_close($connection);
        ?>
        
    </div>
</body>
</html>