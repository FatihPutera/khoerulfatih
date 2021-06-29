<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatih Putera</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link" href="/">Home</a>
            <a class="nav-item nav-link" href="/siswa">Siswa</a>
            <a class="nav-item nav-link" href="/buku">Buku</a>
            <a class="nav-item nav-link" href="/pinjam">Peminjaman</a>
            </div>
        </div>
    </nav>
    <br><br><br>
        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->
    <br><br><br>
        <!-- footer content -->
        <div class="p-3 mb-2 bg-primary text-white">
        <center>
            <h4> Copyright ©FatihPutera2021 </h6>
        </center>
        </div>
        
        
        <!-- /footer content -->
</body>
</html>
        