<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Query</title>
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>
  <?php

  require 'queryredirect.php';

  ?>

  <div class="container">
    <div class="get-query">
      <h2>ENTER THE QUESTION NO. TO VIEW</h2>
      <form action="query.php" method="get" class="find">
        <input type="text" name="Q" class="search">
        <input type="submit" name="search" value="Search" class="btn-2">
      </form>
    </div>
  </div>
</body>
</html>