<?php
$pageTitle = "Create New Menu Item";
$pageDescription = "Add a new menu item to the Midnight Sun Bistro menu";
$pageAdmin = true;
include 'layout/header.php';
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $item_name = $_POST['item_name'] ?? '';
    $category = $_POST['category'] ?? '';
    $ingredients = $_POST['ingredients'] ?? '';
    $vegetarian = isset($_POST['vegetarian']) ? 1 : 0;
    $price = $_POST['price'] ?? '';

    // Insert data into xingxing_menuItems table
    $sql = "INSERT INTO xingxing_menuItems (item_name, category, ingredients, vegetarian, price) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssid", $item_name, $category, $ingredients, $vegetarian, $price);
    
    if ($stmt->execute()) {
        $message = "Menu item added successfully.";
    } else {
        $message = "Error adding menu item: " . $conn->error;
    }
    $stmt->close();
}
?>

<div class="container">
    <h2>Create New Menu Item</h2>
    <?php if (isset($message)) : ?>
        <div class="alert alert-<?php echo isset($error) ? 'danger' : 'success'; ?>" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="4" required></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="vegetarian" name="vegetarian">
            <label class="form-check-label" for="vegetarian">Vegetarian</label>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include 'layout/footer.php' ?>
