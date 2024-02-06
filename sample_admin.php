<?php $pageTitle = "sample admin";
$pageDescription = "good restaurant";
$pageCssFilename = "sample_admin"; // if you have a css file, or just delete this line.
$pageAdmin = true;
include "header.php"; ?>
<main>
    <table class="table text-center">
        <thead>
            <tr>
                <th class="fs-4" scope="col">Actions</th>
                <th class="fs-4" scope="col">ID</th>
                <th class="fs-4" scope="col">Name</th>
                <th class="fs-4 d-none d-lg-table-cell" scope="col">Info</th>
            </tr>
        </thead>
        <tbody>
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
                <td>1</td>
                <td>1111111111111111111111</td>
                <td class="d-none d-lg-table-cell">1111111111111111111111</td>
            </tr>
            <tr>
                <td>
                    <form action="edit_page.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="2">
                        <button type="submit" class="btn">Edit</button>
                    </form>
                    <form action="delete_action.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="2">
                        <button type="submit" class="btn">Delete</button>
                    </form>
                </td>
                <td>2</td>
                <td>222222222222222</td>
                <td class="d-none d-lg-table-cell">222222222222222</td>
            </tr>
        </tbody>
    </table>
</main>
<?php include "footer.php"; ?>