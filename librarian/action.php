<?php
if(!isset($_SESSION))
{
    session_start();
}
require_once '../dbcon.php';
if(isset($_POST['librarian_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $input_error_librarian = array();

    if(empty($email))
    {
        $input_error_librarian['email'] = "This field is required!";
    }else
    {
        $input_val_librarian['email'] = $email;
    }
    if(empty($password))
    {
        $input_error_librarian['password'] = "This password field is required!";
    }

    if(!empty($email) && !empty($password))
    {

        $result = mysqli_query($con,"SELECT * FROM `libraian` WHERE `email` = '$email' OR `username`='$email'");

        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_array($result);
            if($row['password'] == $password)
            {
                $_SESSION['libraian_login'] = $email;
                $_SESSION['libraian_usernaem'] = $row['username'];
                header("location: index.php");
                exit();
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
    $_SESSION['input_value_librarian'] = $input_val_librarian;
    $_SESSION['login_err_librarian'] = $input_error_librarian;
    header("location: login.php");
}
if(isset($_POST['save_book']))
{
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $libraian_usernaem = $_SESSION['libraian_usernaem'];

    $image = explode('.',$_FILES['book_image']['name']);
    $image_ex = end($image);
    $photo = date('Ymdhis.').$image_ex;

    $input_librarian = array();
    if(empty($book_name))
    {
        $input_librarian['book_name'] = "Book name field is required!";
    }else
    {
        $input_librarian_value['book_name'] = $book_name;
    }
    if(empty($book_author_name))
    {
        $input_librarian['book_author_name'] = "Book author name field is required!";
    }else
    {
        $input_librarian_value['book_author_name'] = $book_author_name;
    }
    if(empty($book_publication_name))
    {
        $input_librarian['book_publication_name'] = "Book publication name field is required!";
    }else
    {
        $input_librarian_value['book_publication_name'] = $book_publication_name;
    }
    if(empty($book_purchase_date))
    {
        $input_librarian['book_purchase_date'] = "Book purchase date field is required!";
    }else
    {
        $input_librarian_value['book_purchase_date'] = $book_purchase_date;
    }
    if(empty($book_price))
    {
        $input_librarian['book_price'] = "Book price field is required!";
    }else
    {
        $input_librarian_value['book_price'] = $book_price;
    }
    if(empty($book_qty))
    {
        $input_librarian['book_qty'] = "Book qty field is required!";
    }else
    {
        $input_librarian_value['book_qty'] = $book_qty;
    }
    if(empty($available_qty))
    {
        $input_librarian['available_qty'] = "Available qty field is required!";
    }else
    {
        $input_librarian_value['available_qty'] = $available_qty;
    }
    if(empty($_FILES['book_image']['name']))
    {
        $input_librarian['book_image'] = "Book image field is required!";
    }

    if(!empty($_FILES['book_image']['name']) && !empty($book_name) && !empty($book_author_name) && !empty($book_publication_name) && !empty($book_purchase_date) && !empty($book_price) && !empty($book_qty) && !empty($available_qty) && !empty($libraian_usernaem)  )
    {

    $result =  mysqli_query($con, "INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `libraian_usernaem`) VALUES ('$book_name','$photo','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$libraian_usernaem')");
    if($result)
    {
        move_uploaded_file($_FILES['book_image']['tmp_name'],'../img/books/'.$photo);
        $_SESSION['add_success'] = "Book Add Successfully!";
        header("location: add_book.php");
    }
    else
    {
        $_SESSION['add_error'] = "Book Not Insert!";
        header("location: add_book.php");
    }

    }

    $_SESSION['libraian_value'] = $input_librarian_value;
    $_SESSION['input_err_librarian'] = $input_librarian;
    header("location: add_book.php");
}

if(isset($_POST['book_update']))
{
    $id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];

    $image = explode('.',$_FILES['book_image']['name']);
    $image_ex = end($image);
    $photo = date('Ymdhis.').$image_ex;
    if(empty($_FILES['book_image']['name']))
    {
        $result = mysqli_query($con,"UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty' WHERE `id`='$id'");
    }
    else
    {
        $result = mysqli_query($con,"UPDATE `books` SET `book_name`='$book_name',`book_image`='$photo',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty' WHERE `id`='$id'");
    }
    if($result)
    {
        move_uploaded_file($_FILES['book_image']['tmp_name'],'../img/books/'.$photo);
        header("location: manage_books.php");
    }
}
if(isset($_POST['issue_book']))
{
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $book_issue_date = $_POST['book_issue_date'];
    $result = mysqli_query($con,"INSERT INTO `issue_books`(`student_id`, `book_id`, `book_issue_date`) VALUES ('$student_id','$book_id','$book_issue_date')");
    if($result)
    {
        mysqli_query($con,"UPDATE `books` SET `available_qty`=`available_qty`-1 WHERE `id`='$book_id'");
        $_SESSION['issue_sucess'] = "Book Issue Successfully!";
        header("Location: issue_book.php");
    }
    else
    {
        $_SESSION['issue_error'] = "Book not issue!";
        header("Location: issue_book.php");
    }
}
if(isset($_GET['id']))
{
    $id = base64_decode($_GET['id']);
    $book_id = base64_decode($_GET['bookid']);
    $date = date('d-m-Y');
    $result = mysqli_query($con,"UPDATE `issue_books` SET `book_return_date`='$date'  WHERE `id`='$id'");
    if($result)
    {
        mysqli_query($con,"UPDATE `books` SET `available_qty`=`available_qty`+1 WHERE `id`='$book_id'");
        $_SESSION['return_success'] = "Book Return Successfully!";
        header("location: return_book.php");
    }
}
?>