<?php
//require_once 'action.php';
if(!isset($_SESSION))
{
    session_start();
}
function storevalues($name) {
    if(isset($_SESSION['input_value'][$name]))
    {
        return $_SESSION['input_value'][$name];
    }
}
if(isset($_SESSION['student_login']))
{
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Register</title>
    <link rel="stylesheet" href="../assect/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assect/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assect/vendor/animate.css/animate.css">
    <link rel="stylesheet" href="../assect/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <div class="page-body animated slideInDown">
        <div class="logo">
            <h1 class="text-center">REGISTER</h1>

            <?php if(isset($_SESSION['regiser_success'])) { ?>
                <div class="alert alert-success alert-dismissible text-center" role="alert">
                    <?php echo $_SESSION['regiser_success']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                unset($_SESSION['input_value']);
                unset($_SESSION['regiser_success']); } ?>

            <?php if(isset($_SESSION['regiser_err'])) { ?>
                <div class="alert alert-warning alert-dismissible text-center" role="alert">
                    <?php echo $_SESSION['regiser_err']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($_SESSION['regiser_err']); } ?>

        </div>
        <div class="box">
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form action="action.php" method="POST">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?= storevalues('fname') ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($_SESSION['error']['fname'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['error']['fname']; ?></div>
                            <?php } ?>
                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?= storevalues('lname') ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($_SESSION['error']['lname'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['error']['lname']; ?></div>
                            <?php } ?>
                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" placeholder="Roll" name="roll" value="<?= storevalues('roll') ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($_SESSION['error']['roll'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['error']['roll']; ?></div>
                            <?php } ?>
                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" placeholder="Reg" name="reg" value="<?= storevalues('reg') ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($_SESSION['error']['reg'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['error']['reg']; ?></div>
                            <?php } ?>
                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" placeholder="01**********" name="phone" value="<?= storevalues('phone'); ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($_SESSION['error']['phone'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['error']['phone']; ?></div>
                            <?php } ?>
                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= storevalues('email'); ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($_SESSION['error']['email'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['error']['email']; ?></div>
                            <?php } ?>
                            <?php if(isset($_SESSION['email_exists'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['email_exists']; ?></div>
                            <?php unset($_SESSION['email_exists']); } ?>
                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= storevalues('username'); ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($_SESSION['error']['username'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['error']['username']; ?></div>
                            <?php } ?>
                            <?php if(isset($_SESSION['username_exists'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['username_exists']; ?></div>
                            <?php unset($_SESSION['username_exists']); } ?>
                            <?php if(isset($_SESSION['username_langth'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['username_langth']; ?></div>
                            <?php unset($_SESSION['username_langth']); } ?>
                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($_SESSION['error']['password'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['error']['password']; ?></div>
                            <?php } ?>
                            <?php if(isset($_SESSION['password_langth'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['password_langth']; ?></div>
                            <?php unset($_SESSION['password_langth']); } ?>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="student_register" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="login.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assect/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assect/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assect/vendor/nano-scroller/nano-scroller.js"></script>
<script src="../assect/javascripts/template-script.min.js"></script>
<script src="../assect/javascripts/template-init.min.js"></script>
</body>
</html>
<?php
unset($_SESSION['error']);
?>