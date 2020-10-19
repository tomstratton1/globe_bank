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

function find_subject_by_id($id) {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // returns an assoc. array 
}

function validate_subject($subject) {
    $errors = [];

    // menu_name
    if(is_blank($subject['menu_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    // Make sure we are working with an integer
    $postion_int = (int) $subject['position'];
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $subject['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    return $errors;
  }


  function insert_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "INSERT INTO subjects";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . $subject['menu_name'] . "',";
    $sql .= "'" . $subject['position'] . "',";
    $sql .= "'" . $subject['visible'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // for INSERT statements, $result is true/false
    if($result) {
        return true;

    } else{
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }


}

function update_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)) {
        return $errors; // This bails us out of the function if there are errors - don't update database
    }

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . $subject['menu_name'] . "', ";
    $sql .= "position='" . $subject['position'] . "', ";
    $sql .= "visible='" . $subject['visible'] . "' ";
    $sql .= "WHERE id='" . $subject['id'] . "' ";
    $sql .= "LIMIT 1"; //fail safe so we don't update the whole db! 

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, result is true or false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

}

function delete_subject($id) {
    global $db;

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
   
   $result = mysqli_query($db, $sql);
   
   // For DELETE statements the result is true or false
       if($result){
           return true;
       } else {
           //DELETE failed
           echo mysqli_error($db);
           db_disconnect($db);
           exit;
       }
}

function find_all_pages(){
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_all_pages_by_subject_id($subject_id){
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE subject_id ='" . $subject_id ."'";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_page_by_id($id) {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page; // returns an assoc. array 
}

function insert_page($page) {
    global $db;

    $sql = "INSERT INTO pages";
    $sql .= "(menu_name, subject_id, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . $page['menu_name'] . "',";
    $sql .= "'" . $page['subject_id'] . "',";
    $sql .= "'" . $page['position'] . "',";
    $sql .= "'" . $page['visible'] . "'";
    $sql .= "'" . $page['content'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // for INSERT statements, $result is true/false
    if($result) {
        return true;

    } else{
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }


}

function update_page($page) {
    global $db;

    $sql = "UPDATE pages SET ";
    $sql .= "menu_name='" . $page['menu_name'] . "', ";
    $sql .= "position='" . $page['position'] . "', ";
    $sql .= "visible='" . $page['visible'] . "' ";
    $sql .= "subject_id='" . $page['subject_id'] . "' ";
    $sql .= "content='" . $page['content'] . "' ";
    $sql .= "WHERE id='" . $page['id'] . "' ";
    $sql .= "LIMIT 1"; //fail safe so we don't update the whole db! 

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, result is true or false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

}

function delete_page($id) {
    global $db;

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
   
    $result = mysqli_query($db, $sql);
   
   // For DELETE statements the result is true or false
       if($result){
           return true;
       } else {
           //DELETE failed
           echo mysqli_error($db);
           db_disconnect($db);
           exit;
       }
}



?>

