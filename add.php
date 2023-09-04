<?php
  include 'include/conn.php';

?>
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

    <!-- RESPONSE POP UP -->
    <div class="response" id="response"></div>

    <!-- CART ITEMS SECTION -->
    <div class="cart down">
        <div class="addit">
            <?php
                if (isset($_GET['id'])) {
                    $prodId = $_GET['id'];
                    $sql = $conn->query("SELECT * FROM products WHERE product_id='$prodId'");
                    if($sql->num_rows > 0) {
                        while($data = $sql->fetch_array()) {
                        echo "
                            <div class='set'>
                                <div class='image'>
                                    <img id='image' src='". $data['product_image']. "' alt='' />
                                    <a href='#'>". $data['stock']. "</a>
                                </div>
                                <div class='name'>
                                    <p id='name'>". $data['product_name']. "</p>
                                    <img src='images/love.png' alt='' />
                                </div>
                                <small id='price'>NGN". $data['price']. "</small> <br>
                                <input style='border: 1px solid #8a9a5b; padding-left: 6px;' id='qty' type='number' min='0' value='1'>
                                <section>
                                    <input type='hidden' id='id' value='". $data['product_id']. "'>
                                    <button id='addbtn'><i class='bx bx-cart-alt'></i> ADD TO CART</button>
                                </section>
                            </div>
                        ";
                        }
                    } else {}
                }else if (isset($_GET['idDeal'])){
                    $prodId = $_GET['idDeal'];
                    $sql = $conn->query("SELECT * FROM deal WHERE product_id='$prodId'");
                    if($sql->num_rows > 0) {
                        while($data = $sql->fetch_array()) {
                        echo "
                            <div class='set'>
                                <div class='image'>
                                    <img id='image' src='". $data['product_image']. "' alt='' />
                                    <a href='#'>". $data['stock']. "</a>
                                </div>
                                <div class='name'>
                                    <p id='name'>". $data['product_name']. "</p>
                                    <img src='images/love.png' alt='' />
                                </div>
                                <small id='price'>NGN". $data['discount_price']. "</small> <br>
                                <input style='border: 1px solid #8a9a5b; padding-left: 6px;' id='qty' type='number' min='0' value='1'>
                                <section>
                                    <input type='hidden' id='id' value='". $data['product_id']. "'>
                                    <button id='addbtn'><i class='bx bx-cart-alt'></i> ADD TO CART</button>
                                </section>
                            </div>
                        ";
                        }
                    } else {}  
                }else {
                    echo "No Item to ADD! <a href='product.php' class='btn'>Shop Now</a>";
                }
            ?>
        </div>

    </div>

    <!-- OUR PRODUCT SECTION -->
    <section class="goods">
      <div class="title">
        <h4>More Products For You</h4>
      </div>

      <!--START OF SECTIONS OF PRODUCTS -->
      <div id="prod1" class="prod active">
        <!-- FETCH PRODUCTS -->
      </div>
      <div id="prod2" class="prod">
        <!-- FETCH MORE PRODUCTS -->
      </div>
      <div id="prod3" class="prod">
        <!-- FETCH MORE PRODUCTS -->
      </div>
      <div id="prod4" class="prod">
        <!-- FETCH MORE PRODUCTS -->
      </div>
      <div id="prod5" class="prod">
        <!-- FETCH MORE PRODUCTS -->
      </div>
      <!--END OF SECTIONS OF PRODUCTS -->

      <div class="counters">
        <ul>
          <i class="bx bxs-left-arrow"></i>
          <button id="one" class="list active">
            <p>1</p>
          </button>
          <button id="two" class="list">
            <p>2</p>
          </button>
          <button id="three" class="list">
            <p>3</p>
          </button>
          <button id="four" class="list">
            <p>4</p>
          </button>
          <button id="five" class="list">
            <p>5</p>
          </button>
          <i class="bx bxs-right-arrow"></i>
        </ul>
      </div>

    </section>

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

    <!-- OUR WHOLESALE SECTION -->
    <section id="intro" class="intro">
      <div class="intro-body">
        <div class="intro-body-text">
            <h1><span>The Elite </span>WHOLESALE<span> Services</span></h1>
        </div>
        <p><span><b>The Elite Crayfish and Other SeaFoods</b></span> offers wholesale deals and services on seafoods and other foodstuffs at 
        awesome wholesale prices.
          Products we sell on wholesale includes crayfish, perwinkles, snails, shrimps, prawns, egusi, ogbono, dry kpomo, okpei, stockfish,
          dry fsh (mangala), crocker fish, oporo, Honey, Red oil, groundnut oil, rice, lobsters.
        </p>
        <div class="prod">
          <!-- PRODUCTS WILL DYNAMICALLY APPEAR HERE -->
          <?php
            $sqlWhole = $conn->query("SELECT * FROM products WHERE state = 'wholesale'");
            if ($sqlWhole->num_rows > 0) {
              while ($dataWhole = $sqlWhole->fetch_array()) {
                echo "
                    <div class='set'>
                        <div class='image'>
                            <img src='". $dataWhole['product_image']. "' alt='' />
                            <a href='#'>". $dataWhole['stock']. "</a>
                        </div>
                        <div class='name'>
                            <p>". $dataWhole['product_name']. "</p>
                            <img src='images/love.png' alt='' />
                            <i class='bx bxs-heart'></i>
                        </div>
                        <small>NGN". $dataWhole['price']. "</small>
                        <section>
                            <a href='add.php?id=". $dataWhole['product_id']. "' target='_blank' rel='noopener noreferrer'>BUY NOW</a>
                        </section>
                    </div>
                ";
              }
            }else{
              echo "No product is availble";
            }
          ?>
        </div>
      </div>
    </section>

    <!-- FOOTER SECTION -->
    <?php include_once 'include/footer.php'?>

    <script type="text/javascript" src="js/index.js?<?php echo time();?>"></script>
    <script type="text/javascript" src="js/add.js?<?php echo time();?>"></script>
    <script type="text/javascript" src="js/goods.js?<?php echo time();?>"></script>
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