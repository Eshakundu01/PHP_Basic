<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <style>
    .container {
      width: 900px;
      margin: 0 auto;
    }

    .list {
      background-color: coral;
      padding: 25px;
      display: flex;
      flex-wrap: wrap;
      list-style-type: none;
    }

    .list li {
      padding: 20px;
    }

    .list li a{
      padding: 10px 25px;
      background-color: indianred;
      border-radius: 15px;
      text-decoration: none;
      color: white;
      font-size: 40px;
    }
  </style>
</head>
<body>
  <div class="container">
    <ul class="list">
      <li><h2>Without OOPS</h2></li>
      <li><a href="task1/task1.php">Task1a</a></li>
      <li><a href="task1/task1_session.php">Task1b</a></li>     
      <li><a href="task2/task2.php">Task2</a></li>
      <li><a href="task3/task3.php">Task3</a></li>
      <li><a href="task4/task4.php">Task4</a></li>
    </ul>
    <ul class="list">
      <li><h2>Using OOPS</h2></li>
      <li><a href="task_oops/task1/task1_session.php">Task1</a></li>
      <li><a href="task_oops/task2/task2.php">Task2</a></li>
      <li><a href="task_oops/task4/task4.php">Task4</a></li>
      <li><a href="task_oops/task5/task5.php">Task5</a></li>
      <li><a href="task_oops/task6/task6.php">Task6</a></li>
    </ul>
  </div>
</body>
</html>