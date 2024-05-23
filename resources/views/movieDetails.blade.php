<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['public/scss/styles.scss', 'public/script/script.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.2/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="body">
@include('navbar')
<div x-data="movieDetail({{ $movieId }})" x-init="fetchMovieDetails()">
    <div class="movie" x-show="movieTitle">
    <div class="overlay"></div>
        <img :src="filmImageUrl" decoding="async" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" />
        <div class="movieInfo">
            <h2 x-text="movieTitle" class="movie-title"></h2>
            <p x-text="movieOverview" class="movie-overview"></p>
            <div class="play-add">
                <button class="play-button">Play</button>
                <button class="add-button"><i class="fa-solid fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>


</body>
</html>
