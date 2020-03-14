<?php
if(!isset($_SESSION))
    session_start();
?>
<nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-lg fixed-top" id="mainNav"
     style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="container"><a class="navbar-brand js-scroll-trigger" href="index.php">STORE&nbsp;<i class="fa fa-star"></i></a>
        <div style="max-width: none;"><a class="navbar-brand js-scroll-trigger" href="#"
                                         style="margin-left: 10px;float: left;margin-top: 8px;">CART&nbsp;<i
                    class="fa fa-shopping-cart" style="float: right;"></i></a>
            <div class="dropdown show" style="float: right;margin-top: 15px;"><a class="dropdown-toggle"
                                                                                 data-toggle="dropdown"
                                                                                 aria-expanded="true" href="#"><i
                        class="fa fa-bars"></i> </a>
                <div class="dropdown-menu dropdown-menu-left" role="menu"
                     style="min-width: -webkit-max-content;right: 0;left: auto;padding-left: 10px;padding-right: 10px;background-color: rgba(125, 125, 125, 0.3);">
                    <p style="margin-left: 10px;margin-top:30px;color: white;">Welcome <?php echo $_SESSION["user_name"]?><hr style="background-color: white"></p>
                    <a class="dropdown-item text-info" role="presentation" href="Order_History.php">ORDER HISTORY</a><a
                        class="dropdown-item text-info" role="presentation" href="php/session_destroy.php">LOGOUT</a></div>
            </div>
        </div>
    </div>
</nav>