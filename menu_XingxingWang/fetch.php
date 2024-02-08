<?php
require_once 'db_wxx.php';

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
    echo "Category parameter is missing.";
}

// Close the database connection
$conn->close();
?>