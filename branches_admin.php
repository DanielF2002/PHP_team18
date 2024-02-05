<?php $pageTitle = "Branches Management";
$pageDescription = "Manage the branches";
$pageAdmin = true;
include "header.php"; ?>
<main>
    <h1>Branches Management</h1>
    <?php componentBranchesAdmin(); ?>
</main>

<?php
function componentBranchesAdmin()
{
    echo "Restaurants admin here.";
}

?>
<?php include "footer.php"; ?>