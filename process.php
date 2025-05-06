<?php
include 'koneksi.php';

$query = "SELECT * FROM users";
$result = pg_query($conn, $query);

while ($row = pg_fetch_assoc($result)) {
    echo $row['username'] . "<br>";
}
?>