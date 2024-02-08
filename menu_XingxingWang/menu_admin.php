
<?php
$pageTitle = "Menu Management";
$pageDescription = "Manage the menu";
$pageAdmin = true;
include_once '../layout/header.php';
require_once 'db_wxx.php'; 

$sql = "select * from menu_items";
$result = $conn->query($sql);?>
<div class="container">
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
