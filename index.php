<?php
  include 'include/conn.php';

  #INSERT CUSTOMER DETAILS TO DATABASE
  if (isset($_POST['send'])) {
    $email = $conn->real_escape_string($_POST['emailPHP']);
    $name = $conn->real_escape_string($_POST['namePHP']);

    if (!empty($email) && !empty($name)) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          #INSERT INTO DATABASE
          $sql = "INSERT INTO customers (email, name) VALUES ('$email', '$name')";
          if (mysqli_query($conn, $sql)) {
            exit('<font>Subscription Successful</font>');
          } else {
            exit('<font>Subscription Failed</font>');
          }
      }else {
        exit('<font>Email not Valid!</font>');
      }
    }else{
      exit('<font>Empty Inputs!</font>');
    }
  }

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

    <!-- HERO SECTION -->
    <section class="hero">
      <div class="fade"></div>
      <div class="col">
        <h1 class="big">
          Shop & Discover Fresh, Quality Ingredients & <span>SEAFOODS</span> From Our Online Store.
        </h1>
        <small>
          Our collection of super fresh, quality crayfish and seafoods are available
          in bulk to fit your unique recipe and cooking style. We know what you love and
          have it all packaged for you, your favourite recipe and groceries all in one pack!
          Check out our daily deals to see our Full-Ingredient-Package just for you!
        </small>
        <a class="btn" href="product.php">SHOP NOW</a>
      </div>
    </section>

    <!-- COLLECTION SECTION -->
    <section class="collection">
      <h4>OUR MARKET PLACE</h4>
      <h6>Snail Farming, Crayfish, Fresh and Dried Sea Foods. Wholesale and Retail Services.</h6>
      <div class="glasses">
        <div class="col">
          <div>
            <img src="images/hero6.jpg" alt="" />
          </div>
          <p>CLAMS</p>
        </div>
        <div class="col">
          <div>
            <img src="images/hero5.jpg" alt="" />
          </div>
          <p>VEGGIES</p>
        </div>
        <div class="col">
          <div>
            <img src="images/hero4.jpg" alt="" />
          </div>
          <p>TOMATOES</p>
        </div>
        <div class="col">
          <div>
            <img src="images/hero3.jpg" alt="" />
          </div>
          <p>ONIONS</p>
        </div>
      </div>
      <a href="product.php" class="see">See More</a>
    </section>

    <!-- INTRO SECTION -->
    <section id="intro" class="intro">
      <div class="intro-body">
        <div class="intro-body-text">
            <h1>Why Choose <span>The Elite!</span> Crayfish & Other <span>SeaFOODS</span></h1>
        </div>
        <p><span><b>The Elite Crayfish and Other SeaFoods</b></span> is a seafood brand that deals on seafoods, groceries and other foodstuffs.
          We also deal on other food stuffs ranging from rice, egwusi, palm oil, garri and every other food ingeridients. We
          have been in the market for quite a few years now, and we are known for our eligibility, reliability and delivery of
          quality and fresh seefoods. We supply and get products from the fishermen, the farmers down to the final consumers.
          We also export our goods within and outside the country. 
          Our brand is 100% guaranteed, we are registered with CAC and we are different from other brands because whatever you order 
          is what you get! We are located @off ziks avenue 6:30 market, opposite Nepa Office Awka. You can visit our page 
          <a href="https://facebook.com/TheEliteCrayfish" target="_blank" rel="noopener noreferrer" style="color: #8a9a5b;" ><i class="bx bxl-facebook-circle"><b>FACEBOOK</b></i></a> or contact us
          on our support line. Our customer service and support is 100% active. 
          Check our <a href="terms.php" target="_blank" rel="noopener noreferrer" style="color: #8a9a5b;" ><i class="bx bx-book"><b>TERMS & CONDITIONS</b></i></a> to get to know more about
          our services.
        </p>
        <div class="learn-body">
          <a href="https://facebook.com/TheEliteCrayfish">LEARN MORE &#8594;</a>
        </div>
      </div>
    </section>

    <!-- OUR PRODUCT SECTION -->
    <section class="collection">
      <h4>THE ELITES GROCERIES</h4>
      <div id="prod" class="prod">
        <!-- PRODUCTS WILL DYNAMICALLY APPEAR HERE -->
      </div>
      <a href="product.php" class="see">See More</a>
    </section>
    
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
            $sqlWhole = $conn->query("SELECT * FROM products WHERE state = 'wholesale' LIMIT 8");
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
        <div class="learn-body">
          <a href="product.php#intro">SEE MORE &#8594;</a>
        </div>
      </div>
    </section>

    <!-- DEALS SECTION -->
    <section id="deal" class="deals">
      <!-- DEAL OF THE DAY WILL DYNAMICALLY APPEAR HERE -->
      <?php
        $sold = "no";
        $sqlDeal = $conn->query("SELECT * FROM deal");
        $dataDeal = $sqlDeal->fetch_array();
      ?>
      <div class='green'></div>
      <div class='time'>
        <h3>Deal of the Day</h3>
        <small
            >Get amazing deals from our flash<br />
            sales today.</small
        >
        <div class='box'>
            <div>
                <p id='hour'></p>
                <small>Hours</small>
            </div>
            <div>
                <p id='min'></p>
                <small>Minutes</small>
            </div>
            <div>
                <p id='sec'></p>
                <small>Seconds</small>
            </div>
        </div>
        <a class='btn' href="add.php?id=<?php echo $dataDeal['product_id']; ?>" target='_blank' rel='noopener noreferrer'>SHOP NOW</a>
      </div>
      <div class='img'>
          <img src='<?php echo $dataDeal['product_image']; ?>' alt='' />
          <a href='#'><?php echo $dataDeal['stock']; ?></a>
          <div class='discount'>
              <h3><?php echo $dataDeal['percent_discount'];?></h3>
              <h4>NGN <?php echo $dataDeal['price']; ?></h4>
              <h5>NGN <?php echo $dataDeal['discount_price']; ?></h5>
          </div>
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

    <!-- FOOTER SECTION -->
    <?php include_once 'include/footer.php'?>

    <script type="text/javascript" src="js/index.js?<?php echo time();?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
