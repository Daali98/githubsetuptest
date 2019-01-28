<?php
require_once('config.php');

if ( ! empty( $_POST ) ) {
  $mysql = new mysqli( localhost, fiksitfi_daniel, edustus98, fiksitfi_test );
  $data = array_map( array( $mysql, 'real_escape_string' ), $_POST );

  extract( $data );

  $query = "INSERT INTO users (name,email) VALUES ('$name', '$email')";
  $insert = $mysql->query( $query );
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>Page Title</title>
</head>
<body>

  <?php if ( isset( $insert ) ) : ?>
    <div class="message">
        <?php if ( $insert == true ) : ?>
          <p class="success">Data was inserted succesfully.</p>
        <?php else : ?>
            <p class="error">There was an error with the submission.</p>
        <?php endif; ?>
    </div>
  <?php endif; ?>

<form action="" method="post">
  <div class="form">
      <input type="text" class="text" name="name" placeholder="Enter your name" required>
  </div>

  <div class="form">
      <input type="email" class="text" name="email" placeholder="Enter your email" required>
  </div>

  <div class ="form">
      <button class="button">Submit</button>
  </div>
</form>

</body>
</html>
