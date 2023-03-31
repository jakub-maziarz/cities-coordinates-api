<?php
include './config/dbconfig.php';

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $escaped_name = $conn->real_escape_string($name);

    $sql = "SELECT * FROM city WHERE name LIKE '%$escaped_name%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(array('cities' => $data));
    } else {
        echo json_encode(array('message' => 'City not found'));
    }
} else {
    echo json_encode(array('message' => 'Provide city name'));
}
?>