<?php

require 'home_p_dataBase.php';

if (isset($_POST['name']) ) {

  $name = $_POST['name'];
  $email = $_POST['email'];

  $image_name = $_FILES['image'] ['name'];
  $image_type = $_FILES['image'] ['type'];
  $image_size = $_FILES['image'] ['size'];
  $image_file = $_FILES['image'] ['tmp_name'];

  move_uploaded_file($image_file, 'images/'.$image_name);

  $image_path = 'images/'.$image_name;

  $dateTime = date("Y-m-d H:m:s");

  $sql = "INSERT INTO class_work(name,email,p_image,created_at) VALUE('$name','$email','$image_path','$dateTime')";

  if ($con->query($sql)==true) {
    echo '<h1>'. "data-insert".'</h1>';
  }else{
    echo "not ok";
  }


}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>homeP.com</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalnia:wght@500&family=Roboto+Condensed:wght@600&family=Sevillana&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <div class="back"></div>

    <div class="insert">
      <h1>Insert Data</h1>
    </div>

    <div class="container">

        <form action="home_practice.php" method="POST" enctype="multipart/form-data">

              <div class="shadow">
                    <div class="row">

                        <div class="col-6 mt-5">
                          <label class="form-label">Enter Name</label>
                          <input type="name" class="form-control" placeholder="Name" name="name">
                        </div>

                        <div class="col-6 mt-5">
                          <label class="form-label">Enter email</label>
                          <input type="email" class="form-control" placeholder="email" name="email">
                        </div>

                        <div class="col-12 mt-5">
                          <label class="form-label">Upload Image</label>
                          <input type="file" class="form-control" placeholder="Image" name="image">
                        </div>

                        <div class="mt-5 mb-5 justify-content-center d-flex">
                          <button type="submit" class="btn w-50 btn-lg">Submit</button>
                        </div>

                    </div>
              </div>
        </form>


    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>