<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'MYSQL_USER';

//database user password
$pass = 'MYSQL_PASSWORD';

$bd = 'MYSQL_DATABASE';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass, $bd);
if ($conn->connect_error) {
    die("NOk!" . $conn->connect_error);
} else {
    echo "Ok!";
}

?>