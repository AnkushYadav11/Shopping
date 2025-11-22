<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Register Here</title>
</head>

<body class="bg-dark text-light" style="padding-top: 2em;">

    <div class="container border border-1 rounded-5 p-5 shadow-lg" style="width: 26em; text-align:center;">
        <h1 class="p-4">Register page</h1>
        <form>
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="username" placeholder="username">
                <label for="username">UserName</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="phone" class="form-control" id="phone" placeholder="0123 456 789">
                <label for="phone">Phone</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="pass" class="form-control" id="password" placeholder="********">
                <label for="password">password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="copass" class="form-control" id="copass" placeholder="********">
                <label for="copass">Re-enter password</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <hr>
            <a href="../index.php">Already a user?</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>