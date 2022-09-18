<?php include 'admin/class/adminBack.php';
session_start();
$obj = new adminBack();
$ctg = $obj->p_display_category();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($ctg)) {
    $ctgDatas[] = $data;
}
if (isset($_POST['user_login_btn'])) {
    $msg = $obj->user_login($_POST);
}
if (isset($_SESSION['user_id'])) {
    $userid = $_SESSION['user_id'];
    if ($userid) {
        header('location: user_profile.php');
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

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">
                <h2 class="text-center">Login Now</h2>
                <?php if (isset($msg)) {
                    echo $msg;
                }?>
                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="user_email">Email Address:<span class="requite">*</span></label>
                                    <input type="email" id="fid-name" name="user_email" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="user_pass">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="user_pass" value="" class="txt-input">
                                </p>
                                <input class="btn btn-submit btn-bold" style="padding: 10px 25px;" type="submit" value="sign in" name="user_login_btn">
                                <a href="user_pass_recover.php" class="link-to-help">Forgot your password</a>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">New Customer?</h4>
                                <p class="sub-title">Create an account with us and you’ll be able to:</p>
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                <a href="user_register.php" class="btn btn-bold">Create an account</a>
                            </div>
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