<?php
$pageTitle = "Menu Of Midnight Sun Bistro";
$pageDescription = "Read the menu";
$pageAdmin = false;
include 'layout/header.php';
include 'db.php';

// Fetch unique categories from the xingxing_menuItems table
$sqlCategories = "SELECT DISTINCT category FROM xingxing_menuItems";
$resultCategories = $conn->query($sqlCategories);
$categories = [];
if ($resultCategories->num_rows > 0) {
    while ($row = $resultCategories->fetch_assoc()) {
        $categories[] = $row["category"];
    }
}

?>

<hr>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <h3>Categories</h3>
            <ul class="nav flex-column list-group">
                <?php foreach ($categories as $category) : ?>
                    <li class="nav-link list-group-item category-item" data-category="<?php echo $category; ?>"><?php echo $category; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-6" id="menu-items">
            <?php
            // Check if the category parameter is set
            if (isset($_GET['category'])) {
                $category = $_GET['category'];

                // Fetch menu items based on the selected category
                $sql = "SELECT * FROM xingxing_menuItems WHERE category = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $category);
                $stmt->execute();
                $result = $stmt->get_result();

                // Output menu items as HTML
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='menu-item'>";
                        echo "<h4>" . $row['item_name'] . "</h4>";
                        echo "<p><strong>Ingredients:</strong> " . $row['ingredients'] . "</p>";
                        echo "<p><strong>Vegetarian:</strong> " . ($row['vegetarian'] ? 'Yes' : 'No') . "</p>";
                        echo "<p><strong>Price:</strong> $" . number_format($row['price'], 2) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "No menu items found for this category.";
                }

                // Close the prepared statement
                $stmt->close();
            } else {
                echo "Please click on the category to read our menu.";
            }
            ?>
        </div>
        <div class="col-md-4" id="menu-image">
            <img class="img-fluid" src="layout/images/img_menu.jpg" alt="menu reading page image" style="border-radius: 1rem;">
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle click event on category tags
        document.querySelectorAll('.category-item').forEach(item => {
            item.addEventListener('click', function() {
                var category = this.getAttribute('data-category');
                window.location.href = 'feature8_menu_user.php?category=' + encodeURIComponent(category);
            });
        });
    });
</script>

<?php include 'layout/footer.php' ?>

