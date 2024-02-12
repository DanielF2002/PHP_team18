<?php $pageTitle = "Feedback Management";
$pageDescription = "Manage feedback";
$pageCssFilename = "feedback";
$pageAdmin = true;
include "layout/header.php"; ?>
<main>
    <div class="searchbar">
        <h1>Reservation Management</h1>        
        <div class="navbar bg-body-tertiary searchbarwhite">
            <div class="container-fluid" id="searchbar">
                <form id="searchForm" class="d-flex" role="search">
                    <input class="form-control me-2" name="searchText" type="search" placeholder="Search by name or ID" aria-label="Search" id="searchText">
                    <button class="btn btn-outline-success" name="search_button" id="searchButton" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Actions</th> 
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Topic</th>
                <th scope="col">Message</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
                include "db.php";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['delete_button'])) {
                        $deleteFormValue = $_POST["deleteForm"];
                        $sql = "DELETE FROM muZhao_feedback WHERE id = $deleteFormValue";
                        if ($conn->query($sql) === TRUE) {
                            echo "Record deleted successfully";
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                    }
                }
                    
                
                $sql = "SELECT * FROM muZhao_feedback";
                    
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    if (isset($_GET['search_button'])) {
                        $searchValue = $_GET["searchText"];
                        $sql = "SELECT * FROM muZhao_feedback WHERE name LIKE '%$searchValue%' OR id= '$searchValue'";
                    }
                }
                
                

                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";

                        echo "<td>";
                        echo "<div class='button-container'>";

                        echo "<a  class='btn btn-primary' id='edit' href='feedbackEdit.php?id=" . $row["ID"] . "'>Edit</a>";


                        echo "<form name='deleteForm' method='post' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>";
                        echo "<input type='hidden' name='deleteForm' value='" . $row["ID"] . "'>";
                        echo "<button type='submit' id='delete' class='btn btn-danger' name='delete_button'>Delete</button>";
                        echo "</form>";
                        
                        echo "</div>";
                        echo "</td>";

                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["topic"] . "</td>";
                        echo "<td>" . $row["message"] . "</td>";

                        echo "</tr>";
                    } 
                } else {
                    echo "0 results";
                }
            $conn->close();
            ?>
        </tbody>
    </table>
</main> 
<footer class="row text-center">
        <div class="col-12 col-lg-4">
            <h3>HOURS</h3>
            <p>Mon--Sat 17-23</p>
            <p>Sunday Closed</p>
        </div>
        <div class="col-12 col-lg-4">
            <h3>LOCATION</h3>
            <p>Linnankatu 9</p>
            <p>13100</p>
            <p>Helsinki</p>
        </div>
        <div class="col-12 col-lg-4">
            <h3>CONTACT</h3>
            <p><a href="mailto:info@midnightsun.fi">info@midnightsun.fi</a></p>
            <div id="social-media">
                <a href="https://www.facebook.com" target="_blank"><img src="layout/images/facebook.png"
                        alt="facebook logo" /></a>
                <a href="https://www.instagram.com/" target="_blank"><img src="layout/images/instagram.png"
                        alt="instagram logo" /></a>
                <a href="https://www.tiktok.com" target="_blank"><img src="layout/images/tiktok.png"
                        alt="tiktok logo" /></a>
            </div>
        </div>
    </footer>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
