<?php
    $server = "localhost";
    $username = "root";
    $password = "password";
    $db_name = "php_18";

    // Create connection
    $connect = mysqli_connect($server, 
                              $username, 
                              $password, 
                              $db_name);

    // Check connection
    try{
        $connect = mysqli_connect($db_server, 
                                  $db_user, 
                                  $db_pass, 
                                  $db_name);
    }
    catch(mysqli_sql_exception){
        echo"Could not connect!";
    }
    
    if($connect){
        echo"You are connected!";
    }
        
    // SQL to create a table
    $sql = "CREATE TABLE IF NOT EXISTS example_table (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";


    // Execute query
    if ($connect->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $connect->error;
    }


    // Close connection
    mysqli_close($connect);

?>