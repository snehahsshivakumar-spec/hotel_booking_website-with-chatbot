<?php

$conn = new mysqli("localhost","root","","hotelbooking");

if($conn->connect_error){
    die("Database Failed");
}

$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

    $room_id = $row['id'];

    // Fetch thumbnail image
    $img_q = "SELECT * FROM room_images 
              WHERE room_id='$room_id' 
              AND thumb='1'";

    $img_res = $conn->query($img_q);

    // Default image
    $image = "thumbnail.jpg";

    if($img_res->num_rows > 0){

        $img_row = $img_res->fetch_assoc();

        $image = $img_row['image'];
    }

echo "

<div class='card mb-4 border-0 shadow'>
  <div class='row g-0 p-3 align-items-center'>

    <div class='col-md-5'>
      <img src='images/rooms/$image'
      class='img-fluid rounded'
      style='height:250px; width:100%; object-fit:cover;'>
    </div>

    <div class='col-md-5 px-lg-3 px-md-3 px-0 mt-3 mt-md-0'>

      <h5 class='mb-3'>".$row['name']."</h5>

      <h6 class='mb-3'>₹".$row['price']." per night</h6>

    </div>

    <div class='col-md-2 mt-lg-0 mt-md-0 mt-4 text-center'>

      <a href='room_details.php?id=".$row['id']."'
      class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>
      Book Now
      </a>

    </div>

  </div>
</div>

";

}

?>