<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_POST['student_register']) && !isset($_POST['sign_in'])) {
    header("location: register.php");
}
require_once '../dbcon.php';
if (isset($_POST['student_register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $roll = $_POST['roll'];
    $reg = $_POST['reg'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $vpassword = password_hash($password, PASSWORD_DEFAULT);

    $input_error = array();

    if (empty($fname)) {
        $input_error['fname'] = 'First Name Field is Required!';
    } else {
        $input_val['fname'] = $fname;
    }
    if (empty($lname)) {
        $input_error['lname'] = 'Last Name Field is Required!';
    } else {
        $input_val['lname'] = $lname;
    }
    if (empty($roll)) {
        $input_error['roll'] = 'Roll Number Field is Required!';
    } else {
        $input_val['roll'] = $roll;
    }
    if (empty($reg)) {
        $input_error['reg'] = 'Registration Field is Required!';
    } else {
        $input_val['reg'] = $reg;
    }
    if (empty($phone)) {
        $input_error['phone'] = 'Phone Number Field is Required!';
    } else {
        $input_val['phone'] = $phone;
    }
    if (empty($email)) {
        $input_error['email'] = 'Email Field is Required!';
    } else {
        $input_val['email'] = $email;
    }
    if (empty($username)) {
        $input_error['username'] = 'Username Field is Required!';
    } else {
        $input_val['username'] = $username;
    }
    if (empty($password)) {
        $input_error['password'] = 'Password Field is Required!';
    }


    if (count($input_error) == 0) {

        $email_check = mysqli_query($con, "SELECT * FROM `students` WHERE `email`='$email'");
        $email_check_row = mysqli_num_rows($email_check);
        if ($email_check_row == 0) {
            $username_check = mysqli_query($con, "SELECT * FROM `students` WHERE `username`='$username'");
            $username_check_row = mysqli_num_rows($username_check);
            if ($username_check_row == 0) {
                if (strlen($username) > 7) {
                    if (strlen($password) > 7) {
                        $result = mysqli_query($con, "INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`,`status`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$vpassword','$phone','0')");
                        if ($result) {
                            $_SESSION["regiser_success"] = "Data Save Successfully";
                            header("Location: register.php");
                        } else {
                            $_SESSION["regiser_err"] = "Data Not Save Successfully";
                            header("Location: register.php");
                        }
                    } else {
                        $_SESSION['password_langth'] = "Password more than 8 characters!";
                    }
                } else {
                    $_SESSION['username_langth'] = "Username more than 8 characters!";
                }
            } else {
                $_SESSION['username_exists'] = "This username is already exists!";
            }
        } else {
            $_SESSION['email_exists'] = "This emmail is already exists!";
        }

    }
    $_SESSION['input_value'] = $input_val;
    $_SESSION['error'] = $input_error;
    header("Location: register.php");
}

if(isset($_POST['sign_in'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $input_error_l = array();

    if(empty($email))
    {
        $input_error_l['email'] = "This field is required!";
    }else
    {
        $input_val_l['email'] = $email;
    }
    if(empty($password))
    {
        $input_error_l['password'] = "This password field is required!";
    }
    if(!empty($email) && !empty($password))
    {

    $result = mysqli_query($con,"SELECT * FROM `students` WHERE `email` = '$email' OR `username`='$email'");
    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_array($result);
        if(password_verify($password,$row['password']))
        {
            if($row['status'] == 1)
            {
                $_SESSION['student_login'] = $email;
                $_SESSION['student_id'] = $row['id'];
                header('Location: index.php');
                exit();
            }
            else
            {
                $_SESSION['status_err'] = "Your status inactive!";
            }
        }
        else
        {
            $_SESSION['password_err'] = "Password is incorrect!";
        }
    }
    else
    {
        $_SESSION['username_password'] = "Email or Username invalid!";
    }

    }

    $_SESSION['input_value_l'] = $input_val_l;
    $_SESSION['login_err'] = $input_error_l;
    header("location: login.php");
}


?>