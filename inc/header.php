
<div class="header">
        <div id="logo">
            <a href = "index.php">
            <img src="./img/logom2.png" alt="Logo">
            </a>
        </div><!-- End of logo -->
        <div id="links">
            <ul>
                <li><a href="#">Download App</a></li>
                <li>
                    <a>Sign Up</a>
                    <form  method="post" enctype = "multipart/form-data" autocomplete = "off">
                    <center><h3>EL-Dorado SIgnUp</h3></center>
                        <table>
                            <tr>
                                <td id = 'text'>Enter Your Name:</td>
                                <td><input type="text" name="u_name" placeholder = "Enter your full name" required></td>
                            </tr>
                            <tr>
                                <td id = 'text'>Enter Your E-mail:</td>
                                <td><input type="email" name="u_email"placeholder = "Enter your e-mail ID" required></td>
                            </tr>
                            <tr>
                                <td id = 'text'>Enter Your City:</td>
                                <td><input type="text" name="u_city"placeholder = "Enter your City" required></td>
                            </tr>
                            <!-- <tr>
                                <td id = 'text'>Enter Your Pincode:</td>
                                <td><input type="text" name="u_pin"placeholder = "Enter your pin code" required></td>
                            </tr> -->
                            <tr>
                                <td id = 'text'>Enter Your Addres:</td>
                                <td><input type="text" name="u_address"placeholder = "Enter your address" required></td>
                            </tr>
                            <tr>
                                <td id = 'text'>Select your DOB:</td>
                                <td><input type="date" name="u_dob"placeholder = "Enter DOB" required></td>
                            </tr>
                            <tr>
                                <td id = 'text'>Enter your Phone No.:</td>
                                <td><input type="text" name="u_phone"placeholder = "Enter your phone" required></td>
                            </tr>
                        </table>
                        <center>
                            <input type="submit" name = "u_signup" value="SignUp">
                        </center>
                    </form>
                </li>
                <?php user_signup(); ?>
                <li>
                    <a>Login</a>
                    <form class = "loginForm"  method="post" enctype = "multipart/form-data" autocomplete = "off">
                    <center><h3>EL-Dorado Login</h3></center>
                        <table>
                            <tr>
                                <td id = 'logText'>Enter Your E-mail:</td>
                                <td><input type="email" name="email"placeholder = "Enter your e-mail ID"></td>
                            </tr>
                            <tr>
                                <td  id = 'logText'>Enter Your Password:</td>
                                <td><input type="password" name="password"placeholder = "Enter your Passsword"></td>
                            </tr>
                        </table>
                        <center>
                            <input type="submit" name = "login" value="Login">
                            <a href="forgot.php">Forgot Password?</a>
                        </center>
                    </form>
                </li>
            </ul>
        </div><!--End of link-->
        <div id="search">
            <form action="search.php" method='GET' enctype='multipart/form-data' autocomplete = 'off'>
                <input type="text" name = 'user_search' placeholder = "search from here.....">
                <button name = "btn_search" id="btn-search">Search</button>
                <button type = "button"  id="btn-Cart"><a href="cart.php">Cart <span id = 'cart_count'><?php cart_count() ?></span></a></button>
            </form>
        </div><!--End of search-->
    </div><!-- ENd of header -->