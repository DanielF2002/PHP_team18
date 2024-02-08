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

$sql = "select * from menu_items";
$result = $conn->query($sql);?>
<div class="container">
    <nav class="navbar" id="menu manage">
    <div class="container-fluid">
        <a href="#" class="btn btn-secondary btn-sm" role="button">Add New Item</a>
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="d-flex" role="search">
        <input class="form-control me-2 " type="search" placeholder="Search by keyword" name="keyword" aria-label="Search">
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
    if($result ->num_rows > 0) {
        while($row = $result ->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row["item_id"]; ?></td>
    <td><?php echo $row["item_name"]; ?></td>
    <td><?php echo $row["category"]; ?></td>
    <td><?php echo $row["ingredients"]; ?></td>
    <td><?php echo $row["vegetarian"]; ?></td>
    <td><?php echo $row["price"]; ?></td>
    <td><a href="menu_update_admin.php?item_id=<?php echo $row['item_id']; ?>" class="btn btn-secondary btn-sm" role="button">Update</a></td>
    <td><a href="menu_delete_admin.php?item_id=<?php echo $row['item_id']; ?>" class="btn btn-outline-secondary btn-sm" role="button">Delete</a></td>
    </tr>

    <?php 
    }
    }
    else
    {
        echo "no results";
    }
    $conn->close();
    ?>
    </table>

</div>


<?php include '../layout/footer.php' ?>
