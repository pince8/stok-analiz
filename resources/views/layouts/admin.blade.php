<!DOCTYPE html>
<html>
<head>

    <title>Stok Yönetim Paneli</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <style>

        body{
            background:#f5f6fa;
        }

        .sidebar{
            height:100vh;
            background:#212529;
            color:white;
            padding:20px;
        }

        .sidebar a{
            color:white;
            display:block;
            padding:10px;
            text-decoration:none;
        }

        .sidebar a:hover{
            background:#343a40;
            border-radius:5px;
        }

    </style>

</head>

<body>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-2 sidebar">

            <h4>Stok Panel</h4>

            <a href="{{ route('dashboard') }}">Dashboard</a>

            <a href="{{ route('products.index') }}">Ürünler</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger mt-3 btn-sm">Çıkış</button>
            </form>

        </div>


        <div class="col-md-10 p-4">

            @yield('content')

        </div>

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('scripts')

</body>
</html>
