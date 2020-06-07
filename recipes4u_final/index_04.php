<?php
    // Step 1 Open a connection to DB
    require 'include/db.php';

    // Get filter info if passed in URL
    $filter = $_GET['filter'];
    //print_r($filter);

    $table = 'recipes';

    if (isset($_POST['submit'])) {
        //echo "User Clicked on Submit";
        $search = $_POST['search'];
        $query = "select * FROM {$table} WHERE tle LIKE '%{$search}%'";
        $result = mysqli_query($connection, $query);
        //print_r($result);
        if (!$result) {
            die ('Search query failed');
        }
    } else if (isset($filter)) {  
        $query = "select * FROM {$table} WHERE proteine LIKE '%{$filter}%'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die ('Filter query failed');
        }
    } else {
        // Step 2 perform a datbase table query
        $query = "select * FROM {$table}";
        $result = mysqli_query($connection, $query);

        //Check for errors in SQL statement
        if (!$result) {
            die ('Databse query failed');
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes4U Home</title>

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://use.typekit.net/bpu8cyi.css">
</head>
<body>

    <div class="header">
            <div id="navigation_container">
                <ul id="navigation">
                    <li class="one"><a href="index_04.php?filter=Beef">BEEF</a></li>
                    <li class="two"><a href="index_04.php?filter=Chicken">CHICKEN</a></li>
                    <li class="three"><a href="index_04.php?filter=Pork">PORK</a></li>
                    <li class="four"><a href="index_04.php?filter=Vegetarian">VEGETARIAN</a></li>
                </ul>
            </div>
        <h1><a href="index_04.php">Recipes4U</a></h1>
    </div>
    
    <div class="hero">
        <!-- <img id="hero" src="../assets/images/0101_FPV_Broccoli-Calzones_97286_WEB_SQ_hi_res.jpg" alt="Recipe_Broccoli_Mozzarella_Calzones_with_Caesar_Salad"> -->
        <div class="search">
            <form action="index_04.php" method="POST">
                <label for="search">Search:</label>
                <input type="search" id="search" name="search">
                <button type="submit" name="submit" value="submit">Submit</button>
            </form>
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

    <div class="title">
        <?php
            if (isset($_POST['submit'])) {
                if ($result->num_rows == 0) {
                    echo "<p>No Recipes Found</p>";
                } else {
                    echo "<p>Found Recipes</p>";
                }
            } else if (isset($filter)) {
                echo "<p>Filtered Recipes</p>"; 
            } else {
                echo "<p>All Recipes</p>";
            }
        ?>
        
    </div>

    <div class="featured">
        
        <?php
            while($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="container">
            <div class="food">
           <!-- <a href="recipe.php"> -->
                <?php 
                    $id = $row['id'];
                    echo "<a href=\"recipe.php?id={$id}\">";
                ?>
                
                    <img class="food" src="../assets/images/<?php echo $row['main_img'];?>"></a>
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