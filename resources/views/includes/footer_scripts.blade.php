<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
    function loadFilmHtml(data) {
        jQuery('#film-title').text(data.name);
        jQuery('#film-img').attr('src', data.photo);

        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var filmDate = new Date(data.release_date);

        jQuery('#release-date').text(filmDate.toLocaleDateString("en-US", options));

        var genres = [];
        jQuery.each(data.genres, function(k, v){
            genres.push(v.name);
        });

        var strGenres = genres.join(', ');
        jQuery('#genre-list').text(strGenres);

        jQuery('#rating').text(data.rating);
        jQuery('#ticket-price').text(data.ticket_price);
        jQuery('#description').text(data.description);

        var filmUrl = '{{ route('film.view', ['film' => 'placeholder']) }}'.replace('placeholder', data.slug);
        jQuery('#film-url').attr('href', filmUrl);
    }
</script>