<?php 
    function sendPassword($email, $password, $username){
        $html = "Hello ".$username."! <br><br>Thank you for Registering on BentilZone. <br>
            Your account password is: <b>".$password.".</b> You can login now!.....<br> Enjoy your Shopping.<br><br> BentilZone.....<strong>Shopping Made Easy!!!!</strong>";
            // phpmailer
            require 'PHPMailerAutoload.php';
            require 'credential.php';
        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL;                              // SMTP username
        $mail->Password = PASS;                               // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->setFrom(EMAIL, 'BentilZone');
        $mail->addAddress($email);                               // Add a recipient

        $mail->addReplyTo(EMAIL);

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                     // Set email format to HTML

        $mail->Subject = 'BentilZone Account Password';
        $mail->Body    = $html;

        if(!$mail->send()) {
            echo "<script>Sorry your account resgistration failed. Please try again.</script>";
            echo   $mail->ErrorInfo;
        } else {
            echo "<script>alert('You have registered Successfuly. Please check your email $email for your account password')</script>";
        }
    }
    function generatePasssword($length){
        $txt = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        return substr(str_shuffle(str_repeat($txt, ceil($length/strlen($txt)))), 1, $length);
    }
    function user_signup(){
        require 'db_config.php';
        if(isset($_POST['u_signup'])){
        $formError = false;
        $u_name = strip_tags($_POST['u_name']);
        $u_name = htmlspecialchars($u_name);

        $u_email = strip_tags($_POST['u_email']);
        $u_email = htmlspecialchars($u_email);

        $u_city = strip_tags($_POST['u_city']);
        $u_city = htmlspecialchars($u_city);

        // $u_pin = strip_tags($_POST['u_pin']);
        // $u_pin = htmlspecialchars($u_pin);

        $u_address = strip_tags($_POST['u_address']);
        $u_address = htmlspecialchars($u_address);

        $u_dob = strip_tags($_POST['u_dob']);
        $u_dob = htmlspecialchars($u_dob);

        $u_phone = strip_tags($_POST['u_phone']);
        $u_phone = htmlspecialchars($u_phone);
        $today = date('y-m-d h:i:s');
        // generate password
        $u_password = generatePasssword(10);

        $password = sha1(md5($u_password));
        // inser into db
        $stmt = $con->prepare("SELECT * FROM users where email = '$u_email' ");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo "<script>alert('Email has already been used')</script>";
        }else{
            $stmt = $con->prepare( "INSERT INTO users (user_name, email, city, address, dob, phone, password, reg_date) values(:name, :email, :city, :address, :dob, :phone, :pass, :regdate)" );
            $stmt->bindParam(':name', $u_name);
            $stmt->bindParam(':email', $u_email);
            $stmt->bindParam(':city', $u_city);
            // $stmt->bindParam(':pincode', $u_pin);
            $stmt->bindParam(':address', $u_address);
            $stmt->bindParam(':dob', $u_dob);
            $stmt->bindParam(':phone', $u_phone);
            $stmt->bindParam(':pass', $password);
            $stmt->bindParam(':regdate', $today);
            if($stmt->execute()){  
                echo "<script>alert('User Registration successful')</script>";
                sendPassword($u_email,$u_password, $u_name);
                echo "<script>window.open('index.php', '_self')</script>";
            }else{
                echo "<script>alert('Sorry try again!')</script>";
            }
        }

        }
    }

    function products_by_cat(){
        require 'db_config.php';
        $stmt = $con->prepare("SELECT * FROM main_cat");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        $rows = $stmt->fetch();
        foreach ($rows as $row ) {
            $cat_id = $rows['cat_id'];

            $pro = $con->prepare("SELECT * FROM products WHERE cat_id = $cat_id ");
            $pro->setFetchMode(PDO:: FETCH_ASSOC);
            $pro->execute();
            $result = $pro->fetch();
            if($pro->rowCount()> 0){
                while($result):
                echo "<ul><h3>".$rows['category_name']."</h3>";
                echo "<li>
                <a href = 'pro_detail.php?&pro_id=".$result['pro_id']."'>
                <h4>".$result['product_name']."</h4>
                <img src = './img/products_img/".$result['img1']."' alt = 'img'>
                <h4 id = 'c_price'><small>GHC".$result['price']."</small></h4>
                <center>
                    <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$result['pro_id']."'>View</a></button>
                    <button class = 'p_btn'id = 'cart'><a href = '#'>Cart</a></button>
                    <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                </center>
                </a>
                </li>";
                echo "</ul><br clear = 'All'>";
                endwhile;
        }
        }
    }
    
    function crockery(){
        require 'db_config.php';
        $stmt = $con->prepare("SELECT * FROM main_cat WHERE cat_id = 21");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        $row = $stmt->fetch();
        $cat_id = $row['cat_id'];
        echo "<h3>".$row['category_name']."</h3>";
        $stmt = $con->prepare("SELECT * FROM products WHERE cat_id = $cat_id ");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        while($row = $stmt->fetch()):
            echo "<li>
                    <form method='POST' enctype='multipart/form-data'>
                        <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                        <h4>".$row['product_name']."</h4>
                        <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                        <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                        <center>
                            <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                            <input type = 'hidden' value = '".$row['pro_id']."' name='pro_id'>
                            <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                            <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                        </center>
                        </a>
                    </form>
                    </li>";
            echo "";
        endwhile;
    }
    function electronics(){
        require 'db_config.php';
        $stmt = $con->prepare("SELECT * FROM main_cat WHERE cat_id = 1");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        $row = $stmt->fetch();
        $cat_id = $row['cat_id'];
        echo "<h3>".$row['category_name']."</h3>";
        $stmt = $con->prepare("SELECT * FROM products WHERE cat_id = $cat_id ");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        while($row = $stmt->fetch()):
            echo "<li>
                    <form method='post' enctype='multipart/form-data'>
                        <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                        <h4>".$row['product_name']."</h4>
                        <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                        <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                        <center>
                            <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                            <input type = 'hidden' value = '".$row['pro_id']."' name='pro_id'>
                            <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                            <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                        </center>
                        </a>
                    </form>
                    </li>";
            echo "";
        endwhile;
    }
    function computers(){
        require 'db_config.php';
        $stmt = $con->prepare("SELECT * FROM main_cat WHERE cat_id = 18");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        $row = $stmt->fetch();
        $cat_id = $row['cat_id'];
        echo "<h3>".$row['category_name']."</h3>";

        $stmt = $con->prepare("SELECT * FROM products WHERE cat_id = $cat_id ");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        while($row = $stmt->fetch()):
            echo "<li>
                    <form method='POST' enctype='multipart/form-data'>
                        <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                        <h4>".$row['product_name']."</h4>
                        <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                        <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                        <center>
                            <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                            <input type = 'hidden' value = '".$row['pro_id']."' name='pro_id'>
                            <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                            <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                        </center>
                        </a>
                    </form>
                    </li>";
            echo "";
        endwhile;
    }
    function cloths(){
        require 'db_config.php';
        $stmt = $con->prepare("SELECT * FROM main_cat WHERE cat_id = 19");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        $row = $stmt->fetch();
        $cat_id = $row['cat_id'];
        echo "<h3>".$row['category_name']."</h3>";

        $stmt = $con->prepare("SELECT * FROM products WHERE cat_id = $cat_id ");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        while($row = $stmt->fetch()):
            echo "<li>
                    <form method='POST' enctype='multipart/form-data'>
                        <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                        <h4>".$row['product_name']."</h4>
                        <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                        <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                        <center>
                            <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                            <input type = 'hidden' value = '".$row['pro_id']."' name='pro_id'>
                            <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                            <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                        </center>
                        </a>
                    </form>
                    </li>";
            echo "";
        endwhile;
    }
    function gadgets(){
        require 'db_config.php';
        $stmt = $con->prepare("SELECT * FROM main_cat WHERE cat_id = 26");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        $row = $stmt->fetch();
        $cat_id = $row['cat_id'];
        echo "<h3>".$row['category_name']."</h3>";

        $stmt = $con->prepare("SELECT * FROM products WHERE cat_id = $cat_id ");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        while($row = $stmt->fetch()):
            echo "<li>
                    <form method='POST' enctype='multipart/form-data'>
                        <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                        <h4>".$row['product_name']."</h4>
                        <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                        <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                        <center>
                            <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                            <input type = 'hidden' value = '".$row['pro_id']."' name='pro_id'>
                            <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                            <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                        </center>
                        </a>
                    </form>
                    </li>";
            echo "";
        endwhile;
    }

    function pro_details(){
        require 'db_config.php';
        if(isset($_GET['pro_id'])){
            $product_id = $_GET['pro_id'];
            $stmt = $con->prepare("SELECT * FROM products where pro_id = $product_id");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            $row = $stmt->fetch();
            echo
            "
            <div id = 'pro_img'>
                <img src = './img/products_img/".$row['img1']."'>
                <ul>
                    <li><img src = './img/products_img/".$row['img1']."'></li>
                    <li><img src = './img/products_img/".$row['img2']."'></li>
                    <li><img src = './img/products_img/".$row['img3']."'></li>
                    <li><img src = './img/products_img/".$row['img4']."'></li>
                </ul>
            </div>
            <div id = 'pro_feature'>
                <h3>".$row['product_name']."</h3><hr/>
                <p>Features</p>
                <ul>
                    <li>".$row['feature1']."</li>
                    <li>".$row['feature2']."</li>
                    <li>".$row['feature3']."</li>
                    <li>".$row['feature4']."</li>
                </ul>
                <ul>
                    <li><span>Model: </span>".$row['pro_model']."</li>
                    <li><span>Warranty: </span>".$row['warranty']."</li>
                    <li><span>Date Modified: </span> ".$row['date_added']."</li>

                </ul><br clear = 'all'>
                <center>
                <h3>Selling Price: GHC".$row['price']."</h3>
                <form method = 'POST'>
                    <input type = 'hidden' value = '".$row['pro_id']."' name='pro_id'>
                    <button type = 'Submit' name = 'buy' id = 'buy'>Buy Now</button>
                    <button type = 'Submit' name = 'cart_btn'id = 'cart'><i class = \"pe-7s-cart\"></i>Add To Cart</button>
                </form>
                </center>
            </div><br clear = 'all'>
            <div id = 'sim_pro'>
            <h3>Related Products</h3>
            <ul>
            ";
            add_cart();
            $cat_id = $row['cat_id'];
            $pro_id = $row['pro_id'];
            $stmt = $con->prepare("SELECT * FROM products where pro_id <> $pro_id AND  cat_id =  $cat_id order by pro_id DESC");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch()):
                    echo 
                    "<li>
                    <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                            <img src = 'img/products_img/".$row['img1']."'>
                            <p>".$row['product_name']."</p>
                            <p><span>Price: </span>GHC".$row['price']."</p>
                        </a>
                    </li>";
                endwhile;
            }else{
                echo "<br clear = 'all'><center><h5 class = 'not_found'>Related Products appear here.....</h5></center>";
            }
            echo " </ul></div>
            ";
        }

    }

    function all_cat(){
        require 'db_config.php';
        $stmt = $con->prepare("SELECT * FROM main_cat ORDER BY category_name ASC");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        while ($row = $stmt->fetch()):
            echo  " <li><a href = 'cat_products.php?cat_id=".$row['cat_id']."'>".$row['category_name']."</a></li>";
        endwhile;
    }

    function cat_products(){
        require 'db_config.php';
        if(isset($_GET['cat_id'])){
            $cat_id = $_GET['cat_id'];
            $stmt = $con->prepare("SELECT count(*) FROM products WHERE cat_id = $cat_id ");
            $stmt->execute();
            $count = $stmt->fetchColumn();
            // Fetch category name
            $maincat = $con->prepare("SELECT * FROM main_cat WHERE cat_id = $cat_id ");
            $maincat ->setFetchMode(PDO:: FETCH_ASSOC);
            $maincat ->execute();
            $result  = $maincat->fetch();
            echo"<h3>".$result['category_name']."</h3>";
            // Check for product in category
            if($count > 0){
                $stmt = $con->prepare("SELECT * FROM products WHERE cat_id = $cat_id ");
                $stmt->setFetchMode(PDO:: FETCH_ASSOC);
                $stmt->execute();

                while($row = $stmt->fetch()):
                    echo "<li>
                            <form method='POST' enctype='multipart/form-data'>
                                <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                                <h4>".$row['product_name']."</h4>
                                <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                                <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                                <center>
                                    <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                                    <input type = 'hidden' value = '".$row['pro_id']."' name='pro_id'>
                                    <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                                    <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                                </center>
                                </a>
                            </form>
                            </li>";
                    echo "";
                endwhile;
            }else{
                echo "<br clear = 'all'><center><h5 class = 'not_found'>No Products From This Category</h5></center>";
            }
        }
    }

    function view_all_subcat(){
        require 'db_config.php';
        if(isset($_GET['cat_id'])){
            $cat_id = $_GET['cat_id'];
            $stmt = $con->prepare("SELECT * FROM sub_cat where maincat_id = $cat_id");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            echo "<h3>Sub Categories</h3>";
            if($stmt->rowCount()>0){
            while ($row = $stmt->fetch()):
                $subcat = $row['subcat_id'];
                $sub = $con->prepare("SELECT count(*) FROM products WHERE subcat_id = $subcat");
                $sub->execute();
                $count = $sub->fetchColumn();

                echo 
                " <li><a href = 'cat_products.php?subcat_id=".$row['subcat_id']."'>".$row['subcat_name']."(".$count.")</a></li>";
            endwhile;
            }else{
                echo "<center><h5 class = 'not_found'>No Sub Categories available in stores</h5></center>";
            }
        }
    }

    function subcat_products(){
        require 'db_config.php';
        if(isset($_GET['subcat_id'])){
            $subcat_id = $_GET['subcat_id'];
            // Fetch category name
            $maincat = $con->prepare("SELECT * FROM sub_cat WHERE subcat_id = $subcat_id ");
            $maincat ->setFetchMode(PDO:: FETCH_ASSOC);
            $maincat ->execute();
            $result  = $maincat->fetch();
            echo"<h3>".$result['subcat_name']."</h3>";
            // Check for product in category
                $stmt = $con->prepare("SELECT * FROM products WHERE subcat_id = $subcat_id ");
                $stmt->setFetchMode(PDO:: FETCH_ASSOC);
                $stmt->execute();
                if( $stmt->rowCount() > 0){
                while($row = $stmt->fetch()):
                    echo "<li>
                            <form method='POST' enctype='multipart/form-data'>
                                <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                                <h4>".$row['product_name']."</h4>
                                <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                                <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                                <center>
                                    <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                                    <input type = 'hidden' value = '".$row['pro_id']."' name='pro_id'>
                                    <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                                    <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                                </center>
                                </a>
                            </form>
                            </li>";
                    echo "";
                endwhile;
            }else{
                echo "<br clear = 'all'><center><h5 class = 'not_found'>No Products From This Sub Category</h5></center>";
            }
        }
    }

    function view_all_cat(){
        require 'db_config.php';
        if(isset($_GET['subcat_id'])){
            $subcat_id = $_GET['subcat_id'];
            $stmt = $con->prepare("SELECT * FROM main_cat");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            echo "<h3> Categories</h3>";
            if($stmt->rowCount() > 0){
            while ($row = $stmt->fetch()):
                $cat = $row['cat_id'];
                $main = $con->prepare("SELECT count(*) FROM products WHERE cat_id = $cat");
                $main->execute();
                $count = $main->fetchColumn();

                echo" <li><a href = 'cat_products.php?cat_id=".$row['cat_id']."'>".$row['category_name']."(".$count.")</a></li>";
            endwhile;
            }else{
                echo "<center><h5 class = 'not_found'>No Categories available in stores</h5></center>";
            }
        }
    }

    function kids(){
        require 'db_config.php';
        if(isset($_GET['kids'])){
            $stmt = $con->prepare("SELECT * FROM products where for_whom = 'kids'");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            echo "<h3>Products Related to KIDS</h3>";
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch()):
                echo "<li>
                        <form method='POST' enctype='multipart/form-data'>
                            <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                            <h4>".$row['product_name']."</h4>
                            <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                            <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                            <center>
                                <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                                <input type = 'hidden' value = '".$row['pro_id']."' name = 'pro_id '>
                                <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                                <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                            </center>
                            </a>
                        </form>
                        </li>";
                echo "";
                endwhile;
            }else{
                echo "<br clear = 'all'><center><h5 class = 'not_found'>No Products Related to Kids in Store</h5></center>";
            }
        }
    }
    function women(){
        require 'db_config.php';
        if(isset($_GET['women'])){
            $stmt = $con->prepare("SELECT * FROM products where for_whom = 'women'");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            echo "<h3>Products Related to WOMEN</h3>";
            if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()):
                echo "<li>
                        <form method='POST' enctype='multipart/form-data'>
                            <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                            <h4>".$row['product_name']."</h4>
                            <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                            <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                            <center>
                                <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                                <input type = 'hidden' value = '".$row['pro_id']."' name = 'pro_id '>
                                <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                                <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                            </center>
                            </a>
                        </form>
                        </li>";
                echo "";
            endwhile;
            }else{
                echo "<br clear = 'all'><center><h5 class = 'not_found'>No Products Related to Women in Store</h5></center>";
            }
        }
    }
    function men(){
        require 'db_config.php';
        if(isset($_GET['men'])){
            $stmt = $con->prepare("SELECT * FROM products where for_whom = 'men'");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            echo "<h3>Products Related to MEN</h3>";
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch()):
                    echo "<li>
                            <form method='POST' enctype='multipart/form-data'>
                                <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                                <h4>".$row['product_name']."</h4>
                                <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                                <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                                <center>
                                    <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                                    <input type = 'hidden' value = '".$row['pro_id']."' name = 'pro_id '>
                                    <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                                    <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                                </center>
                                </a>
                            </form>
                            </li>";
                    echo "";
                endwhile;
            }else{
                echo "<br clear = 'all'><center><h5 class = 'not_found'>No Products Related to Women in Store</h5></center>";
            }
        }
    }


    function search(){
        require 'db_config.php';
        if(isset($_GET['btn_search'])){

            $search_item = $_GET['user_search'];
            $stmt = $con->prepare("SELECT * FROM products where keyword like '%$search_item%' or product_name like '%$search_item%'");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            echo "<div id = 'bodyLeft'> <ul>
            <h3>Search Results for <i><small>'".$search_item."'</small></i></h3>";
            if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()):
                echo "<li>
                        <form method='POST' enctype='multipart/form-data'>
                            <a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>
                            <h4>".$row['product_name']."</h4>
                            <img src = './img/products_img/".$row['img1']."' alt = 'img'>
                            <h4 id = 'c_price'><small>GHC".$row['price']."</small></h4>
                            <center>
                                <button class = 'p_btn' id = 'view'><a href = 'pro_detail.php?&pro_id=".$row['pro_id']."'>View</a></button>
                                <input type = 'hidden' value = '".$row['pro_id']."' name='pro_id'>
                                <button name = 'cart_btn' class = 'p_btn'id = 'cart'>Cart</button>
                                <button class = 'p_btn'id = 'wish'><a href = '#'>Wishlist</a></button>
                            </center>
                            </a>
                        </form>
                        </li>";
                echo "";
            endwhile;
            }else{
                echo "<center><h5 class = 'not_found'>No product found <a href = 'index.php'>  Back to Products</a></h5></center>";
            }
            echo "</ul></div>";
        }
    }


    // get ip address
    function getIp(){
        $ip = $_SERVER['REMOTE_ADDR'];
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $ip;
    }

    function add_cart(){
        require 'db_config.php';
        if(isset($_POST['cart_btn'])){
            $pro_id = $_POST['pro_id'];
            $ip = getIp();
            // check for pro in cart
            $stmt = $con->prepare("SELECT * FROM cart where pro_id = $pro_id AND ip_address = '$ip'");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            if(!$stmt->rowCount() > 0){
                $stmt = $con->prepare( "INSERT INTO cart (pro_id, qty, ip_address) values('$pro_id', 1, '$ip')" );
                if($stmt->execute()){  
                    echo "<script>window.open('index.php', '_self')</script>";
                }else{
                    echo "<script>alert('Sorry try again')</script>";
                }
            }else{
                echo "<script>alert('Product already in cart')</script>";
            }
        }
    }
    function cart_count(){
        require 'db_config.php';
        $ip = getIp();
        $stmt = $con->prepare("SELECT * FROM cart WHERE ip_address = '$ip'");
        $stmt->execute();
        $count_cart = $stmt->rowCount();
        echo $count_cart;
    }
    function qty_increase(){
        if(isset($_GET['increase_qty'])){
            require 'db_config.php';
            $cart_id = $_GET['cart_id'];
            $stmt = $con->prepare("SELECT * FROM cart WHERE cart_id = $cart_id");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            $row = $stmt->fetch();
            $qty = $row['qty'];
            $add = $con->prepare("UPDATE cart set qty = ($qty + 1) where cart_id = $cart_id");
            if($add->execute()){
                echo "<script>window.open('cart.php', '_self')</script>";
            }
        }
    }
    function qty_decrease(){
        if(isset($_GET['decrease_qty'])){
            require 'db_config.php';
            $cart_id = $_GET['cart_id'];
            $stmt = $con->prepare("SELECT * FROM cart WHERE cart_id = $cart_id");
            $stmt->setFetchMode(PDO:: FETCH_ASSOC);
            $stmt->execute();
            $row = $stmt->fetch();
            $qty = $row['qty'];
            if($qty > 1){
                $subtract = $con->prepare("UPDATE cart set qty = ($qty - 1) where cart_id = $cart_id");
                if($subtract->execute()){
                    echo "<script>window.open('cart.php', '_self')</script>";
                }
            }
        }
    }
    function cart_details(){
        require 'db_config.php';
        $ip = getIp();
        $stmt = $con->prepare("SELECT * FROM cart WHERE ip_address = '$ip'");
        $stmt->setFetchMode(PDO:: FETCH_ASSOC);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo "
            <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price(GHC)</th>
            <th>Sub Total(GHC)</th>
            <th>Status</th>
            <th>Remove</th>
            </tr>
            ";
            $net_total = 0;
            while($row = $stmt->fetch()):
                $pro_id = $row['pro_id'];
                $cart_pro = $con->prepare("SELECT * FROM products WHERE pro_id = '$pro_id'");
                $cart_pro->setFetchMode(PDO:: FETCH_ASSOC);
                $cart_pro->execute();
                $cart_pro= $cart_pro->fetch();
                echo "<tr>
                    <td><a href = 'pro_detail.php?&pro_id=".$cart_pro['pro_id']."'><img src = './img/products_img/".$cart_pro['img1']."'></a></td>
                    <td>".$cart_pro['product_name']."</td>
                    <td>
                    <a id = 'sub' href = 'cart.php?decrease_qty&cart_id=".$row['cart_id']."'>-</a>
                    ".$row['qty']."
                    <a id = 'add' href = 'cart.php?increase_qty&cart_id=".$row['cart_id']."'>+</a>
                    </td>
                    <td>".$cart_pro['price']."</td>
                    <td>".$cart_pro['price'] * $row['qty']."</td>
                    <td>Processing</td>
                    <td><a id = 'remove' href = 'cart.php?remove&cart_id=".$row['cart_id']."'>&times</a></td>
                </tr>";
                $net_total = $net_total + ($cart_pro['price'] * $row['qty']);
            endwhile;
            echo "<tr>
                    <td><button id = 'shopping'><a href = 'index.php'>Continue Shopping</a></button></td>
                    <td><button id = 'checkOut'>Check Out</button></td>
                    <td></td>
                    <td></td>
                    <td><b><span>Net Total: </span>GHC$net_total</b></td>
                    <td></td>
                    <td></td>
                </tr>";
        }else{
            echo "<center><h5 class = 'not_found'>No Product in your cart now.<a href = 'index.php'> <br>Continue Shopping</a></h5></center>";
        }
        qty_decrease();
        qty_increase();
    }
    function delete_cart(){
        require 'db_config.php';
        if(isset($_POST['1'])){
            $cart_id = $_GET['cart_id'];
            $stmt = $con->prepare("DELETE FROM cart WHERE cart_id = $cart_id");
            if( $stmt->execute()){
                echo "<script>window.open('cart.php', '_self')</script>";
            }
        }elseif(isset($_POST['0'])){
            echo "<script>window.open('cart.php', '_self')</script>";
        }
    }
?>