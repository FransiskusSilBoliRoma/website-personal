<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN SISTEM</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <style>
        .col-md-6 {
            margin: 200px auto;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <!-- Awal Card -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Form Login
                    </div>
                    <div class="card-body">
                        <form method="post" action="">

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="tusername" placeholder="Masukkan Username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="tpassword" placeholder="Masukkan Password" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="blogin" class="btn btn-primary">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- akhir card -->
            </div>
        </div>
    </div>


</body>

</html>