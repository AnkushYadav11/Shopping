<?php
include './db.php';

// for new data insertion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $st = $conn->prepare("insert into feedback(name,email,phone,message) values(?,?,?,?)");
    $st->bind_param('ssis', $name, $email, $phone, $message);
    if ($st->execute()) {
        $thank = "Thank you for giving your valuable feedback.";
        header('location:./contact.php#feedback');
    }
}

// TO display data
$stm = $conn->query('select * from feedback order by id desc');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-dark text-light" style="padding-top: 5rem;">


    <div class="container border border-1 rounded-5 shadow-lg p-5" style="width: 26em; text-align:center;">
        <h2 class="p-4">Feedback Page</h2>
        <form method="POST">
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="username" placeholder="username">
                <label for="username">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="phone" class="form-control" id="phone" placeholder="0123 456 789">
                <label for="phone">Phone</label>
            </div>
            <div class="form-floating mb-3">
                <textarea type="text" name="message" class="form-control" id="password" placeholder="********"></textarea>
                <label for="password">Message</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <hr>
            <p>
                <?php if (!empty($thank)) {
                    echo $thank;
                } else {
                    echo "Welcome to our website";
                }
                ?>
            </p>
        </form>
    </div>

    <div style="padding-left: 10rem; padding-right:10rem; padding-top:18px;">
        <table class="table bg-dark text-light">
            <thead>
                <h2 class="text-center p-5">Your Feedbacks</h2>
                <tr>
                    <th class="bg-dark text-light">ID</th>
                    <th class="bg-dark text-light">Name</th>
                    <th class="bg-dark text-light">Email</th>
                    <th class="bg-dark text-light">Phone</th>
                    <th class="bg-dark text-light">Message</th>
                    <th class="bg-dark text-light">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stm->fetch_assoc()) { ?>
                    <tr>
                        <form method="POST">
                            <td class="bg-dark text-light"><?= $row['id']; ?></td>
                            <td class="bg-dark text-light"><?= $row['name']; ?></td>
                            <td class="bg-dark text-light"><?= $row['email']; ?></td>
                            <td class="bg-dark text-light"><?= $row['phone']; ?></td>
                            <td class="bg-dark text-light"><?= $row['message']; ?></td>
                            <td class="bg-dark text-light">
                                <a href="delete.php?deleteid=<?= $row['id'] ?>" class="btn btn-danger" id="feedback">Delete</a>
                            </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>