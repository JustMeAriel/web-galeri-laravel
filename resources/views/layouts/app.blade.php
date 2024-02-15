<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Helvetica;
        }

        .img-fluid {
            max-width: 100%;
            height: 30vh; 
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        
    @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
