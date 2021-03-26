<?php
// register function for admins
include ('security.php');
if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['confirmpassword'];
    $email_query = "SELECT * FROM admins WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if (mysqli_num_rows($email_query_run) > 0) {
        $_SESSION['status'] = "Email is already in use";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
        echo '<script>alert("1");</script>';
    } else {
        if ($password === $conpassword) {
            $query = "INSERT INTO admins (username,email,password) VALUES ('$email','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                // echo "Saved";
                $_SESSION['status'] = "User profile has been added";
                $_SESSION['status_code'] = "success";
                echo '<script>alert("2");</script>';
                header('Location: admin-users.php');
            } else {
                $_SESSION['status'] = "User profile has not been added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
                echo '<script>alert("3");</script>';
            }
        } else {
            $_SESSION['status'] = "Passwords Do Not Match";
            $_SESSION['status_code'] = "warning";
            echo '<script>alert("4");</script>';
            header('Location: register.php');
        }
    }
}
//login for admin page
if (isset($_POST['login_btn'])) {
    $email_login = $_POST['emaill'];
    $password_login = $_POST['password'];
    $query = "SELECT * FROM admins WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);
    if (mysqli_fetch_array($query_run)) {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    } else {
        $_SESSION['status'] = "Check your login details";
        header('Location: login.php');
    }
}
//delete user on admin dection
if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM admins WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        sleep(4);
        $_SESSION['success'] = "Admin had been deleted. ";
        header('Location: admin-users.php');
    } else {
        $_SESSION['status'] = "Admin was not deleted";
        header('Location: admin-users.php');
    }
}
//delete button for user section
if (isset($_POST['delete_btnu'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM basic_user WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        sleep(4);
        $_SESSION['success'] = "Admin had been deleted. ";
        header('Location: admin-users.php');
    } else {
        $_SESSION['status'] = "Admin was not deleted";
        header('Location: admin-users.php');
    }
}
//update button for admin section
if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $query = "UPDATE admins SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['status'] = "Profile has been updated";
        $_SESSION['status_code'] = "success";
        header('Location: admin-users.php');
    } else {
        $_SESSION['status'] = "Profile was not updated";
        $_SESSION['status_code'] = "error";
        header('Location: admin-users.php');
    }
}
//update button for user
if (isset($_POST['updatebtnu'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $query = "UPDATE basic_user SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['status'] = "Profile has been updated";
        $_SESSION['status_code'] = "success";
        header('Location: admin-users.php');
    } else {
        $_SESSION['status'] = "Profile was not updated";
        $_SESSION['status_code'] = "error";
        header('Location: admin-users.php');
    }
}
//add information to dark table
if (isset($_POST['update_dark'])) {
    $id = $_POST['edit_id'];
    $dark = $_POST['edit_dark'];
    $query = "UPDATE admins SET dark='$dark' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['status'] = "Colour mode has been changed";
        $_SESSION['status_code'] = "success";
        echo '<script type="text/javascript">', 'window.history.back();', '</script>';
    } else {
        $_SESSION['status'] = "Colour mode has not been changed";
        $_SESSION['status_code'] = "error";
        echo '<script type="text/javascript">', 'window.history.back();', '</script>';
    }
}
?>



