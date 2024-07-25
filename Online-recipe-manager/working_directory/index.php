<?php 
include 'conn/conn.php'; 
include 'assets/modal.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Cook</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div>
        <div class="intro_bg">
            <div class="header" id="link_header ">
                <ul class="nav">
                    <li><a href="">Home</a></li>
                    <!-- <li><a href="">Categories</a></li> -->
                    <li><a href="#foodListTable">Food List</a></li>
                    <li><a href="login.php">Login/Sign Up</a></li>
                </ul>
            </div>
            <div class="intro_text">
                <h1>Welcome to My Food Recipe</h1>
                <h4>Create delicious recipes with ease using our interactive web application</h4>
            </div>
        </div>
    </div>

    <div class="main_text0" id="link_main_text0">
    <ul class="icons">
        <li>
            <div class="contents1">
            <img src="image/contents1.png" alt="">
            </div>
            <div class="sub_content1">
                BBBBBBBBBBBBBBBBBBBBBBBBB.
            </div>
        </li>
        <li>
            <div class="contents1">Food List</div>
            <div class="sub_content1">
                BBBBBBBBBBBBBBBBBBBBBBBBB.
            </div>
        </li>
        <li>
            <div class="contents1">Procedures</div>
            <div class="sub_content1">
                BBBBBBBBBBBBBBBBBBBBBBBBB.
            </div>
        </li>
    </ul>
    </div>

    <div>
        <section class="foodlist">
            <h1 class="text-center" id="foodListTable"><strong>Food Lists</strong></h1>
            <div class="actions">
                <button type="button" class="btn btn-add-food btn-secondary" data-toggle="modal" data-target="#addRecipeModal">Add Recipe</button>
                <input type="text" id="searchInput" placeholder="Search..." onkeyup="search_table()" onclick="">
            </div>
            
            <table >
                <thead>
                    <tr>
                        <th scope="col">Food ID</th>
                        <th scope="col">Recipe Image</th>
                        <th scope="col">Recipe Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $stmt = $conn->prepare("
                        SELECT * 
                        FROM 
                            tbl_recipe
                        LEFT JOIN
                            tbl_category ON
                            tbl_recipe.tbl_category_id = tbl_category.tbl_category_id 
                        ");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
    
                    foreach ($result as $row) {
                        $recipeID = $row['tbl_recipe_id'];
                        $categoryID = $row['tbl_category_id'];
                        $categoryName = $row['category_name'];
                        $recipeImage = $row['recipe_image'];
                        $recipeName = $row['recipe_name'];
                        $recipeIngredients = $row['recipe_ingredients'];
                        $recipeProcedure = $row['recipe_procedure'];
                        ?>
                        <tr>
                            <td id="recipeID-<?= $recipeID ?>"><?php echo $recipeID ?></td>
                            <td id="recipeImage-<?= $recipeID ?>"><img src="http://localhost/Online-recipe-manager/working_directory/uploads/<?php echo $recipeImage ?>" alt="Recipe Image" class="recipe-image"></td>
                            <td id="recipeName-<?= $recipeID ?>"><?php echo $recipeName ?></td>
                            <td id="categoryName-<?= $recipeID ?>"><?php echo $categoryName ?></td>
                            <td id="recipeIngredients-<?= $recipeID ?>" hidden><?php echo $recipeIngredients ?></td>
                            <td id="recipeProcedure-<?= $recipeID ?>" hidden><?php echo $recipeProcedure ?></td>
                            <td>
                                <button type="button" onclick="view_recipe('<?php echo $recipeID ?>')" title="View">View</button>
                                <button type="button" onclick="update_recipe('<?php echo $recipeID ?>')" title="Edit">Edit</button>
                                <button type="button" onclick="delete_recipe('<?php echo $recipeID ?>')" title="Delete">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </div>

    <script src="assets/script.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


</body>
</html>