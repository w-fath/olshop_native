<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Free</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="asset/img/logo.jpeg">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        .g-recaptcha {
            transform: scale(0.75);
            transform-origin: 0 0;
        }
    </style>
</head>

<body>
    <header style="margin-top: 56px;">
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Login</h3>
                        <form action="proses_login.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LfW4yAqAAAAAGxw4g4COl0qUQv900w_9G-b5KPV"></div>

                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="asset/js/script.js"></script>
</body>

</html>