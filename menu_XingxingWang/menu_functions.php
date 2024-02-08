<?php
// Include the database connection file
include_once 'db_wxx.php';

// Function to read data from menuItems table
function readMenuItems() {
    global $conn;
    $sql = "SELECT * FROM xingxing_menuItems";
    $result = mysqli_query($conn, $sql);
    $menuItems = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $menuItems[] = $row;
        }
    }
    return $menuItems;
}

// Function to insert a new record into menuItems table
function insertMenuItem($item_name, $category, $ingredients, $vegetarian, $price) {
    global $conn;
    $item_name = mysqli_real_escape_string($conn, $item_name);
    $category = mysqli_real_escape_string($conn, $category);
    $ingredients = mysqli_real_escape_string($conn, $ingredients);
    $vegetarian = mysqli_real_escape_string($conn, $vegetarian);
    $price = mysqli_real_escape_string($conn, $price);

    $sql = "INSERT INTO xingxing_menuItems (item_name, category, ingredients, vegetarian, price) VALUES ('$item_name', '$category', '$ingredients', '$vegetarian', '$price')";
    return mysqli_query($conn, $sql);
}

// Function to update a record in menuItems table
function updateMenuItem($item_id, $item_name, $category, $ingredients, $vegetarian, $price) {
    global $conn;
    $item_id = mysqli_real_escape_string($conn, $item_id);
    $item_name = mysqli_real_escape_string($conn, $item_name);
    $category = mysqli_real_escape_string($conn, $category);
    $ingredients = mysqli_real_escape_string($conn, $ingredients);
    $vegetarian = mysqli_real_escape_string($conn, $vegetarian);
    $price = mysqli_real_escape_string($conn, $price);

    $sql = "UPDATE xingxing_menuItems SET item_name='$item_name', category='$category', ingredients='$ingredients', vegetarian='$vegetarian', price='$price' WHERE item_id='$item_id'";
    return mysqli_query($conn, $sql);
}

// Function to delete a record from menuItems table
function deleteMenuItem($item_id) {
    global $conn;
    $item_id = mysqli_real_escape_string($conn, $item_id);

    $sql = "DELETE FROM xingxing_menuItems WHERE item_id='$item_id'";
    return mysqli_query($conn, $sql);
}


// Function to fetch and display menu items based on category
function displayMenuItemsByCategory($conn) {
    // Check if the category parameter is set
    if (isset($_GET['category'])) {
        $category = $_GET['category'];

        // Fetch menu items based on the selected category
        $sql = "SELECT * FROM menu_items WHERE category = ?";
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
}

?>


