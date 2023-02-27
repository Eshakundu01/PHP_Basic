<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP_1</title>
  <link rel="stylesheet" type="text/css" href="../../css/style1.css">
</head>
<body>
  <?php
  
  require 'emailvalidation.php';

  ?>

  <div class=container>
    <div class="form1">
      <h1 class="head">WELCOME</h1>
      <h3 class="head2">Send Email</h3>
      <form method="post" action="sendmail.php">

        Email Id: <input type="text" name="mail" class="input" required <?php if (!empty($email)) {
          echo "value=\"" . $email ."\""; }?>><br>
        <span class="error"><?php echo $mail_error;?></span><br>

        <button type="submit" name="submit" class="btn">Submit</button>
      </form>
    </div>
  </div>
</body>
</html>