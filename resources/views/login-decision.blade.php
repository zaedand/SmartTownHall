<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login/register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/gaya.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Dancing+Script&family=Fjalla+One&family=Kavoon&family=Press+Start+2P&family=Righteous&family=Russo+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container" style = "padding-left:2.8em">

        <div class = "container">
        <h1 class="title" style="margin-left:11em; margin-top: 2em;">S-TOWN</h1>
        </div>

        <img src="image/th_remove.png" style="width: 150px; margin-left:28.4em" alt="image not found">
        <div class = "wrapper-decision" style="margin-left: 13em; margin-top: 2em;">

            <div class="d-grid gap-2">
                <a href="{{ route('login-user') }}" class="btn btn-info" style="font-family: 'Righteous'; color: rgb(255, 255, 255);">Login Pengguna</a> <br>
                <a href="{{ route('login') }}" class="btn btn-info" style="font-family: 'Righteous'; color: rgb(255, 255, 255);">Login Petugas</a>
                <a href="{{ route('decision') }}" style="font-family: 'Righteous'; style = margin-left:0.6em; margin-top: 0.4em;color: aliceblue; text-decoration: underline;">Back</a>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
