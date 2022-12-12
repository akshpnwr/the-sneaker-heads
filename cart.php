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
    <!-- <script src="app.js" type="module"></script> -->
    <link rel="stylesheet" href="./styles.css" />
    <link rel="stylesheet" href="./cart.css" />

    <title>Cart</title>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="title">THE SNEAKER HEADS</div>
        <div class="nav">
          <ul>
            <li>
              <a href="#">Home</a>
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
              <a href="#">Page</a>
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

      <div class="banner-container cart">
        <div class="banner-text">
          <div class="text">
            <p>Home / Shopping cart</p>
            <h2>
              Shopping Cart
            </h2>
          </div>
        </div>
        <img class="background-image" src="./images/background.jpg" alt="" />
      </div>

      <div class="cart-details">
        <h1>PRODUCTS</h1>
        <div class="cart-items">
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

          $sql = "SELECT * FROM orders";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo '<div class="cart-item" data-id='.$row['o_id'].'>
                      <i class="fa-regular fa-circle-xmark"></i>
                      <img class="cart-item-image" src="./images/sneaker'.$row['p_id'].'.webp" alt="">
                      <p class="cart-item-name">'.$row['item'].'</p>
                      <p class="cart-item-price">$'.$row['price'].'</p>
                    </div>';
            }
          } else {
            echo "0 results";
          }
          $conn->close();

        ?>
          <!-- <div class="cart-item">
            <i class="fa-regular fa-circle-xmark"></i>
            <img class="cart-item-image" src="./images/sneaker1.webp" alt="">
            <p class="cart-item-name">Air Max VI</p>
            <p class="cart-item-price">$220</p>
          </div>
          <div class="cart-item">
            <i class="fa-regular fa-circle-xmark"></i>
            <img class="cart-item-image" src="./images/sneaker1.webp" alt="">
            <p class="cart-item-name">Air Max VI</p>
            <p class="cart-item-price">$220</p>
          </div>        <div class="cart-item">
            <i class="fa-regular fa-circle-xmark"></i>
            <img class="cart-item-image" src="./images/sneaker1.webp" alt="">
            <p class="cart-item-name">Air Max VI</p>
            <p class="cart-item-price">$220</p>
          </div>        <div class="cart-item">
            <i class="fa-regular fa-circle-xmark"></i>
            <img class="cart-item-image" src="./images/sneaker1.webp" alt="">
            <p class="cart-item-name">Air Max VI</p>
            <p class="cart-item-price">$220</p>
          </div> -->
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
