<?php $pageTitle = "Branches of Midnight Sun Bistro";
$pageDescription = "Check address, telephone, and other information about our restaurants";
include "header.php"; ?>
<main>
    <h1>Branches of Midnight Sun Bistro:</h1>
    <div class="row">
        <?php componentBranches(); ?>
    </div>
</main>

<?php
function componentBranches()
{
    echo '
<div class="col-12 col-lg-6 text-center">
    <a href="#"><h3>Name</h3></a>
    <p>Tel: 1111<p>
    <p>Add: helsinki</p>
    <p>Email: email</p>
</div>
<div class="col-12 col-lg-6 text-center">
    <a href="#"><h3>Name</h3></a>
    <p>Tel: 1111<p>
    <p>Add: helsinki</p>
    <p>Email: email</p>
</div>';
}

?>
<?php include "footer.php"; ?>