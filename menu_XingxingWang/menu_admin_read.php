<?php
$pageTitle = "Menu Management";
$pageDescription = "Manage the menu";
$pageAdmin = true;
include_once '../layout/header.php';
require_once 'db_wxx.php';

// Include CRUD functions file
require_once 'menu_functions.php';

// Check if delete button is clicked
if(isset($_GET['delete_item_id'])) {
    $delete_result = deleteMenuItem($_GET['delete_item_id']);
    if($delete_result) {
        echo "Item deleted successfully.";
    } else {
        echo "Error deleting item.";
    }
}

// Check if update button is clicked
if(isset($_POST['update_item_id'])) {
    $update_result = updateMenuItem($_POST['update_item_id'], $_POST['update_item_name'], $_POST['update_category'], $_POST['update_ingredients'], $_POST['update_vegetarian'], $_POST['update_price']);
    if($update_result) {
        echo "Item updated successfully.";
    } else {
        echo "Error updating item.";
    }
}

// Check if add button is clicked
if(isset($_POST['add_item'])) {
    $add_result = insertMenuItem($_POST['add_item_name'], $_POST['add_category'], $_POST['add_ingredients'], $_POST['add_vegetarian'], $_POST['add_price']);
    if($add_result) {
        echo "Item added successfully.";
    } else {
        echo "Error adding item.";
    }
}

$sql = "SELECT * FROM xingxing_menuItems";
$result = $conn->query($sql);
?>





<div class="container">
    <nav class="navbar" id="menu manage">
        <div class="container-fluid">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addItemModal">Add New Item</button>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search by keyword" name="keyword" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    
<?php
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $sql = "SELECT * FROM xingxing_menuItems WHERE item_name LIKE '%$keyword%' OR category LIKE '%$keyword%' OR ingredients LIKE '%$keyword%'";
} else {
    $sql = "SELECT * FROM xingxing_menuItems";
}

$result = $conn->query($sql);
?>

    <!-- Modal for adding new item -->
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add New Menu Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding new menu item -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <label for="add_item_name">Name:</label><br>
                        <input type="text" id="add_item_name" name="add_item_name" required><br>
                        <label for="add_category">Category:</label><br>
                        <input type="text" id="add_category" name="add_category" required><br>
                        <label for="add_ingredients">Ingredients:</label><br>
                        <textarea id="add_ingredients" name="add_ingredients" rows="4" cols="50" required></textarea><br>
                        <label for="add_vegetarian">Vegetarian:</label><br>
                        <select id="add_vegetarian" name="add_vegetarian">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select><br>
                        <label for="add_price">Price:</label><br>
                        <input type="number" id="add_price" name="add_price" step="0.01" required><br>
                        <input type="submit" name="add_item" value="Add Menu Item">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Display existing menu items -->
    <table class="table table-responsive" id="admin-menu-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Ingredients</th>
            <th>Vegetarian</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
        ?>
                <tr>
                    <td><?php echo $row["item_id"]; ?></td>
                    <td><?php echo $row["item_name"]; ?></td>
                    <td><?php echo $row["category"]; ?></td>
                    <td><?php echo $row["ingredients"]; ?></td>
                    <td><?php echo $row["vegetarian"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><a href="menu_functions.php?item_id=<?php echo $row['item_id']; ?>" class="btn btn-secondary btn-sm" role="button">Update</a></td>
                    <td><a href="menu_functions.php?delete_item_id=<?php echo $row['item_id']; ?>" class="btn btn-outline-secondary btn-sm" role="button">Delete</a></td>
                </tr>
        <?php 
            }
        } else {
            echo "No results";
        }
        $conn->close();
        ?>
    </table>
</div>

<?php include '../layout/footer.php' ?>
