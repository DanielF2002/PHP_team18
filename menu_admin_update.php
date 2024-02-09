<?php
$pageTitle = "Menu Management";
$pageDescription = "Manage the menu";
$pageAdmin = true;

include_once 'layout/header.php';
include 'db_wxx.php';

// Check if item_id is provided in the URL
if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];

    // Fetch menu item based on the provided item_id
    $result = mysqli_query($conn, "SELECT * FROM xingxing_menuItems WHERE item_id = '$item_id'");
    $row = mysqli_fetch_array($result);
?>

    <!-- Form for updating menu item -->
    <h1>Update Menu Item</h1>
    <form method="post" action="">
        <div>
            <?php if (isset($message)) {
                echo $message;
            } ?>
        </div>
        Name: <br>
        <input type="text" name="item_name" value="<?php echo $row['item_name']; ?>"><br>
        Category:<br>
        <input type="text" name="category" value="<?php echo $row['category']; ?>"><br>
        Ingredients:<br>
        <input type="text" name="ingredients" value="<?php echo $row['ingredients']; ?>"><br>
        Vegetarian:<br>
        <select name="vegetarian">
            <option value="1" <?php if ($row['vegetarian'] == 1) echo 'selected'; ?>>Yes</option>
            <option value="0" <?php if ($row['vegetarian'] == 0) echo 'selected'; ?>>No</option>
        </select><br>
        Price:<br>
        <input type="text" name="price" value="<?php echo $row['price']; ?>"><br>
        <input type="submit" name="submit" value="Submit">
    </form>

<?php
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
            echo "Menu Item Modified Successfully <br>";
            echo "<a href='feature10_menu_admin.php'> Back To Menu List </a>";
            // If you want to redirect to update page after updating
            // header("location: update.php");
        } else {
            echo "Menu Item Not Modified";
        }
    }
} else {
    echo "No item ID provided.";
}

$conn->close();
include 'layout/footer.php';
?>