<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/gaya.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Dancing+Script&family=Fjalla+One&family=Kavoon&family=Lemon&family=Press+Start+2P&family=Righteous&family=Russo+One&display=swap" rel="stylesheet">
    <title>Login</title>
    <link rel="icon" type="image/png" href="image/th_remove.png">
    <style>
        .center-alert {
            position: absolute;
            top: 2px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            width: 80%;
            max-width: 400px;
        }
        .title {
            font-family: 'Lemon', sans-serif;
        }
        .form-container {
            margin-top: 4em;
            width: 80%;
            max-width: 400px;
            height: 350px;
            background-color: rgba(88, 125, 189, 0.5);
            padding: 1.5em 2em;
            border-radius: 30px;
        }
        .wrap {
            margin-top: 4em;
            width: 80%;
            max-width: 400px;
            height: 350px;
            padding: 1.5em 2em;
            border-radius: 30px;
            position: relative;
        }
    </style>
</head>
<body>
    @if(session('ditolak'))
    <div class="center-alert text-center alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('ditolak') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container mt-5">
        <div class="row g-5 align-items-center justify-content-center">
            <div class="wrap">
                    <img src="image/th_remove.png" alt="not found" class="img-fluid" style="max-height: 350px;">
                <br>
                <h4 class="title text-center">Smart-Townhall</h4>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <div class="form-container">
                    <h1 class="title text-center">Login</h1>
                    <form action="{{ route('postlogin') }}" method="post">
                        @csrf
                        <input class="form-control mb-3" type="text" name="username" placeholder="username">
                        <input class="form-control mb-3" type="password" name="password" placeholder="password">
                        <button type="submit" class="btn btn-success w-100">Log in</button>
                    </form>
                    <br>
                    <br>
                    <a href="{{ route('decision') }}" style="font-family: 'Righteous'; style = margin-left:0.6em; margin-top: 0.4em;color: aliceblue; text-decoration: underline;">Back</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
