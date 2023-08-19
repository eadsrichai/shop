<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form action="chklogin.php" method="GET">
            <div class="">
                <div class="mt-5 col-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="textbox" class="form-control" name="username" id="username" >
                </div>
                <div class="mb-3 col-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" >
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="login"  value="Login" />
                </div>
            </div>
        </form>
    </div>
</body>
</html>