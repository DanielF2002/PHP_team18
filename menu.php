<?php
$pageTitle = "Menu Of Midnight Sun Bistro";
$pageDescription = "Read the menu";
$pageCssFilename = "menu";
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
    <h1 class="text-center">Explore Menu of Midnight Sun</h1>
    <div class="row">
        <div class="card col-md-3" id="menu-category">
        <img class="card-img-top" id="category-img" src="layout/images/img_menu.jpg" alt="food and drink">
            <p class="card-text">Click on the category to read our menu.</p>
            <h2 class="card-title">Categories</h2>
            <ul class="nav flex-column list-group">
                <?php foreach ($categories as $category) : ?>
                    <li class="nav-link list-group-item category-item" data-category="<?php echo $category; ?>"><?php echo $category; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-9" id="menu-items">
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
                        echo "<div>";
                        echo "<h4>" . $row['item_name'] . "</h4>" ."<br>";
                        echo "<p><strong>Ingredients:</strong> " . $row['ingredients'] . "</p>"."<br>";
                        echo "<p><strong>Vegetarian:</strong> " . ($row['vegetarian'] ? 'Yes' : 'No') . "</p>"."<br>";
                        echo "<p><strong>Price:</strong> €" . number_format($row['price'], 2) . "</p>"."<br>";
                        echo "</div>";
                    }
                } else {
                    echo "No menu items found for this category.";
                }

                // Close the prepared statement
                $stmt->close();
            } 
            else {
                echo '
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="layout/images/img_menu_display1.jpg" class="d-block w-100" alt="food display">
                        </div>
                        <div class="carousel-item">
                        <img src="layout/images/img_menu_display2.jpg" class="d-block w-100" alt="food display">
                        </div>
                        <div class="carousel-item">
                        <img src="layout/images/img_menu_display3.jpg"" class="d-block w-100" alt="food display">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>';
            }
            ?>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle click event on category tags
        document.querySelectorAll('.category-item').forEach(item => {
            item.addEventListener('click', function() {
                var category = this.getAttribute('data-category');
                window.location.href = 'menu.php?category=' + encodeURIComponent(category);
            });
        });
    });
</script>

<?php include 'layout/footer.php' ?>

