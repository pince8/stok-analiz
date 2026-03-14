<!DOCTYPE html>
<html>
<head>

    <title>Stok Paneli Giriş</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f2f4f7;
        }

        .login-card{
            margin-top:120px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card shadow login-card">

                <div class="card-body">

                    @yield('content')
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
