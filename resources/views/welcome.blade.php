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
<div x-data="movieApp" x-init="fetchRandomMovie()">
    <div class="movie"> 
        <div class="overlay"></div>
        <img :src="filmImageUrl" decoding="async" data-nimg="fill" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" />
       
        <div class="movieInfo">
            <h2 x-text="movieTitle" class="movie-title"></h2>
            <p x-text="movieOverview" class="movie-overview"></p>
            <div class="play-add">
                <button @click="playMovie" class="play-button">Play</button>
                <button class="add-button"><i class="fa-solid fa-plus"></i></button>
            </div>
        </div>
        
    </div>
</div>

<div x-data="movieApp" x-init="fetchMovies()">

    <div class="button-group">
        <button @click="fetchCategoryMovies('Adventure')">Adventure</button>
        <button @click="fetchCategoryMovies('Animation')">Animation</button>
        <button @click="fetchCategoryMovies('Comedy')">Comedy</button>
        <button @click="fetchCategoryMovies('Crime')">Crime</button>
        <button @click="fetchCategoryMovies('Documentary')">Documentary</button>
    </div>
    <div class="section" x-show="categoryMovies.length > 0">
        <div class="section-title" x-text="currentCategory + ' Movies'"></div>
        <div class="movie-grid">
            <template x-for="movie in categoryMovies.slice(0, 6)" :key="movie.id">
                <div class="movie-item" @click="redirectToMovieDetails(movie.id)">
                    <img :src="'https://image.tmdb.org/t/p/w500' + movie.poster_path" alt="" class="movie-poster" />
                </div>
            </template>
        </div>
    </div>
    <div class="section">
        <div class="section-title">Popular Movies</div>
        <div class="movie-grid">
            <template x-for="movie in popularMovies.slice(0, 6)" :key="movie.id">
                <div class="movie-item" @click="redirectToMovieDetails(movie.id)">
                    <img :src="'https://image.tmdb.org/t/p/w500' + movie.poster_path" alt="" class="movie-poster" />
                </div>
            </template>
        </div>
    </div>
    <div class="section">
        <div class="section-title">Your Favorites</div>
        <div class="movie-grid">
            <template x-for="movie in topRatedMovies.slice(0, 6)" :key="movie.id">
                <div class="movie-item" @click="redirectToMovieDetails(movie.id)">
                    <img :src="'https://image.tmdb.org/t/p/w500' + movie.poster_path" alt="" class="movie-poster" />
                </div>
            </template>
        </div>
    </div>
    
</div>

</body>
</html>
