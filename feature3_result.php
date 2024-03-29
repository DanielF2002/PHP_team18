<?php $pageTitle = "Branches Management";
$pageDescription = "Manage the branches";
$pageAdmin = true; // footer.php need this variable to switch the nav links.

if (isset($_POST["mode"])) { // Only show page when mode is set.
    // Use $_POST to determine the operaton requet type: INSERT, UPDATE, or DELETE.
    include "layout/header.php";
    $branchSql = branchAssembleSql();
    // Run SQL and show the result.
    if (isset($branchSql) || !empty($branchSql)) {
        echo '<main class="text-center p-5">';
        branchRunSqlAndEcho($branchSql);
        echo '<a href="feature2.php" class="btn btn-primary mt-5 mb-5">Back</a></main>';
    }
    include "layout/footer.php";
}

// Assemble sql by request mode.
function branchAssembleSql() {
    global $_POST;
    switch ($_POST["mode"]) { // Assemble SQL query by mode.
        case "insert": // ** Insert feature **
            return "INSERT INTO xin_feng_branches (name, tel, email, address, url) 
            VALUES ('" . $_POST["name"] . "', '" . $_POST["tel"] . "', '" . $_POST["email"] . "', 
            '" . $_POST["address"] . "', '" . $_POST["url"] . "')";
        case "update": // ** Update feature **
            return "UPDATE xin_feng_branches SET name='" . $_POST["name"] . "', tel='" . $_POST["tel"] . "', email='" . $_POST["email"] . "', 
            address='" . $_POST["address"] . "', url='" . $_POST["url"] . "' WHERE id='" . $_POST["id"] . "'";
        case "delete": // ** Delete feature **
            return "DELETE FROM xin_feng_branches WHERE id='" . $_POST["id"] . "'";
        default:
            return;
    }
}

// Run given sql and show result.
function branchRunSqlAndEcho($branchSql)
{
    include 'db.php';
    if ($conn->query($branchSql) === TRUE) {
        echo "<h1>Congratulations, branch information successfully updated.</h1>";
    } else {
        echo "<h1>Error:</h1><p>" . $branchSql . "</p><p>" . $conn->error . "</p>";
    }
    $conn->close();
}

?>