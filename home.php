<?php
include_once './homeheader.php';
include 'mail.php';
?>

<div class="site-slider">
    <ul class="bxslider">
        <li>
            <img src="../images/slider/slide3.jpg" alt="slider image 3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-right">
<!--                                                    <div class="slider-caption">
                                                        <h2>HTML5 CSS3 Template</h2>
                                                    </div>-->
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src="../images/slider/slide2.jpg" alt="slider image 2">
            <div class="container caption-wrapper">
                <!--                    <div class="slider-caption">
                                        <h2>Using Bootstrap Framework</h2>
                                    </div>-->
            </div>
        </li>
        <li>
            <img src="../images/slider/slide1.jpg" alt="slider image 1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <!--                                               <div class="slider-caption">
                                                                                <h2>Mobile Ready Website</h2>
                                                                            </div>-->
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src="../images/slider/slide4.jpg" alt="slider image 4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <!--                            <div class="slider-caption">
                                                        <h2>Responsive Layout</h2>
                                                    </div>-->
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src="../images/slider/slide5.jpg" alt="slider image 5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <!--                            <div class="slider-caption">
                                                        <h2>Download and use it for free</h2>
                                                    </div>-->
                    </div>
                </div>
            </div>
        </li>
    </ul> <!-- /.bxslider -->
    <div class="bx-thumbnail-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="bx-pager">
                        <a data-slide-index="0" href=""><img src="../images/slider/thumb3.jpg" alt="image 3" /></a>
                        <a data-slide-index="1" href=""><img src="../images/slider/thumb2.jpg" alt="image 2" /></a>
                        <a data-slide-index="2" href=""><img src="../images/slider/thumb1.jpg" alt="image 1" /></a>
                        <a data-slide-index="3" href=""><img src="../images/slider/thumb4.jpg" alt="image 4" /></a>
                        <a data-slide-index="4" href=""><img src="../images/slider/thumb5.jpg" alt="image 5" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.site-slider -->
<br><br><br><br>
<div id="services" class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <span class="service-icon first"></span>
                </div> <!-- /.service-item -->
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <span class="service-icon second"></span>
                </div> <!-- /.service-item -->
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <span class="service-icon third"></span>
                </div> <!-- /.service-item -->
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <span class="service-icon fourth"></span>
                </div> <!-- /.service-item -->
            </div> <!-- /.col-md-3 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /#services -->

<div id="product-promotion" class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="section-title">OFFERS</h1>
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
        <style>
            .list{
                font-size: medium;
                padding-right: 120px;
            }
        </style>

        <div  class="row">
            Select a state:
            <div style="overflow: auto">
                <div style="float: left"> 
                    <ul  class="list">
                        <li><a href="state_offers.php?state=<?php print "Delhi"; ?>"> Delhi</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Punjab"; ?>">Punjab</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Haryana"; ?>">Haryana</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Uttarakhand"; ?>">Uttarakhand</a>
                    </ul>
                </div>
                <div style="float: left"> 
                    <ul  class="list" >
                        <li><a href="state_offers.php?state=<?php print "Himachal Pradesh"; ?>">Himachal Pradesh</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Rajasthan"; ?>">Rajasthan</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Uttar Pradesh"; ?>">Uttar Pradesh</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Bihar"; ?>">Bihar</a>
                    </ul>
                </div>
                <div style="float: left"> 
                    <ul class="list" > 
                        <li><a href="state_offers.php?state=<?php print "Madhya Pradesh"; ?>">Madhya Pradesh</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Gujarat"; ?>">Gujarat</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "West Bengal"; ?>">West Bengal</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Maharashtra"; ?>">Maharashtra</a>
                    </ul>
                </div>
                <div style="float: left">
                    <ul class="list" > 
                        <li><a href="state_offers.php?state=<?php print "Karnataka"; ?>">Karnataka</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Jharkhand"; ?>">Jharkhand </a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Andhra Pradesh"; ?>">Andhra Pradesh</a><br><br>
                        <li><a href="state_offers.php?state=<?php print "Tamli Nadu"; ?>">Tamil Nadu</a>
                    </ul>
                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /#product-promotion -->

<div id="products" class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="section-title">Seller Section</h1>
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="product-item">
                    <div class="item-thumb">

                        <div class="overlay">
                            <div class="overlay-inner">
                                <a href="../user/login.php" class="view-detail">LOG IN</a>
                            </div>
                        </div> <!-- /.overlay -->
                        <img src="../images/products/login.jpg" alt="">
                    </div> <!-- /.item-thumb -->
                </div> <!-- /.product-item -->
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="product-item">
                    <div class="item-thumb">

                        <div class="overlay">
                            <div class="overlay-inner">
                                <a href="registration.php" class="view-detail">REGISTRATION</a>
                            </div>
                        </div> <!-- /.overlay -->
                        <img src="../images/products/Registration.jpg" alt="">
                    </div> <!-- /.item-thumb -->

                </div> <!-- /.product-item -->
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="product-item">
                    <div class="item-thumb">

                        <div class="overlay">
                            <div class="overlay-inner">
                                <a href="../user/addOffer.php" class="view-detail">ADD OFFER</a>
                            </div>
                        </div> <!-- /.overlay -->
                        <img src="../images/products/Offer.jpg" alt="">
                    </div> <!-- /.item-thumb -->

                </div> <!-- /.product-item -->
            </div> <!-- /.col-md-3 -->

            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="item-thumb">

                            <div class="overlay">
                                <div class="overlay-inner">
                                    <a href="../user/userHome.php" class="view-detail">SELLER HOME</a>
                                </div>
                            </div> <!-- /.overlay -->
                            <img src="../images/products/selhome.jpg" alt="">
                        </div> <!-- /.item-thumb -->

                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
            <?php }
            ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /#products -->

<div id="contact" class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="section-title">Contact Us</h1>
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($message) && !empty($email)) {
            $name = $_POST['name'];
            $subject = $_POST['subject'];
            $message = $_POST['comments'];
            $email = $_POST['email'];

            $from = "admin <localoffers2014@gmail.com>";
            $to = "localoffers2014@gmail.com";

            $body = "Name:$name\n"
                    . "Subject:$subject\n"
                    . "Email Id:$email\n"
                    . "Message:$message";

            $headers = array(
                'From' => $from,
                'To' => $to,
                'Subject' => "Feedback"
            );

            $smtp = Mail::factory('smtp', array(
                        'host' => 'ssl://smtp.gmail.com',
                        'port' => '465',
                        'auth' => true,
                        'username' => 'localoffers2014@gmail.com',
                        'password' => 'localoffersdelhi'
            ));

            $mail = $smtp->send($to, $headers, $body);

            if (PEAR::isError($mail)) {
                echo("<center><p style='color:red'>*" . $mail->getMessage() . "</p></center>");
            } else {
                echo("<center><p style='color:#26b864'>*Message successfully sent!</p></center>");
            }
        }
        ?>

        <div class="row">
            <div class="col-md-offset-2 col-md-8 text-center bigger-text">
                <p>Feel free to contact us for any query, message or feedback. That will be highly appreciated.</p>
                <p>Thank You!</p>
            </div>
            <div class="col-md-6 col-sm-6">
                <div id="map">
                </div>
            </div> <!-- /.col-md-6 -->
            <div class="col-md-6 col-sm-6">
                <div class="row contact-form">
                    <form action="home.php" method="post" >
                        <fieldset class="col-md-6 col-sm-6">
                            <input id="name" type="text" name="name" placeholder="Name">
                        </fieldset>
                        <fieldset class="col-md-6 col-sm-6">
                            <input type="email" name="email" id="email" placeholder="Email">
                        </fieldset>
                        <fieldset class="col-md-12">
                            <input type="text" name="subject" id="subject" placeholder="Subject">
                        </fieldset>
                        <fieldset class="col-md-12">
                            <textarea name="comments" id="comments" placeholder="Message"></textarea>
                        </fieldset>
                        <fieldset class="col-md-12">
                            <input type="submit" name="send" value="Send Message" id="submit" class="button">
                        </fieldset>
                    </form>
                </div> <!-- /.contact-form -->
            </div> <!-- /.col-md-6 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /#products -->


<?php
include_once './footer.php';
?>

