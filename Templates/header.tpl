<!DOCTYPE html>
    <html lang="en">
        <head>
            <base href={BASE_URL} />
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://kit.fontawesome.com/4b5075b66f.js" crossorigin="anonymous"></script>
            <link rel = stylesheet href="css/style.css">
            <title>{$titulo}</title>
                  
        </head>
             
    <body>
    <header>
        <div class="login">
            {if $logueado}
                <a href="#">{$usuario}</a>
                <a href="./logout">Logout</a>
            {else}
                <a href="./login">Login</a>
                <a href="./signIn">SignIn</a>
            {/if}        
        </div>
        <h1 class=""><a href="./home">SpeakEasy</a></h1>
        <p>Sabemos de buenos vinos</p>
    </header>
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <div class="burgerMenu">
                    <div class="burgerMenu__bars"></div>
                </div>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./home">Home</a>
                </li>
                <img src="./img/favicon.svg" alt="" srcset="">
                <li class="nav-item">
                    <a class="nav-link" href="./bodegas">Bodegas</a>
                </li>
            </ul>
        </div>
</nav>
   