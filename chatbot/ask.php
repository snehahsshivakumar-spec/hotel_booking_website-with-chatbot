<?php

$conn = mysqli_connect("localhost","root","","hotelbooking");

if(!$conn){
    die("Database Connection Failed");
}

$message = strtolower($_POST['message']);


// CONTACT NUMBER
if(
    strpos($message, "contact") !== false ||
    strpos($message, "phone") !== false ||
    strpos($message, "number") !== false
)
{
    $query = mysqli_query($conn,"SELECT * FROM contact_details LIMIT 1");

    $row = mysqli_fetch_assoc($query);

    echo "Contact Numbers: ".$row['pn1']." , ".$row['pn2'];
}



// EMAIL
else if(
    strpos($message, "email") !== false ||
    strpos($message, "mail") !== false
)
{
    $query = mysqli_query($conn,"SELECT * FROM contact_details LIMIT 1");

    $row = mysqli_fetch_assoc($query);

    echo "Email: ".$row['email'];
}



// ADDRESS
else if(
    strpos($message, "address") !== false ||
    strpos($message, "location") !== false
)
{
    $query = mysqli_query($conn,"SELECT * FROM contact_details LIMIT 1");

    $row = mysqli_fetch_assoc($query);

    echo "Address: ".$row['address'];
}



// FACILITIES
else if(
    strpos($message, "facility") !== false ||
    strpos($message, "facilities") !== false
)
{
    $query = mysqli_query($conn,"SELECT * FROM facilities");

    echo "Facilities Available:<br><br>";

    while($row = mysqli_fetch_assoc($query))
    {
        echo "• ".$row['name']."<br>";
    }
}



// SPA
else if(strpos($message, "spa") !== false)
{
    $query = mysqli_query($conn,"SELECT * FROM facilities WHERE name LIKE '%spa%'");

    if(mysqli_num_rows($query)>0)
    {
        echo "Yes, Spa facility is available.";
    }
    else{
        echo "No, Spa facility is not available.";
    }
}



// WIFI
else if(strpos($message, "wifi") !== false)
{
    $query = mysqli_query($conn,"SELECT * FROM facilities WHERE name LIKE '%wifi%'");

    if(mysqli_num_rows($query)>0)
    {
        echo "Yes, Wifi is available.";
    }
    else{
        echo "Wifi is not available.";
    }
}



// AC
else if(
    strpos($message, "ac") !== false ||
    strpos($message, "air conditioner") !== false
)
{
    $query = mysqli_query($conn,"SELECT * FROM facilities WHERE name LIKE '%air%'");

    if(mysqli_num_rows($query)>0)
    {
        echo "Yes, Air Conditioner is available.";
    }
    else{
        echo "Air Conditioner is not available.";
    }
}



// ROOMS
else if(
    strpos($message, "room") !== false ||
    strpos($message, "rooms") !== false
)
{
    $query = mysqli_query($conn,"SELECT * FROM rooms");

    echo "Rooms Available:<br><br>";

    while($row = mysqli_fetch_assoc($query))
    {
        echo $row['name']." - ₹".$row['price']." per night <br>";
    }
}



// PRICE
else if(
    strpos($message, "price") !== false ||
    strpos($message, "cost") !== false
)
{
    $query = mysqli_query($conn,"SELECT * FROM rooms");

    echo "Room Prices:<br><br>";

    while($row = mysqli_fetch_assoc($query))
    {
        echo $row['name']." : ₹".$row['price']."<br>";
    }
}



// DEFAULT
else
{
    echo "Sorry, I didn't understand your question.";
}

?>