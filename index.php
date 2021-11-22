<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title>Progetto 04/11</title>
</head>

<body>
  <div class="container">
  <h1 class="text-center"><strong>PROGETTO 04/11</strong></h1>

<?php
//GET EXTENSION FROM FILE

require('connection.php');

//declaration array of extyension file
$file = [];

//insert file extension for file in array
foreach ($myfiles as $filename) {
  //get extensione
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  //push extension in array
  array_push($file, $ext);
}

//if is there remove dir from extension possible
$file_select = array_filter(array_unique($file));
?>

<hr>

<!-- FORM FOR FILE SELECTION -->

<form action="api.php" method="POST">
  <div class="form-group">
  <i><label for="extension">Seleziona il tipo di file:</label></i> 
  <select class="form-control" name="extension" id="extension">
    <?php
    foreach ($file_select as $file_to_stamp) {
      echo "<option value='$file_to_stamp'>$file_to_stamp</option>";
    }
    ?>
  </select> <br>
  </div>
  <button type="submit" class="btn btn-outline-primary">Primary</button>
</form>
  </div>
</body>

</html>

<script>
  $('document').ready(function() {

    $('#login').click(function() {
      var email = $('#email').val();
      var password = $('#password').val();
      if (email == "" || password == "") {
        alert('inserire i dati.');
      } else {
        $.ajax({
          url: 'api.php',
          method: 'POST',
          data: {
            login: 1,
            emailPHP: email,
            passwordPHP: password
          },
          success: function(response) {
            tabella(response)
          },
        });
      }
    });

  });
</script>