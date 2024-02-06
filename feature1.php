<?php $pageTitle = "Branches Management";
$pageDescription = "Manage the branches";
$pageAdmin = true;
include "layout/header.php"; ?>
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
            <?php branchFetchAll(); ?>
        </tbody>
    </table>
    <form action="feature2.php" method="post" class="d-inline">
        <input type="hidden" name="mode" value="insert">
        <button type="submit" class="btn">Add a new branch</button>
    </form>
</main>

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
<tr>
    <td>
        <form action="feature3.php" method="post" class="d-inline">
            <input type="hidden" name="id" value="'.$item["id"].'">
            <input type="hidden" name="mode" value="update">
            <button type="submit" class="btn">Edit</button>
        </form>
        <form action="feature3_result.php" method="post" class="d-inline">
            <input type="hidden" name="id" value="'.$item["id"].'">
            <input type="hidden" name="mode" value="delete">
            <button type="submit" class="btn">Delete</button>
        </form>
    </td>
    <td>'.$item["name"].'</td>
    <td class="d-none d-lg-table-cell">'.$item["tel"].'</td>
    <td class="d-none d-lg-table-cell">'.$item["email"].'</td>
    <td class="d-none d-lg-table-cell">'.$item["address"].'</td>
    <td class="d-none d-lg-table-cell">'.$item["url"].'</td>
</tr>';}
        } else {
            echo "No Record Found";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>
<?php include "layout/footer.php"; ?>