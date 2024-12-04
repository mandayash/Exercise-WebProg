<?php
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'test';

  $error = '';
  $isError = false;

//   $conn = new mysqli($host, $username, $password, $database);
//   if ($conn->connect_error) {
//     die("Koneksi gagal: " . $conn->connect_error);
//   } 

  if(isset($_POST['name']) && $_POST['name'] !== '') {
    if(isset($_POST['studentId']) && $_POST['studentId'] !== '') {
      $error = '';
      $isError = false;
    } else {
      $error = 'StudentId have not filled yet';
      $isError = true;
    }
  } else {
    $error = 'Nama belum diisi';
    $isError = true;
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php if($isError): ?>
    <p><?= $error ?></p> 
  <?php endif; ?>
  <?php if($_POST['name']): ?>
    <h1><?= $_POST['name'] ?></h1>
  <?php endif ?>
  <form action="" method='post'>
    <div>
      <label for="nama">Nama: </label>
      <input id="nama" name="name" />
    </div>
    <div>
      <label for="nim">Nim: </label>
      <input id="nim" nim="nim" />
    </div>
    <button type="submit">submit</button>
  </form>
</body>
</html>