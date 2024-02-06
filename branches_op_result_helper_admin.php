<?php
// This script is to generate the html for both of adding or modification page.
$pageAdmin = true;
include "header.php"; ?>
<main class="text-center">
    <?php runSQL(); ?>
</main>
<?php include "footer.php"; ?>

<?php
function runSQL()
{
    include "db.php";
    global $banchesSQL ;
    if ($conn->query($banchesSQL) === TRUE) {
        echo "<h1>Opearation Success!</h1>";
    } else {
        echo "<h1>Opearation Error!</h1><p>" .$banchesSQL. "</p>" . $conn->error;
    }
    $conn->close();
}
?>