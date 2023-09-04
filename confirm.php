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
  <body class="body">

    <!-- HEADER SECTION  -->
    <header>
        <nav class="navbar" id="navbar">
            <a href="index.php">
                <img class="logo" src="images/logo.png" alt="" />
            </a>
            <li>
                <a href="index.php">HOME</a>
            </li>
        </nav>
    </header>

    <!-- SCREENSHOT BUTTON -->
    <button id="screenshot" class="screenshot"><i class='bx bx-save'></i>Save Receipt</button>

    <?php
      include 'include/conn.php';
      $ref = $_GET['reference'];
      $url = "https://api.paystack.co/transaction/verify/$ref";
      if ($ref = "") {
          header('Location: cart.php');
      } else {
          $curl = curl_init();
        
          curl_setopt_array($curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                  "Authorization: Bearer sk_live_3ac6959ac98a93252fa5f243a0c53486d0e3509a",
                  "Cache-Control: no-cache",
              ),
          ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
      
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          $result = json_decode($response);
          if ($result->data->status == 'success') {
            $date = $result->data->created_at;
            #collect items needed for database
            $email = $result->data->metadata->email;
            $price = $result->data->metadata->price;
            $name = $result->data->metadata->name;
            $phone = $result->data->metadata->phone;
            $address = $result->data->metadata->address;
            $products_info = $result->data->metadata->products_info;
            $orderNo = $result->data->metadata->order_No;
            $stat = "pending";
            
            #SPLIT PRODUCTS INFO AND RETURN AN ARRAY OF PRODUCTS
            $lists = explode(",", $products_info);
            $sold = "yes";
            for($x =0; $x < sizeof($lists); $x++) {
                //update products
                $sqlupdate = $conn->query("UPDATE products SET sold='$sold' WHERE product_id='$lists[$x]'");
            }
            
            $resulta = "";
            for($x =0; $x < sizeof($lists); $x++) {
                //DISPLAY PRODUCTS
                $sql = $conn->query("SELECT * FROM products WHERE product_id='$lists[$x]'");
                while ($datat = $sql->fetch_array()) {
                    $resulta .= "
                        <div class='sold'>
                            <div class='image'>
                                <img src='". $datat['product_image']. "' alt='' />
                            </div>
                            <div class='name'>
                                <p>". $datat['product_name']. "</p>
                                <small>". $datat['product_id']. "</small>
                                <small>". $datat['price']. "</small>
                            </div>
                        </div>
                    ";
                }
            }
            
            # Insert  all data into Database
            $sql = "INSERT INTO orders (order_number, fullname, email, address, phone, product_details, date, amount, status) 
            VALUES ('$orderNo', '$name', '$email', '$address', '$phone', '$products_info', '$date', '$price', '$stat')";
            $connt = mysqli_query($conn, $sql);
            if ($connt) {
              echo "
                <div class='confirm'>
                    <div class='mark'>
                        <i class='bx bx-check'></i>
                    </div>
                    <p>YOUR ORDER HAS BEEN CONFIRMED</p>
                    <div class='name'>
                        <h5>Hello $name,</h5>
                        <small>Your order has been confirmed and will be shipped shortly.</small>
                    </div>

                    <div class='det'>
                        <div class='part'>
                            <h5>Order Date</h5>
                            <small>$date</small>
                        </div>
                        <div class='part'>
                            <h5>Order No</h5>
                            <small>$orderNo</small>
                        </div>
                        <div class='part'>
                            <h5>Product Id</h5>
                            <small>$products_info</small>
                        </div>
                        <div class='part'>
                            <h5>Shipping Address</h5>
                            <small>$address</small>
                        </div>
                    </div>

                    <div class='product'>
                        $resulta
                    </div>

                    <div class='receipt'>
                        <hr>
                        <div class='col'>
                            <p>Delivery Fee</p>
                            <small>#0.00</small>
                        </div>
                        <div class='col'>
                            <p>Total</p>
                            <small>#$price</small>
                        </div>
                    </div>

                    <div class='regards'>
                        <small>We'll be sending a shipping confirmation email when the item has<br> been shipped successfully</small>
                        <h5>Thank you for shopping with us.</h5>
                        <p>THE ELITE CRAYFISH AND OTHER SEAFOODS</p>
                    </div>

                </div>
              ";
            } else {
              echo "problem with your code";
            }
          }else {
            echo 'Payment can not be processed, try again!';
          }
        }
      }

    ?>

    <!-- FOOTER SECTION -->
    <!-- <?php include_once 'include/footer.php'?> -->

    <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
      //CONRIRM PAGE JS SCRIPT
      document.getElementById("screenshot").addEventListener("click", function () {
        console.log("clicked");
        html2canvas(document.querySelector(".body"), {
          onrendered: function (canvas) {
            // document.body.appendChild(canvas);
            Canvas2Image.saveAsPNG(canvas);
          },
        });
      });
    </script>
  </body>
</html>