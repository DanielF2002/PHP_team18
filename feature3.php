<?php
// Use $_POST["mode"] to determine the operation request is INSERT or UPDATE.
$pageAdmin = true; // footer.php need this variable to switch the nav links.
// Set page properites by different POST mode.
list($pageTitle, $pageDescription, $branchesH1) = branchesGetProperties();
// Get id from $_Post when mode is update.
$branchesId = branchesParsePost();
// Fetch all fields from db.
list($branchesName, $branchesEmail, $branchesTel, $branchesUrl, $branchesAddress) = branchFetch();
include "layout/header.php"; ?>

<main>
    <div class="container row d-lg-flex align-items-center">
        <form class="col-12 col-lg-6" method="post" id="branch_Form" action="feature3_result.php">
            <!-- ** Form feature. ** -->
            <h1><?php echo $branchesH1 ?></h1>
            <input type="hidden" name="id" value="<?php echo $branchesId ?>">
            <div class="form-group">
                <label for="name" class="fs-5">Name</label>
                <input type="text" class="form-control" id="name" name="name" <?php echo $branchesName ?>>
                <p id="name-err" class="text-warning"></p>
            </div>
            <div class="form-group">
                <label for="email" class="fs-5">Email</label>
                <input type="email" class="form-control" id="email" name="email" <?php echo $branchesEmail ?>>
                <p id="email-err" class="text-warning"></p>
            </div>
            <div class="form-group">
                <label for="tel" class="fs-5">Telephone</label>
                <input type="tel" class="form-control" id="tel" name="tel" <?php echo $branchesTel ?>>
                <p id="tel-err" class="text-warning"></p>
            </div>
            <div class="form-group">
                <label for="url" class="fs-5">Url</label>
                <input type="url" class="form-control" id="url" name="url" <?php echo $branchesUrl ?>>
                <p id="url-err" class="text-warning"></p>
            </div>
            <div class="form-group">
                <label for="address" class="fs-5">Address</label>
                <input type="text" class="form-control" id="address" name="address" <?php echo $branchesAddress ?>>
                <p id="address-err" class="text-warning"></p>
            </div>
            <input type="hidden" name="mode" value="<?php echo $_POST["mode"] ?>">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
        <aside class="col-lg-6 d-none d-lg-block">
            <div class="logo col-12">
                <p class="logo-part-1">
                    The pure taste of
                </p>
                <p class="logo-part-2">
                    Midnight Sun Bistro
                </p>
            </div>
        </aside>
    </div>
</main>

<?php $pageJs = "feature3_validation"; include "layout/footer.php"; ?>

<?php

// Parse id from Post if under mode update.
function branchesParsePost()
{
    global $_POST;
    if (isset($_POST["mode"]) && $_POST["mode"] == "update") {
        return $_POST["id"];
    } else {
        $_POST["mode"] = "insert";
        return "";
    }
}

// Set $pageTitle, $pageDescription, $branchesH1 by request mode.
function branchesGetProperties()
{
    global $_POST;
    if (isset($_POST["mode"]) && $_POST["mode"] == "update") {
        return ["Modify A Branch", "Modify a branch in this page", "Modify a branch here:"];
    } else {
        $_POST["mode"] = "insert";
        return ["Add A New Branch", "Add a new branch in this page", "Add a new branch here:"];
    }
}

// Parse $branchesName, $branchesEmail, $branchesTel, $branchesUrl, $branchesAddress by fetching from db.
function branchFetch()
{
    global $_POST, $branchesId;
    if (isset($_POST["mode"]) && $_POST["mode"] == "update")  {
        include "db.php";
        $sql = "SELECT * FROM xin_feng_branches WHERE id = " . $branchesId . ";"; // ** Filter feature. **
        $result = $conn->query($sql);
        if ($result != FALSE && $result->num_rows > 0) {
            $item = $result->fetch_assoc();
            return branchFillhFields($item);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        $_POST["mode"] = "insert";
        return ["", "", "", "", ""];
    }
}

// Return array by given object.
function branchFillhFields($item)
{
    return [
        branchAssembleValue($item["name"]),
        branchAssembleValue($item["email"]),
        branchAssembleValue($item["tel"]),
        branchAssembleValue($item["url"]),
        branchAssembleValue($item["address"])
    ];
}


// Return the assembled value.
function branchAssembleValue($value)
{
    return 'value = "' . $value . '"';
}
?>