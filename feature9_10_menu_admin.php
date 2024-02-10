<?php
$pageTitle = "Menu Management";
$pageDescription = "Manage the menu";
$pageAdmin = true;
include 'layout/header.php';
include 'db.php';


$sql = "select * from xingxing_menuItems";
$result = $conn->query($sql);?>
<div class="container">
    <nav class="navbar" id="menu manage">
    <div class="container-fluid">
        <a href="menu_admin_create.php" class="btn btn-secondary btn-sm" role="button">Add New Item</a>
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
    <td><a href="menu_admin_update.php?item_id=<?php echo $row['item_id']; ?>" class="btn btn-secondary btn-sm" role="button">Update</a></td>
    <td><a data-item-id="<?php echo $row['item_id']; ?>" class="btn btn-outline-secondary btn-sm delete-btn" role="button">Delete</a></td>

    </tr>

    <?php 

    }
    }
    else
    {
        echo "no results";
    }


// Check if item_id is provided in the URL
if(isset($_GET['delete_item_id'])) {
    $delete_item_id = $_GET['delete_item_id'];

    // Query to delete the menu item
    $delete_query = "DELETE FROM xingxing_menuItems WHERE item_id = '$delete_item_id'";
    if(mysqli_query($conn, $delete_query)) {
        echo '<script>alert("Item deleted successfully."); window.location.href = "'. $_SERVER['PHP_SELF'] .'";</script>';
    } else {
        echo '<script>alert("Error deleting item.");</script>';
    }
}

    $conn->close();
    ?>
    </table>



</div>
<script>
// Function to handle delete button click
document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        var itemId = this.getAttribute('data-item-id');
        if(confirm("Are you sure you want to delete this item?")) {
            window.location.href = '<?php echo $_SERVER["PHP_SELF"]; ?>?delete_item_id=' + itemId;
        }
    });
});
</script>

<?php include 'layout/footer.php' ?>
