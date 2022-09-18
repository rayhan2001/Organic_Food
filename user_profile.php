<?php
session_start();
include 'admin/class/adminBack.php';
$obj = new adminBack();
$ctg = $obj->p_display_category();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($ctg)) {
    $ctgDatas[] = $data;
}
if (isset($_POST['user_login_btn'])) {
    $msg = $obj->user_login($_POST);
}
$userid = $_SESSION['user_id'];
$username = $_SESSION['userName'];
if ($userid == null ) {
    header('location: user_login.php');
}
if (isset($_GET['logoutuser'])) {
    if ($_GET['logoutuser']=logout) {
        $obj->userLogout();
    }
}
?>

<?php include 'includes/head.php'; ?>

<body class="biolife-body">

    <?php include 'includes/preloader.php'; ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
        <?php include 'includes/header_top.php'; ?>
        <?php include 'includes/header_middle.php'; ?>
        <?php include 'includes/header_bottom.php'; ?>
    </header>

    <!-- Page Contain -->
    <div class="page-contain">
        <h2 class="text-center">User Profile Page</h2>
        <div class="container">
            <div class="user_info">
                <div class="user_details">
                    <h3>Hellow <?php if (isset($username)) {
                        echo $username;
                    }?></h3>
                    <a href="?logoutuser=logout">Logout</a>
                </div>
                <div class="history">
                    <div class="shopping-cart-container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h3 class="box-title">Order History</h3>
                                <form class="shopping-cart-form" action="#" method="post">
                                    <table class="shop_table cart-form">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product Name</th>
                                                <th class="product-price">Total Paid</th>
                                                <th class="product-subtotal">Order Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="product-thumbnail" data-title="Product Name">
                                                    <a class="prd-thumb" href="#">
                                                        <figure><img width="113" height="113" src="assets/images/shippingcart/pr-02.jpg" alt="shipping cart"></figure>
                                                    </a>
                                                    <a class="prd-name" href="#">National Fresh Fruit</a>
                                                </td>
                                                <td class="product-price" data-title="Price">
                                                    <div class="price price-contain">
                                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Total">
                                                    Pending
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <?php include 'includes/footer.php'; ?>

        <!--Footer For Mobile-->
        <?php include 'includes/mobile_footer.php'; ?>

        <?php include 'includes/mobile_block-global.php'; ?>
        <!-- Scroll Top Button -->
        <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>
        <?php include 'includes/scripts.php'; ?>