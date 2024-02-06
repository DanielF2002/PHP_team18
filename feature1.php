<?php $pageTitle = "Branches of Midnight Sun Bistro";
$pageDescription = "Check address, telephone, and other information about our restaurants";
include "layout/header.php"; ?>
<main>
    <h1>Branches of Midnight Sun Bistro:</h1>
    <div class="row">
        <?php branchFetchAll(); ?>
    </div>
</main>

<?php include "layout/footer.php"; ?>

<?php
// Fetch all data from db
function branchFetchAll()
{
    include "db.php";
    $sql = "SELECT * FROM xin_feng_branches;";
    $result = $conn->query($sql);
    if ($result != FALSE) {
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
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
        } else {
            echo "No Record Found";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
;
?>