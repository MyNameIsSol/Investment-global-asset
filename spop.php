<?php
include 'account/configs/dbcon.php';
// Your database connection logic here

// Get the current index from the URL
$current_index = isset($_GET['index']) ? intval($_GET['index']) : 0;

// Fetch data from the table (replace 'your_table' with your actual table name)
$result = mysqli_query($dbconnec, "SELECT * FROM testimonial LIMIT $current_index, 1");
$res = mysqli_num_rows($result);
if($res < 1){
    $data = array("null" => $res);
    echo json_encode($data);
}else{
    $data = mysqli_fetch_assoc($result);
    // Output data as JSON
    echo json_encode($data);
}


// Close database connection
mysqli_close($dbconnec);
?>