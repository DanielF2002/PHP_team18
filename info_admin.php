<?php $pageTitle = "Restaurants Management";
$pageDescription = "Manage the restaurants";
$pageAdmin = true;
include "header.php"; ?>
<main>
    <h1>Restaurants Management</h1>
    <?php componentRestaurantsAdmin(); ?>
</main>

<?php
function componentRestaurantsAdmin()
{
    echo "Restaurants admin here.";
}

?>
<?php include "footer.php"; ?>