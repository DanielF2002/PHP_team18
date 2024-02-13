<?php
$pageTitle = "Menu Management";
$pageDescription = "Manage the menu";
$pageCssFilename = "menu";
$pageAdmin = true;

include 'layout/header.php';
include 'db.php';

// Check if item_id is provided in the URL
if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];

    // Fetch menu item based on the provided item_id
    $result = mysqli_query($conn, "SELECT * FROM xingxing_menuItems WHERE item_id = '$item_id'");
    $row = mysqli_fetch_array($result);


    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Retrieve form data
        $item_name = $_POST['item_name'];
        $category = $_POST['category'];
        $ingredients = $_POST['ingredients'];
        $vegetarian = $_POST['vegetarian'];
        $price = $_POST['price'];

        // Update the menu item in the database
        $query = mysqli_query($conn, "UPDATE xingxing_menuItems SET item_name = '$item_name', category = '$category', ingredients = '$ingredients', vegetarian = '$vegetarian', price = '$price' WHERE item_id = '$item_id'");

        if ($query) {
            $message = "Menu item updated successfully.";

        } else {
            $message = "Error updating menu item: " . $conn->error;
        }
    }
} 
else {
    echo "No item ID provided.";
}

$conn->close();
?>


<hr>
<div class="container">
    <h1>Update Menu Item</h1>
    <?php if (isset($message)) : ?>
        <div class="alert alert-<?php echo isset($error) ? 'danger' : 'success'; ?>" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

<!-- Form for updating menu item -->
<form method="post" id="menu_update">
    <div>
        <?php if (isset($message)) {
            echo $message;
        } ?>
    </div>
    Name: <br>
    <input class="form-control" id="item_name" type="text" required name="item_name" value="<?php echo $row['item_name']; ?>"><br>
    <p id="nameError"></p>
    
    Category:<br>
    <input class="form-control" id="category" type="text" required name="category" value="<?php echo $row['category']; ?>"><br>
    <p id="categoryError"></p>
    Ingredients:<br>
    <input class="form-control" id="ingredients" type="text" required name="ingredients" value="<?php echo $row['ingredients']; ?>"><br>
    <p id="ingredientsError"></p>
    Vegetarian:<br>
    <select class="form-control" id="vegetarian" name="vegetarian">
        <option value="1" <?php if ($row['vegetarian'] == 1) echo 'selected'; ?>>Yes</option>
        <option value="0" <?php if ($row['vegetarian'] == 0) echo 'selected'; ?>>No</option>
    </select><br>
    <p id="vegetarianError"></p>
    Price:<br>
    <input class="form-control" id="price" type="text" required name="price" value="<?php echo $row['price']; ?>"><br>
    <p id="priceError"></p>
    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
    
</form>
<a class="btn btn-primary" role="button" href="menu_admin.php"> Back To Menu List </a>

<script>
    //function to validate name
    function validateName(){
        const name=document.getElementById("item_name").value;
        const nameError = document.getElementById("nameError");
        if (name.length < 2){
            nameError.innerHTML = "Name must be more than 1 character."
            return false;
        }
        else{
            nameError.innerHTML = "";
            return true;
        }
    }

    //function to validate category
    function validateCategory(){
        const category=document.getElementById("category").value;
        const categoryError = document.getElementById("categoryError");
        if (!category){
            categoryError.innerHTML = "Please enter the category."
            return false;
        }
        else{
            categoryError.innerHTML = "";
            return true;
        }
    }

    //function to validate ingredients
    function validateIngredients(){
        const ingredients=document.getElementById("ingredients").value;
        const ingredientsError = document.getElementById("ingredientsError");
        if (ingredients.length > 200){
            ingredientsError.innerHTML = "No more than 200 characters."
            return false;
        }
        else{
            ingredientsError.innerHTML = "";
            return true;
        }
    }


    //function to validate price
    function validatePrice(){
        const price=document.getElementById("price").value;
        const priceError = document.getElementById("priceError");
        if (!price||price <= 0){
            priceError.innerHTML = "Please enter valid price."
            return false;
        }
        else{
            priceError.innerHTML = "";
            return true;
        }
    }

    document.getElementById("item_name").addEventListener("input",validateName);
    document.getElementById("category").addEventListener("input",validateCategory);
    document.getElementById("ingredients").addEventListener("input",validateIngredients);
    document.getElementById("price").addEventListener("input",validatePrice);

</script>

<?php

include 'layout/footer.php';
?>