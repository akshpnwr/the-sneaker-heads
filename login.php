<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./login.css" />
  </head>
  <body>
    <main>
      <form method="post" class="form" action="">
        <fieldset>
          <legend><span class="number">o</span> Login</legend>

          <label for="Username">Username:</label>
          <input type="text" id="username" name="username" />

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" />
        </fieldset>

        <button type="submit">Order</button>
      </form>
    </main>
  </body>
</html>

<?php

    $message = "";
    if (count($_POST) > 0) {
        $isSuccess = 0;
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username=?";
        $statement = $conn->prepare($sql);
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_assoc()) {
            if (! empty($row)) {
                $hashedPassword = $row["password"];
                if ($password == $hashedPassword) {
                    $isSuccess = 1;
                }
            }
        }
        if ($isSuccess == 0) {
            $message = "Invalid Username or Password!";
            echo "<h1>".$message."</h1>";
        } else {
            header("Location:  ./index.php");
        }
    }

?>