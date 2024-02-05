<?php $pageTitle = "Branches of Midnight Sun Bistro";
$pageDescription = "Check address, telephone, and other information about our restaurants";
include "header.php"; ?>
<main>
    <h1>Branches of Midnight Sun Bistro</h1>
    <?php componentBranches(); ?>
</main>

<?php
function componentBranches()
{
    echo "About page here.";
}

?>
<?php include "footer.php"; ?>