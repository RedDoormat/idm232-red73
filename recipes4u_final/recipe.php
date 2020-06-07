<?php
    // Step 1 Open a connection to DB
    require 'include/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>

    <link rel="stylesheet" href="recipe_css.css">
    <link rel="stylesheet" href="https://use.typekit.net/bpu8cyi.css">
</head>
<body>
    <div class="header">
        <div id="navigation_container">
            <ul id="navigation">
                <li class="one"><a href="/work">BEEF</a></li>
                <li class="two"><a href="/blog">CHICKEN</a></li>
                <li class="three"><a href="/about">PORK</a></li>
                <li class="four"><a href="/about">VEGETARIAN</a></li>
            </ul>
        </div>
          <h1><a href="index_04.php">Recipes4U</a></h1>
    </div>
    <div class="search">
            <form action="index_04.php" method="POST">
                <label for="search">Search:</label>
                <input type="search" id="search" name="search">
                <button type="submit" name="submit" value="submit">Submit</button>
            </form>
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

<?php
    // Get the ID number passed to this page
    $id = $_GET['id'];

    // Query for said ID number
    $table = 'recipes';
    $query = "select * FROM {$table} WHERE id={$id}";
    $result = mysqli_query($connection, $query);

    // Check for errors in SQL statement
    if (!$result) {
        die ('Databse query failed');
    } else {
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
    }
?>

<!-- Extract record information -->

    <div class="steps">

        <div class="title">
                <img id="hero" src="../assets/images/<?php echo $row['main_img'];?>">
            <h2><?php echo $row['tle']; ?></h2>
            <h3><?php echo $row['subtitle']; ?></h3>
        </div>

        <div class="description">
            <p>
                <?php echo $row['description']; ?>
            </p>
        </div>

        <div class="ingredients">
            <div class="step_img">
                <img src="../assets/images/<?php echo $row['ingredients_img'];?>">
            </div>
            <h2>Ingredients</h2>
            <ul>
                <?php
                    $ingred_str = $row['all_ingredients'];
                    // echo $ingred_str;
                    // Convert String into an array
                    $ingredArray = explode("*", $ingred_str);
                    // print_r($ingredArray);
                    for ($lp = 0; $lp < count($ingredArray); $lp++) {
                        $one_ingred = $ingredArray[$lp];
                        echo "<li>" . $one_ingred . "</li>";
                    }
                ?>
            </ul>
        </div>

        <div class="cooking">
            <h2>Let's begin cooking!</h2>

            <?php
                $instruct_str = $row['all_steps'];
                $step_img_str = $row['step_imgs'];

                // Array Creation
                $instruct_array = explode("*", $instruct_str);
                $step_img_array = explode("*", $step_img_str);

                for($lp = 0; $lp < count($step_img_array); $lp++){
                    $instruction = $instruct_array[$lp];
                    $step_img = $step_img_array[$lp];
                    $cnt = $lp;

                    if($cnt > 0){
                        $cnt += $lp;
                    }

                    $instruct_head = substr($instruct_array[$cnt], 2);
                    $instruct_num = $instruct_array[$cnt][0];

                    echo "
                        <h3>Step " . $instruct_num ."</h3>
                        <p>" . $instruct_head . "</p>
                        <div class=\"step_img\">
                            <img src=\"../assets/images/" . $step_img . "\">
                        </div>
                        <p>
                            " . $instruct_array[$cnt + 1] . "
                        </p>
                    ";
                }
            ?>
        </div>
    </div>
</body>
</html>