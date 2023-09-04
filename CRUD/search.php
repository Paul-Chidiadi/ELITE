<?php
    include '../include/conn.php';

    #PHP SEARCH USERLIST SECTION
    if (isset($_POST['searchTerm'])) {
        $searchTerm = $conn->real_escape_string($_POST['searchTerm']);
        $sql = $conn->query("SELECT * FROM products WHERE product_name LIKE '%{$searchTerm}%'");
        $result = "";
        if ($sql-> num_rows > 0) {
            while ($data = $sql->fetch_array()) {
                $result .= "
                    <div class='set'>
                        <div class='image'>
                            <img src='". $data['product_image']. "' alt='' />
                            <a href='#'>". $data['stock']. "</a>
                        </div>
                        <div class='name'>
                            <p>". $data['product_name']. "</p>
                            <img src='images/love.png' alt='' />
                            <i class='bx bxs-heart'></i>
                        </div>
                        <small>NGN". $data['price']. "</small>
                        <section>
                            <a href='add.php?id=". $data['product_id']. "' target='_blank' rel='noopener noreferrer'>BUY NOW</a>
                        </section>
                    </div>
                ";
            }
        }else {
            $result .= "Search not found!";
        }
        exit($result);
    }


?>