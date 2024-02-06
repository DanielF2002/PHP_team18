<?php $pageTitle = "Branches Management";
$pageDescription = "Manage the branches";
$pageAdmin = true;
// Parse the parameters from POST by mode.
list($brId, $brName, $brTel, $brEmail, $brAddress, $brUrl) = branchParsePost();
if (isset($_POST["mode"])) { // Only show page when mode is set.
    include "layout/header.php";
    switch ($_POST["mode"]) { // Assemble SQL query by mode.
        case "insert":
            $branchSql = "INSERT INTO xin_feng_branches (name, tel, email, address, url)
            VALUES ('$brName', '$brTel', '$brEmail', '$brAddress', '$brUrl')";
            break;
        case "update":
            $branchSql = "UPDATE xin_feng_branches SET name='$brName', tel='$brTel', email='$brEmail', 
            address='$brAddress', url='$brUrl' WHERE id='$brId'";
            break;
        case "delete":
            $branchSql = "DELETE FROM xin_feng_branches WHERE id='$brId'";
            break;
        default:
            return;
    }
    // Run SQL and show the result.
    if (isset($branchSql)) {
        branchRunSql($branchSql);
    }
    include "layout/footer.php";
}

// Parse $brId, $brName, $brTel, $brEmail, $brAddress, $brUrl from Post data.
function branchParsePost() {
    switch ($_POST["mode"])
    {
        case "update": // All fields shoud be give under update mode.
            return [$_POST["id"], $_POST["name"], $_POST["tel"], $_POST["email"], $_POST["address"], $_POST["url"]];
        case "delete": // Only id is needed under delete mode.
            return [$_POST["id"], "", "", "", "", ""];
        case "insert": // All fields shoule be given under insertion mode except id.
            return ["", $_POST["name"], $_POST["tel"], $_POST["email"], $_POST["address"], $_POST["url"]];
        default:
            return ["", "", "", "", ""];
    }
}

// Run given sql and show result.
function branchRunSql($branchSql)
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