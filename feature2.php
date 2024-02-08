<?php $pageTitle = "Branches Management";
$pageDescription = "Manage the branches";
$pageAdmin = true; // footer.php need this variable to switch the nav links.
include "layout/header.php"; ?>
<main>
    <h1>Branches Management: </h1>
    <table class="table text-center"> <!-- **Table feature.** -->
        <thead>
            <tr>
                <th class="fs-4" scope="col">Actions</th>
                <th class="fs-4" scope="col">Name</th>
                <th class="fs-4 d-none d-lg-table-cell" scope="col">Tel</th>
                <th class="fs-4 d-none d-lg-table-cell" scope="col">Email</th>
                <th class="fs-4 d-none d-lg-table-cell" scope="col">Address</th>
                <th class="fs-4 d-none d-lg-table-cell" scope="col">Url</th>
            </tr>
        </thead>
        <tbody>
            <?php componentTbody(); ?> <!-- Fetch all data from db and show tbody. -->
        </tbody>
    </table>
    <form action="feature3.php" method="post" class="d-inline">
        <input type="hidden" name="mode" value="insert">
        <button type="submit" class="btn">Add a new branch</button>
    </form>
    <script>
        // **Javascript feature.*/
        // Ask user to comfirm before delete a branch.
        function confirmDelete() {
            return confirm("You are deleting a branch, are you sure?");
        }
    </script>
    <noscript>
        Your browser does not support JavaScript, or it is disabled. Please check your browser settings.
    </noscript>
</main>

<?php

// Fetch all data from db **SELECT ALL feature.**
function componentTbody()
{
    include "db.php";
    $sql = "SELECT * FROM xin_feng_branches;";
    $result = $conn->query($sql);
    if ($result != FALSE) {
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
               componentRow($item);
            }
        } else {
            echo "<tr>No Record Found</tr>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

// Echo one row.
function componentRow($item)
{
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
                <button type="submit" class="btn" onclick="return confirmDelete()">Delete</button>
            </form>
        </td>
        <td>'.$item["name"].'</td>
        <td class="d-none d-lg-table-cell">'.$item["tel"].'</td>
        <td class="d-none d-lg-table-cell">'.$item["email"].'</td>
        <td class="d-none d-lg-table-cell">'.$item["address"].'</td>
        <td class="d-none d-lg-table-cell">'.$item["url"].'</td>
    </tr>';
}
?>
<?php include "layout/footer.php"; ?>