

<div class="header-login-register-wrapper modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-box-wrapper">
                <div class="helendo-tabs">
                    <ul class="nav" role="tablist">
                        <li class="tab__item nav-item active">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_list_06" role="tab">Login</a>
                        </li>
                        <li class="tab__item nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab_list_07" role="tab">Register</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content content-modal-box">
                    <div class="tab-pane fade show active" id="tab_list_06" role="tabpanel">
                        <form action="#" class="account-form-box" method="POST">
                            <h6>Login your account</h6>
                            <div class="single-input">
                                <input type="text" name="email" placeholder="email">
                            </div>
                            <div class="single-input">
                                <input type="password" name="password" placeholder="Password">
                            </div>
                            <div class="checkbox-wrap mt-10">
                                <label class="label-for-checkbox inline mt-15">
                                    <input class="input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                                </label>
                                <a href="#" class="mt-10">Lost your password?</a>
                            </div>
                            <div class="button-box mt-25">
                                <button type="submit" name="submit_login" class="btn btn--full btn--black">Log in</button>
                            </div>
                            <div class="button-box mt-25">
    <button type="button" class="btn btn--full btn--black" onclick="guestCheckout()">Continue as Guest</button>
</div>

<script>
function guestCheckout() {
    window.location.href = "guest_checkout.php";
}
</script>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tab_list_07" role="tabpanel">
                        <form action="#" class="account-form-box" method="POST">
                            <h6>Register An Account</h6>
                            <div class="single-input">
                                <input type="text" name="name" placeholder="Username">
                            </div>
                            <div class="single-input">
                                <input type="text" name="email" placeholder="Email address">
                            </div>
                            <div class="single-input">
                                <input type="password" name="password" placeholder="Password">
                            </div>
                            <div class="single-input">
                                <input type="password" name="confirm_password" placeholder="Confirm Password">
                            </div>
                            <div class="button-box mt-25">
                                <button type="submit" name="submit_register" class="btn btn--full btn--black">Register</button>
                            </div>
                            
                        </form>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include_once("admin/functions.php"); 
$objStudent = new Student(); 
?>
<?php
if (isset($_POST['submit_register'])){
  $objStudent->register(); 
}
if (isset($_POST['submit_login'])){ 
    $objStudent->login(); 
}
?>
<div class="header-area header-area--default">
    <header class="header-area header_absolute header_height-90 header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 d-none d-md-block">
                    <div class="header-left-search">
                        <form action="#" class="header-search-box">
                            <input class="search-field" type="text" placeholder="Search Anything...">
                            <button class="search-icon"><i class="icon-magnifier"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="logo text-md-center">
                        <a href="index.html"><img src="user/images/logo/logo.svg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="header-right-side text-end">
                        <div class="header-right-items d-none d-md-block">
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <span><?php echo $_SESSION['name']; ?></span>
                            <?php else: ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="icon-user"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="header-right-items d-none d-md-block">
                            <a href="index.php" class="header-cart">
                                <i class="icon-heart"></i>
                                <span class="item-counter">3</span>
                            </a>
                        </div>
                        <div class="header-right-items">
                            <a href="javascript:void(0)" class="header-cart minicart-btn toolbar-btn header-icon" id="cart-link">
                                <i class="icon-bag"></i>
                                <span class="item-counter" id="cart-counter">0</span>
                            </a>
                        </div>
                        <div class="header-right-items d-block d-md-none">
                            <a href="javascript:void(0)" class="search-icon" id="search-overlay-trigger">
                                <i class="icon-magnifier"></i>
                            </a>
                        </div>
                        <div class="header-right-items">
                            <a href="javascript:void(0)" class="mobile-navigation-icon" id="mobile-menu-trigger">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

