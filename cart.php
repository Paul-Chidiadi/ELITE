<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>THE ELITE CRAYFISH & OTHER SEAFOODS</title>

    <!--MAin CSS file-->
    <link rel="stylesheet" href="css/index.css?<?php echo time();?>" />
    <!--BOXICONS CSS-->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>

    <!-- HEADER SECTION -->
    <?php include_once 'include/header.php'?>

    <!-- WHATSAPP SECTION -->
    <a class="whatsapp" href="https://api.whatsapp.com/send/?phone=2347034696236&text&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer"><i class="bx bxl-whatsapp"></i></a>

    <!-- RESPONSE POP UP -->
    <div class="response" id="response"></div>

    <!-- POP SECTION -->
    <div id='pop' class='pop'>
      <div class='cancelbtn' id='cancel'>
        <i class='bx bx-x'></i>
      </div>
      <div class='pop-body'>
        <div id="listed" class="prod">
          <!-- SEARCHED ITEMS APPEAR HERE -->        
        </div>
      </div>
    </div>
    <!-- Overlays on the background when pop up is active -->
    <div id='overlay' class='' ></div>

    <!-- CART ITEMS SECTION -->
    <div class="cart">
        <div class="empty">
            <div><i class="bx bxs-cart-alt"></i></div>
            <p>Your cart is empty! <br> Browse our categories and discover our best deals!</p>
            <a href="product.php" class="btn">Start Shopping</a>
        </div>

        <div class="full">
            <div id="items" class="items">
                <!-- DISPLAY CART ITEMS HERE -->
            </div>
            
            <div class="sum">
                <h5>CART SUMMARY</h5>
                <div>
                    <div class="col">
                        <p>Subtotal</p>
                        <p id="sub">0.00</p>
                    </div>
                    <div class="col">
                        <p>Delivery Fee</p>
                        <p id="defee">0.00</p>
                    </div>
                    <div class="col">
                        <p>Total</p>
                        <p id="total">0.00</p>
                    </div>
                </div>
                <hr>
                <form action="checkout.php" method="post" id="checkForm">
                    <input type="hidden" id="products_info" name="order_productInfo">
                    <input type="hidden" id="totalPrice" name="order_total"> 
                    <button class="btn" id="checkout">CHECKOUT</button>
                </form>
            </div>
        </div>

    </div>
    
    <!-- learn section -->
    <div class="learn">
      <div class="learn-top">
          <h1>Subscribe to Our NewsLetter</h1>
          <i class='bx bx-bell'></i>
      </div>
      <p>Learn more about seafoods and get enlightened with the 
          knowlegde of seafoods. <span><b>The Elite Crayfish & Other SeaFoods</b> </span>
          equips you with the knowledge of seafoods, its importance to our
          environment and how best to use them to make mouth-watering and delicious meals.
          Subscribe to our <span><b>NEWSLETTER</b></span> to get more updates and learn
          more!
      </p>
      <form action="#" id="letter">
        <input type="text" class="control" id="name" placeholder="name" required/>
        <input type="email" class="control" id="email" placeholder="email" required/>
        <input type="button" id="submit" class="btn" value="SUBSCRIBE" />
      </form>
    </div>

    <!-- FOOTER SECTION -->
    <?php include_once 'include/footer.php'?>

    <script type="text/javascript" src="js/index.js?<?php echo time();?>"></script>
    <script type="text/javascript" src="js/cart.js?<?php echo time();?>"></script>
    <script>
      $(document).ready(function() {
          $("#letter").on("submit", function (e) {
              e.preventDefault();
          });
          $("#submit").on("click", function () {
              let email = $('#email').val();
              let name = $('#name').val();

              $.ajax({
                  url: "index.php",
                  method: "POST",
                  data: {
                      send: 1,
                      emailPHP: email,
                      namePHP: name
                  },
                  success: function (response) {
                      if(response) {
                          $("#response").html(response);
                          $("#response").css("display", "block");
                          setTimeout(() => {
                            $('#email').val("");
                            $('#name').val("");
                            $("#response").css("display", "none");
                          }, 7000);
                      }
                  },
                  dataType: "text",
              })
          })
      })
    </script>
  </body>
</html>