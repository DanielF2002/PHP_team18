<?php $pageTitle = "Branches Management";
$pageDescription = "Manage the branches";
$pageAdmin = true;

if (isset($_POST["mode"])) { // Only show page when mode is set.
    include "layout/header.php";
    $branchSql = branchAssembleSql();
    // Run SQL and show the result.
    if (isset($branchSql) || !empty($branchSql)) {
        branchRunSqlAndEcho($branchSql);
    }
    include "layout/footer.php";
}

// Assemble sql by request mode.
function branchAssembleSql() {
    global $_POST;
    switch ($_POST["mode"]) { // Assemble SQL query by mode.
        case "insert":
            return "INSERT INTO xin_feng_branches (name, tel, email, address, url) 
            VALUES ('" . $_POST["name"] . "', '" . $_POST["tel"] . "', '" . $_POST["email"] . "', 
            '" . $_POST["address"] . "', '" . $_POST["url"] . "')";
        case "update":
            return "UPDATE xin_feng_branches SET name='" . $_POST["name"] . "', tel='" . $_POST["tel"] . "', email='" . $_POST["email"] . "', 
            address='" . $_POST["address"] . "', url='" . $_POST["url"] . "' WHERE id='" . $_POST["id"] . "'";
        case "delete":
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
        echo "<main><h1>Congratulations, branch information successfully updated.</h1></main>";
    } else {
        echo "<main><h1>Error:</h1><p>" . $branchSql . "</p><p>" . $conn->error . "</p></main>";
    }
    $conn->close();
}

?>