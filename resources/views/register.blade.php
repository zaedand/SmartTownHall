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
    <title>Register</title>
</head>
<body>

    <div class="container" style="padding-top: 0.3em; padding-left:0;">
        <div class="row align-items-start">
        <div class="col" style="margin-top:2em; margin-left:8em; margin-bottom:10em">
        <img src="{{asset('image/image/th_remove.png')}}" alt="" style="height: 350px;">

<br>
<h4 class="title" style="margin-left:3.2em">Atau daftar dengan</h4>
<br>
            <i><img style = "width: 150 px ;margin-left:5.5em; padding-top:1.5em;"src="{{asset('image/image/devicon_google.png')}}" alt=""></i>
            <i><img style = "width: 150 px; margin-left:5.6em; padding-top:1.3em"src="{{asset('image/image/logos_facebook.png')}}"alt="" ></i>
    </div>
    <div class="col" style="margin-top:4em">

        <div class="wrapper">
            <h1 class="title" style="font-family: 'lemon';">Register</h1>
            <form action="">
                <input class = "form-control" type="email" id="email" placeholder="email"> <br>
                <input class = "form-control" type="text" id="username" placeholder="username"> <br>
                <input class = "form-control" type="password" id="password" placeholder="password"> <br>

                <button class="btn btn-success" style="font-family: 'Righteous';">Daftar</button>
            </form>
            <br>
            <h6 style = "margin-left:0.6em; color: aliceblue; text-decoration: underline;">Back</h6>
        </div>

    </div>
</div>

    </div>
</body>
</html>
