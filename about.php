<?php $pageTitle = "About Midnight Sun Bistro";
$pageDescription = "Check opening time, address, telephone, and other information about our restaurants";
include "header.php"; ?>
<main>
    <h1>About Midnight Sun Bistro</h1>
    <?php componentRestaurant(); ?>
</main>

<?php
function componentRestaurant()
{
    echo "About page here.";
}

?>
<?php include "footer.php"; ?>