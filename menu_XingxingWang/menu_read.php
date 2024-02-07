
<?php
$pageTitle = "Menu of Midnight Sun Bistro";
$pageDescription = "read the menu";

include_once '../layout/header.php';
require_once 'db_wxx.php'; 

$sql = "select * from menu_items";
$result = $conn->query($sql);?>

<div class="container">
    <table class="table table-responsive">
    <tr class="table-primary table-hover text-center">
    <th>ID</th>
    <th>Name</th>
    <th>Category</th>
    <th>Ingredients</th>
    <th>Vegetarian</th>
    <th>Price</th>

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
