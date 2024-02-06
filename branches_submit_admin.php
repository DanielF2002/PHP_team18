<?php
// This script is to generate the html for both of adding or modification page.
$pageAdmin = true; include "header.php"; ?>
<main>
    <div class="container row d-lg-flex align-items-center">
        <form class="col-12 col-lg-6" method="post" action="<?php echo $branchesAction; ?>">
            <h1>
                <?php echo $branchesH1; ?>
            </h1>
            <div class="form-group">
                <label for="name" class="fs-5">Name</label>
                <input type="text" class="form-control" id="name" name="name" <?php branchesSetValue("name"); ?>>
            </div>
            <div class="form-group">
                <label for="email" class="fs-5">Email</label>
                <input type="email" class="form-control" id="email" name="email" <?php branchesSetValue("email"); ?>>
            </div>
            <div class="form-group">
                <label for="tel" class="fs-5">Telephone</label>
                <input type="tel" class="form-control" id="tel" name="tel" <?php branchesSetValue("tel"); ?>>
            </div>
            <div class="form-group">
                <label for="url" class="fs-5">Url</label>
                <input type="url" class="form-control" id="url" name="url" <?php branchesSetValue("url"); ?>>
            </div>
            <div class="form-group">
                <label for="add" class="fs-5">Address</label>
                <input type="text" class="form-control" id="address" name="address" <?php branchesSetValue("add"); ?>>
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
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
<?php include "footer.php"; ?>

<?php
function branchesSetValue($key) {
    global $branchArr;
    if (isset($branchArr) && !empty($branchArr)) {
        echo "value=".$branchArr[$key];
    }
}?>
