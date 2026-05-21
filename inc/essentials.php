<?php

/* =========================
   SELECT ALL DATA
========================= */

function selectAll($table)
{
    global $con;

    $res = mysqli_query($con,"SELECT * FROM $table");

    return $res;
}

/* =========================
   SELECT WITH VALUES
========================= */

function select($sql,$values,$datatypes)
{
    global $con;

    $stmt = mysqli_prepare($con,$sql);

    if($stmt)
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);

        mysqli_stmt_execute($stmt);

        $res = mysqli_stmt_get_result($stmt);

        return $res;
    }
    else{
        die("Query failed");
    }
}

/* =========================
   INSERT / UPDATE / DELETE
========================= */

function insert($sql,$values,$datatypes)
{
    global $con;

    $stmt = mysqli_prepare($con,$sql);

    if($stmt)
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);

        mysqli_stmt_execute($stmt);

        $res = mysqli_stmt_affected_rows($stmt);

        return $res;
    }
    else{
        die("Insert query failed");
    }
}

/* =========================
   FILTER DATA
========================= */

function filteration($data)
{
    foreach($data as $key => $value){

        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);

        $data[$key] = $value;
    }

    return $data;
}

/* =========================
   ALERT MESSAGE
========================= */

function alert($type,$msg)
{
    echo "
        <div class='alert alert-$type alert-dismissible fade show custom-alert' role='alert'>
            $msg
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
    ";
}

/* =========================
   IMAGE PATHS
========================= */

define('CAROUSEL_IMG_PATH','images/carousel/');
define('FACILITIES_IMG_PATH','images/facilities/');
define('ROOMS_IMG_PATH','images/rooms/');
define('USERS_IMG_PATH','images/users/');
define('ABOUT_IMG_PATH','images/about/');

?>