<?php
if(!isset($_SESSION))
{
    session_start();
}
function storelgoinvalue($name)
{
    if(isset($_SESSION['input_value_librarian'][$name]))
    {
        return $_SESSION['input_value_librarian'][$name];
    }
}
if(isset($_SESSION['libraian_login']))
{
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login</title>
    <link rel="stylesheet" href="../assect/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assect/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assect/vendor/animate.css/animate.css">
    <link rel="stylesheet" href="../assect/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <div class="page-body animated slideInDown">
        <div class="logo">
            <h1 class="text-center">LMS</h1>
            <?php if(isset($_SESSION['username_password'])) { ?>
                <div class="alert alert-warning alert-dismissible text-center" role="alert">
                    <?php echo $_SESSION['username_password']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($_SESSION['username_password']); } ?>

            <?php if(isset($_SESSION['password_err'])) { ?>
                <div class="alert alert-warning alert-dismissible text-center" role="alert">
                    <?php echo $_SESSION['password_err']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($_SESSION['password_err']); } ?>

        </div>
        <div class="box">
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="action.php">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="email" placeholder="Email or Username" value="<?= storelgoinvalue('email') ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php if(isset($_SESSION['login_err_librarian']['email'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['login_err_librarian']['email']; ?></div>
                            <?php } ?>

                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php if(isset($_SESSION['login_err_librarian']['password'])) { ?>
                                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['login_err_librarian']['password']; ?></div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sing in" class="btn btn-primary btn-block" name="librarian_login">
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
unset($_SESSION['login_err']);
?>
