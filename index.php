<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/4ce467bf60.js"
      crossorigin="anonymous"
    ></script>
    <script src="app.js" type="module"></script>
    <link rel="stylesheet" href="./styles.css" />
    <title>Home</title>
  </head>
  <body>
  <?php
  // Initialize the session
  session_start();
  
  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location: login.php");
      exit;
  }
  ?>
    <div class="container">
      <header>
        <div class="title">THE SNEAKER HEADS</div>
        <div class="nav">
          <ul>
            <li>
              <a href="./index.php">Home</a>
            </li>
            <li>
              <a href="#">Shop</a>
            </li>
            <li>
              <a href="#">Product</a>
            </li>
            <li>
              <a href="#">Blog</a>
            </li>
            <li>
              <a href="./logout.php">Logout</a>
            </li>
          </ul>
        </div>
        <div class="actions">
          <button>
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
          <button>
            <i class="fa-regular fa-heart"></i>
          </button>
          <button class="cart-btn">
            <i class="fa-solid fa-cart-shopping"></i>
          </button>
        </div>
      </header>

      <div class="banner-container">
        <div class="banner-text">
          <div class="text">
            <h2>
              Choose your <br />
              shoes with us.
            </h2>
            <p>
              We will help you choose the product that without the doubt suits
              you best. And we mean it
            </p>
            <button class="read-more-btn">Read More</button>
          </div>
          <div class="inside-image">
            <img src="./images/sneakers.png" alt="" />
          </div>
        </div>
        <img class="background-image" src="./images/background.jpg" alt="" />
      </div>

      <div class="products-container">
        <h3>Our products</h3>
        <!-- <div class="items"></div> -->
        <div class="products">
        <?php 

          $servername="localhost";
          $username="root";
          $password="";
          $database_name = "mydb";

          $conn = new mysqli($servername, $username, $password, $database_name);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM products";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo '<div class="product" data-id='.$row['p_id'].'>
                      <img src="./images/sneaker'.$row['p_id'].'.webp" alt="" />
                      <p class="product-name">'.$row["name"].'</p>
                      <p class="product-price">$'.$row['price'].'</p>
                      <button class="buy-btn">Buy</button>
                    </div>';
            }
          } else {
            echo "0 results";
          }
          $conn->close();

        ?>
       
        </div>
      </div>

      <footer>
        <div class="socials-container">
          <div class="socials">
            <h2 class="title">THE SNEAKER HEADS</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex odi.
            </p>
            <div class="social-icons">
              <i class="fa-brands fa-facebook-f"></i>
              <i class="fa-brands fa-instagram"></i>
              <i class="fa-brands fa-twitter"></i>
            </div>
          </div>
          <div class="information">
            <h2 class="title" style="color: rgb(249, 55, 55)">INFORMATION</h2>
            <p>About us</p>
            <p>FAQ</p>
            <p>Contact us</p>
          </div>
          <div class="contact">
            <h2 class="title" style="color: rgb(249, 55, 55)">CONTACT US</h2>
            <p>2715 Ash Dr. San Jose, South Dakota 83475</p>
            <p>(808) 555-0111</p>
            <p>thesneakerheads.contacts@gmail.com</p>
          </div>
        </div>
        <div class="copyright">
          <h2>COPYRIGHT ©️ 2022 THE SNEAKER HEADS</h2>
          <h2>ALL RIGHTS RESERVED</h1>
        </div>
      </footer>
    </div>
  </body>
</html>
