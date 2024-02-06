<?php $pageTitle = "Booking Management";
$pageDescription = "Manage reservations made by customers.";
$pageCssFilename = "reservation";
include "layout/header.php"; ?>
<main>
    <div class="searchbar">
        <h1>Reservation Management</h1>        
        <div class="navbar bg-body-tertiary">
            <div class="container-fluid" id="searchbar">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search">
                    <button class="btn btn-outline-success" id="searchButton" type="submit">Search</button>
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
                <th scope="col">Guest Number</th>
                <th scope="col">Date</th>
                <th scope="col">Email</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
                include "db.php";


                $sql = "SELECT * FROM jinLu_bookinginfo";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";

                        echo "<td>";
                        echo "<div class='button-container'>";

                        echo "<form name='editForm' method='post' action='edit.php" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>";
                        echo "<input type='hidden' name='edit_id' value='" . $row["id"] . "'>";
                        // echo "<a href='edit.php?id=" . $row["id"] . "'>Edit</a>";
                        echo "<button type='submit' id='edit' class='btn btn-primary' name='edit_button'>Edit</button>";
                        echo "</form>";

                        echo "<form name='deleteForm' method='post' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>";
                        echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
                        echo "<button type='submit' id='delete' class='btn btn-danger' name='delete_button'>Delete</button>";
                        echo "</form>";
                        
                        echo "</div>";
                        echo "</td>";

                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["guestNumber"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
        
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
            ?>
        </tbody>
    </table>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST["form"]=== "deleteForm" && isset($_POST['delete_button'])) {
                $id = $_POST['delete_id'];
                $sql = "DELETE * FROM reservations WHERE id = $id";
                if ($mysqli->query($sql) === TRUE) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error deleting record: " . $mysqli->error;
                }
            }
        }
    ?>
</main>    
</body>
</html>
