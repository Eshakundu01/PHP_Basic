<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP</title>
  <link rel="stylesheet" type="text/css" href="../../css/style1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
  <?php require 'otpvalidate.php'; ?>

  <div class="container">
    <div class="login">
      <h1 class="head">Enter the OTP</h1>
      <form action="otp.php" method="post">
        <span class="error" id="msg"><?php echo $error; ?></span><br>
        OTP: <input type="text" name="otp" class="input"><br>
        <button type="submit" name="submit" class="loginbtn">Submit</button>
        <button type="submit" name="resend" class="loginbtn" id="resend">Resend</button>
      </form>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#msg').each(function() {
        var value = $(this).text();

        if (!value) {
					$('#resend').prop("disabled",true);
        } else {
            $('#resend').prop("disabled",false);
        }
      })
    });
  </script>
</body>
</html>