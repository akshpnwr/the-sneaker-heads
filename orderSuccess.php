<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: white;
      }
        h1 {
          color: white;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: white;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: red;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: red;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>

      <?php
        session_start();

        $p_id = $_GET['id'];
        $name = $_GET['name'];
        $price = $_GET['price'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "mydb";
        $u_name = $_SESSION['username'];
        $o_id = "$p_id$name$u_name";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database_name);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO orders (o_id, item, price, p_id, username)
        VALUES ('$o_id', '$name', '$price','$p_id','$u_name')";

        if ($conn->query($sql) === TRUE) {
          echo '<div class="card">
          <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
          <i class="checkmark">✓</i>
          </div>
          <h1>Success</h1> 
          <p>We received your purchase request;<br/> we will be in touch shortly!</p>
          </div>';
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
      ?>
</body>
</html>