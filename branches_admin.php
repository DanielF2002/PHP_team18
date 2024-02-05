<?php $pageTitle = "Branches Management";
$pageDescription = "Manage the branches";
$pageAdmin = true;
include "header.php"; ?>
<main>
    <h1>Branches Management: </h1>
    <table class="table text-center">
    <thead>
        <tr>
            <th class="fs-4" scope="col">Action</th>
            <th class="fs-4" scope="col">Name</th>
            <th class="fs-4 d-none d-lg-table-cell" scope="col">Tel</th>
            <th class="fs-4 d-none d-lg-table-cell" scope="col">Email</th>
            <th class="fs-4 d-none d-lg-table-cell" scope="col">Address</th>
            <th class="fs-4 d-none d-lg-table-cell" scope="col">Url</th>
        </tr>
    </thead>
    <tbody>
        <?php componentBranchesAdmin(); ?>
    </tbody>
</table>
</main>

<?php
function componentBranchesAdmin()
{
    echo '
<tr>
    <td>
        <form action="edit_page.php" method="post" class="d-inline">
            <input type="hidden" name="id" value="1">
            <button type="submit" class="btn">Edit</button>
        </form>
        <form action="delete_action.php" method="post" class="d-inline">
            <input type="hidden" name="id" value="1">
            <button type="submit" class="btn">Delete</button>
        </form>
    </td>
    <td>12</td>
    <td class="d-none d-lg-table-cell">11111</td>
    <td class="d-none d-lg-table-cell">11111</td>
    <td class="d-none d-lg-table-cell">11111</td>
    <td class="d-none d-lg-table-cell">11111</td>
</tr>';
}

?>
<?php include "footer.php"; ?>