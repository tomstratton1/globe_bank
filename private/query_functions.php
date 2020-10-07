<?php

function find_all_subjects(){ 
    global $db; 

    $sql = "SELECT * FROM subjects "; //Note the space -> v important for breaking
    $sql .= "ORDER BY position ASC";
   // echo $sql; //Pop this in to see your SQL and spot errors
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_all_pages(){
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

?>