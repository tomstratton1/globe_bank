<?php

function find_all_subjects(){ 
    global $db; 

    $sql = "SELECT * FROM subjects "; //Note the space -> v important for breaking
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    return $result;
}

?>