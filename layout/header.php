<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/PHP_team18/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=<?php echo $pageDescription; ?> />
    <!-- import Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Freehand&family=Island+Moments&family=Karla&family=Markazi+Text&display=swap"
        rel="stylesheet">
    <link rel="apple-touch-icon" href="/PHP_team18/layout/images/logo192.png" />
    <meta property=”og:title” content=<?php echo $pageTitle; ?> />
    <meta property=”og:description” content=<?php echo $pageDescription; ?> />
    <meta property=”og:image” content="/PHP_team18/layout/images/logo192.png" />
    <title>
        <?php echo $pageTitle; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/PHP_team18/layout/css/site.css" />
    <?php componentCustomerCss(); ?> <!-- Apply custom css here. -->
</head>

<body>
    <div class="container">
        <header>
            <div class="container header-logo text-center">
                <a href="index.php" class="brand-section">
                    <p class="logo-part-1">The pure taste of</p>
                    <p class="logo-part-2">Midnight Sun Bistro</p>
                </a>
                <?php componentNav(); ?>
            </div>
        </header>

        <?php
        function componentCustomerCss()
        {
            global $pageCssFilename;
            if (isset($pageCssFilename) || !empty($pageCssFilename)) {
                echo "<link rel=\"stylesheet\" href=\"layout/css/$pageCssFilename.css\" />";
            }
        }

        function componentNav()
        {
            $customNav = array(
                array("name" => "Home", "link" => "index"),
                array("name" => "Menu", "link" => "menu"),
                array("name" => "Booking", "link" => "reservation"),
                array("name" => "Feedback", "link" => "feedback"),
                array("name" => "Branches", "link" => "feature1"),
            );
            $adminNav = array(
                array("name" => "Branches", "link" => "feature2"),
                array("name" => "Menu", "link" => "menu_admin"),
                array("name" => "Bookings", "link" => "reservation_admin"),
                array("name" => "Feedback", "link" => "feedback_admin"),
            );
            global $pageAdmin;
            echo '<nav class="navbar navbar-expand"><ul class="navbar-nav d-flex justify-content-between w-100">';
            if (!isset($pageAdmin) || empty($pageAdmin) || !$pageAdmin) {
                componentNavLink($customNav);
            } else {
                componentNavLink($adminNav);
            }
            echo '</ul></nav>';
        }

        function componentNavLink($links)
        {
            foreach ($links as $link) {
                echo "<li class=\"nav-item fs-4\"><a href=\"".$link["link"].".php\" class=\"nav-link\">".$link["name"]."</a></li>";
            }
        }
        ?>