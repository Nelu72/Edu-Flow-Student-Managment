<?php 

    $conn = mysqli_connect('localhost','root','','eduflow');
    if(!$conn){
        die(mysqli_error($conn));
    }

?>