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
        <p style="color: white;">TERMS AND CONDITIONS</p>
        <a class="btn" href="product.php">SHOP NOW</a>
      </div>
    </section>

    <!-- TERMS & CONDITION SECTION -->
    <section id="intro" class="intro">
      <div class="intro-body">
        <div class="intro-body-text">
            <h1><span>The Elite</span> Crayfish & Other <span>SeaFOODS</span></h1>
        </div>
        <h3>Terms of use</h3>
        <p>
          By accessing the The Elites Crayfish and other Seafoods website
          you consent agree and to be bound by the following terms and conditions.
           Your access to Use the websites Services of
          The Elites Crayfish and other Seafoods website are conditioned on your acceptance and
          compliance with these Terms of Use (“Terms”). By accessing or Using
          the Services, you agree to be bound by these Terms. If you are
          accepting these Terms and Using the Services on behalf of a company,
          organization, government, or other legal entity, you represent and
          warrant that you are authorized to do so. You may Use the Services
          only in compliance with these Terms and all applicable local, state,
          national, and international laws, rules, and regulations.
        </p>
        <hr />
        <h3>Ownership</h3>
        <p>
          All materials on this website are owned and licensed by
          The Elites Crayfish and other Seafoods and its third-party providers. 
          Unless otherwise indicated, all service marks, trademarks, and logos appearing on this
          web site are the exclusive property of The Elites Crayfish and other Seafoods. The
          information, materials, and other content of this website may not be
          copied, displayed, distributed, downloaded, licensed, modified,
          published, reposted, reproduced, reUked, sold, transmitted, used to
          create a derivative work, or otherwise used for public or commercial
          purposes without the express written consent of
          The Elites Crayfish and other Seafoods.
        </p>
        <hr />
        <h3>Products and Services</h3>
        <p>
        We provide accurate and detailed information about the food products,
         including ingredients, allergens, nutritional information, and any specific warnings or disclaimers.
          The information, materials, products, and services on this web site
          are current at the time of writing and are subject to change. Not all
          products and services are available in all geographic areas. Your
          eligibility for particular products or services is subject to
          determination and approval of The Elites Crayfish and other Seafoods.
        </p>
        <hr />
        <h3>Shipping and Delivery</h3>
        <p>
          We ship our products to different locations and time schedule depends on your geaographical
          location. Customers within Awka are likely to receive their orders in less than 6 hours. Maximum 
          delivery time for Awka is 24 hours unless stated otherwise or a direct message will be sent to you via mail or sms.
          Delivery time within Anambara is 24 hours. Nevertheless, The Elite Crayfish and other Seafoods will always endeavour
          to give you adequate details of on the when, how and where your orders. Our delivery fees are based on your location 
          and will always be communicated to you during your payment and ordering process.
        </p>
        <hr />
        <h3>Ordering and Payments</h3>
        <p>
          Our order and payment process is explained as follows: browsing through our list of products, adding your products
          of interest to your cart. Preview your cart items and make sure you have selected your preffered products at the right quantities
          you want, click on check out and you will directed to a padge where you can fill in your personal details, click on pay and you will
          be redirected to our payment gateway where you can make payments using your debit card, bank transfer, USSD transfer and so on.
          When your payment is complete you will be directed to a confirmation page (receipt) where you can see details of your orders, save/screeshot this
          page as an evidence of payment. An email will be sent to you likewise, then wait patiently for your dellivery.
        </p>
        <hr />
        <h3>Return and Refunds</h3>
        <p>
        The Elite Crayfish and other Seafoods return and refund policy includes, spoilt products that have not been used or consumed by the customer.
        And returns or consent to return should be made to The Elite Crayfish and other Seafoods before 30 mins after you have received the product.
        The Elite Crayfish and other Seafoods will not make refunds for customers who claim to have made a wrong choice of order, so be sure of what
        you order before checking out. Any dispute or issue should be kindly forwarded to our customer services via our email or call the support line.
        </p>
        <hr />
        <h3>Website Security and Restrictions</h3>
        <p>
          As a condition to your use of Services, you agree that you will not,
          and you will not take any action intended to: (i) access data that is
          not intended for you; (ii) invade the privacy of, obtain the identity
          of, or obtain any personal information about any other user of this
          web site; (iii) probe, scan, or test the vulnerability of this web
          site or The Elite Crayfish and other Seafoods network or breach security or
          authentication measures without proper authorization; (iv) attempt to
          interfere with service to any user, host, or network or otherwise
          attempt to disrupt our bUkiness; or (v) send unsolicited mail,
          including promotions and/or advertising of products and services.
          Unauthorized use of the web site or Services, including but not
          limited to unauthorized entry into The Elite Crayfish and other Seafoods systems,
          misuse of passwords, or misuse of any information posted to a website,
          is strictly prohibited. Some portions of the website are designated for admin
          password access only. In these instances, if you do not have an authorized password, no access is permitted.
        </p>
        <hr />
        <h3>Confidentiality and Password Security</h3>
        <p>
          Certain parts of this website may be protected by passwords or require
          a login. You are responsible for maintaining the confidentiality of
          any usernames, email, passwords, security questions, and answers. All
          information available through the privileged area of the site is
          confidential. This includes password and payment transaction informations. You will use
          your best efforts to keep all this information strictly confidential, do not disclose your details to untrusted platforms
          or people.
        </p>
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
