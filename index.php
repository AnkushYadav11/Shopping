<?php
include './db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['uname'];
    $pass = $_POST['pass'];

    $st = $conn->prepare('select uname,password from user where uname=?');
    $st->bind_param('s', $name);
    $st->execute();
    $st->store_result();

    $st->bind_result($u_name, $password);

    if ($st->fetch() && password_verify($pass, $password)) {
        // header('location:./home.php');
        $_SESSION['name'] = $name;
        echo "Welcome back";
    } else if ($name != $u_name) {
        header('location:./register.php');
    } else {
        $misspass = "Wrong Password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-dark text-light" style="padding-top: 8em;">
    <div class="container border border-1 rounded-5 p-5 shadow-lg" style="width: 22em; text-align:center;">
        <form method="POST">
            <h1 class="p-4">Login</h1>
            <div class="form-floating mb-3">
                <input type="text" name="uname" class="form-control" id="username" placeholder="username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>

            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            <hr>
            <a href="./register.php">New here.?</a>
            <p>
                <?php echo (!empty($misspass)) ? $misspass : "Welcome"; ?>
            </p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>