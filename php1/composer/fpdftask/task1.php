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
  
  require 'verification.php';

  ?>

  <div class=container>
    <div class="form1">
      <h1 class="head">WELCOME</h1>
      <h3 class="head2">Connect Us</h3>
      <form method="post" action="task1.php" enctype="multipart/form-data">

        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" class="input" required <?php if (!empty($first_name)) {
          echo "value=\"" . $first_name ."\""; }?>><br>
        <span class="error"><?php echo $errors['fname_error'];?></span><br>

        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname" class="input" required <?php if (!empty($last_name)) {
          echo "value=\"" . $last_name ."\""; }?>><br>
        <span class="error"><?php echo $errors['lname_error'];?></span><br>

        <label for="fullname">Full name:</label>
        <input type="text" id="fullname" name="fullname" class="input" disabled <?php if (!empty($full_name)) {
          echo "value=\"" . $full_name ."\""; }?>><br>

        Upload image:<input type="file" name="image" id="image" class="upload" required><br>
        <span class="error"><?php echo $errors['img_error'];?></span><br>

        <label for="score" class="label">Marks:</label>
        <textarea name="score" id="score" cols="60" rows="10" placeholder="Enter marks here"><?php if (!empty($lines)) {
          foreach ($lines as $value) { echo $value;} }?></textarea><br>
        <span class="error"><?php echo $errors['grade_error'];?></span><br>

        Phone number:<input type="text" name="code" class="code" required <?php if (!empty($phone_code)) {
          echo "value=\"" . $phone_code ."\""; }?>>
        <input type="text" name="number" class="input" required <?php if (!empty($contact)) {
          echo "value=\"" . $contact ."\""; }?>><br>
        <span class="error"><?php echo $errors['phone_error'];?></span><br>

        Email Id:<input type="text" name="mail" class="input" required <?php if (!empty($email)) {
          echo "value=\"" . $email ."\""; }?>><br>
        <span class="error"><?php echo $errors['mail_error'];?></span><br>

        <button type="submit" name="submit" class="btn">Submit</button>
      </form>
    </div>
  </div>

  <script type=text/javascript>
    document.getElementById('fname').addEventListener("keyup", myFunction);
    document.getElementById('lname').addEventListener("keyup", myFunction);

    var first = document.getElementById('fname');
    var last = document.getElementById('lname');

    function myFunction() {
      document.getElementById('fullname').value = first.value + " " + last.value;
    }
  </script>
</body>
</html>