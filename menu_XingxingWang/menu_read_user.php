<?php
$pageTitle = "Menu of Midnight Sun Bistro";
$pageDescription = "Read the menu";

include_once '../layout/header.php';
require_once 'db_wxx.php';

// Fetch unique categories from the menu_items table
$sqlCategories = "SELECT DISTINCT category FROM menu_items";
$resultCategories = $conn->query($sqlCategories);
$categories = [];
if ($resultCategories->num_rows > 0) {
    while ($row = $resultCategories->fetch_assoc()) {
        $categories[] = $row["category"];
    }
}

?>

<!-- <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
</ul> -->

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
            <!-- Menu items will be displayed here -->
        </div>
        <div class="col-md-4" id="menu-image">
            <img class="img-fluid" src="../layout/images/img_menu.jpg" alt="menu reading page image" style="border-radius: 1rem;">
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle click event on category tags
        document.querySelectorAll('.category-item').forEach(item => {
            item.addEventListener('click', function() {
                var category = this.getAttribute('data-category');
                fetchMenuItems(category);
            });
        });

        // Function to fetch menu items based on category
        function fetchMenuItems(category) {
            fetch('fetch_menu_items.php?category=' + encodeURIComponent(category))
                .then(response => response.text())
                .then(data => {
                    document.getElementById('menu-items').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>

<?php include '../layout/footer.php' ?>
