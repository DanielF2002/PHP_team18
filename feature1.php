<?php $pageTitle = "Branches of Midnight Sun Bistro";
$pageDescription = "Check address, telephone, and other information about our restaurants";
include "layout/header.php"; ?>
<main>
    <h1>Branches of Midnight Sun Bistro:</h1>
    <div class="row">
        <?php componentCards(); ?> <!-- Fetch all records from db and show cards. -->
    </div>
</main>

<?php include "layout/footer.php"; ?>

<?php
// Fetch all data from db and echo the cards.
// **SELECT ALL features.**
function componentCards()
{
    include "db.php";
    $sql = "SELECT * FROM xin_feng_branches;";
    $result = $conn->query($sql);
    if ($result != FALSE) {
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) { // Iterate to show all table-like cards.
               componentCard($item); // Fill one card.
            }
        } else {
            echo "<h2>Sorry, We still have no branches yet.</h2>";
        }
    } else {
        echo "<p>Error: " . $sql . "</p><p>" . $conn->error. "</p>";
    }
    $conn->close();
}

// Echo one card.
function componentCard($item) {
    echo '
    <div class="col-12 col-lg-6 text-center">
        <h3>' . $item["name"] . '</h3>
        <p>Tel: <a href="tel:' . $item["tel"] . '">' . $item["tel"] . '</a></p>
        <p>Emaill: <a href="mailto:' . $item["email"] . '"> ' . $item["email"] . '</a></p>
        <p>Address: ' . $item["address"] . '</p>
        <p><a href="#">' . $item["url"] . '</a></p>
    </div>
    ';
}
;
?>