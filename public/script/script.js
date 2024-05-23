document.addEventListener('alpine:init', () => {
    Alpine.data('movieApp', () => ({
        popularMovies: [],
        topRatedMovies: [],
        categoryMovies: [],
        currentCategory: '',
        filmImageUrl: '',
        movieTitle: '',
        movieOverview: '',
        async fetchMovies() {
            try {
                let response = await fetch('https://api.themoviedb.org/3/movie/popular?api_key=1ee76937d4b67dd4b4747ef81c88470a');
                let data = await response.json();
                this.popularMovies = data.results;

                response = await fetch('https://api.themoviedb.org/3/movie/top_rated?api_key=1ee76937d4b67dd4b4747ef81c88470a');
                data = await response.json();
                this.topRatedMovies = data.results;
            } catch (error) {
                console.error('Error fetching movies:', error);
            }
        },
        async fetchCategoryMovies(category) {
            try {
                this.currentCategory = category;
                const genreMap = {
                    'Adventure': 12,
                    'Animation': 16,
                    'Comedy': 35,
                    'Crime': 80,
                    'Documentary': 99
                };
                const genreId = genreMap[category];
                const response = await fetch(`https://api.themoviedb.org/3/discover/movie?api_key=1ee76937d4b67dd4b4747ef81c88470a&with_genres=${genreId}`);
                const data = await response.json();
                this.categoryMovies = data.results;
            } catch (error) {
                console.error('Error fetching category movies:', error);
            }
        },
        async fetchRandomMovie() {
            const apiKey = '1ee76937d4b67dd4b4747ef81c88470a';
            const randomPage = Math.floor(Math.random() * 10);
            const apiUrl = `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&page=${randomPage}`;
            
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();
                const randomIndex = Math.floor(Math.random() * data.results.length);
                const movie = data.results[randomIndex];
                this.filmImageUrl = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;
                this.movieTitle = movie.title;
                this.movieOverview = movie.overview;
                this.randomMovieId = movie.id;
            } catch (error) {
                console.error('Error fetching random movie:', error);
            }
        },        
        redirectToMovieDetails(movieId) {
            window.location.pathname = `/movieDetails/${movieId}`;
        },
        playMovie() {
            this.redirectToMovieDetails(this.randomMovieId);
        }
    }))
})
document.addEventListener('alpine:init', () => {
    Alpine.data('movieDetail', () => ({
        filmImageUrl: '',
        movieTitle: '',
        movieOverview: '',
        movieId: window.location.pathname.split('/').pop(),
        async fetchMovieDetails() {
            const movieId = this.$el.getAttribute('x-data').match(/(\d+)/)[0];
            const apiKey = '1ee76937d4b67dd4b4747ef81c88470a';
            const apiUrl = `https://api.themoviedb.org/3/movie/${this.movieId}?api_key=${apiKey}`;
        
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();
                this.filmImageUrl = `https://image.tmdb.org/t/p/w500${data.poster_path}`;
                this.movieTitle = data.title;
                this.movieOverview = data.overview;
            } catch (error) {
                console.error('Error fetching movie details:', error);
            }
        }
    }));
});
