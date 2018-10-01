@extends('layout')

@section('title', 'Films')

@section('content')
    <div class="container pt-5 pb-5">
        <div class="row mb-5">
            <div class="ml-auto mr-auto d-flex justify-content-center">
                <a id="prev" href class="mr-2 next-prev-link"><< Prev</a>
                <a id="next" href class="ml-2 next-prev-link">Next >></a>
            </div>
        </div>
        <div class="film ml-auto mr-auto">
            <div class="card w-50 ml-auto mr-auto">
                <div class="card-header">
                    <a id="film-url" href><h3 id="film-title"></h3></a>
                    <div><b>Genre:</b> <span id="genre-list"></span></div>
                    <div><b>Release Date:</b> <span id="release-date"></span>.</div>
                    <div><b>Rating:</b> <span id="rating"></span>/5</div>
                    <div><b>Ticket Price:</b> <span id="ticket-price"></span>$</div>
                    <div><b>Description: </b><div id="description"></div></div>
                </div>
                <div class="card-body text-center">
                    <img class="w-50 h-50" id="film-img" />
                </div>
            </div>
        </div>
    </div>
@stop

@section('extra_scripts')
    <script type="text/javascript">
        var prevUrl = '';
        var nextUrl = '';

        jQuery(window).on('load', function(){

            var url = '{{ route('film.index') }}';
            loadFilm(url);

            jQuery('.next-prev-link').on('click', function(e){
                e.preventDefault();

                var who = jQuery(this).attr('id');
                if (who === 'prev') {
                    loadFilm(prevUrl);
                } else {
                    loadFilm(nextUrl);
                }
            });
        });

        function loadFilm(url) {
            jQuery.ajax({url: url, success: function(result){
                setPagination(result);
                loadFilmHtml(result.data[0]);
            }});
        }

        function setPagination(data) {
            var prevBtn = jQuery('#prev');
            var nextBtn = jQuery('#next');

            if ( !data.prev_page_url ) {
                prevBtn.hide();
                nextUrl = data.next_page_url;
            } else if ( !data.next_page_url ) {
                prevBtn.show();
                nextBtn.hide();
                prevUrl = data.prev_page_url;
            } else {
                prevBtn.show();
                nextBtn.show();
                nextUrl = data.next_page_url;
                prevUrl = data.prev_page_url;
            }
        }

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
@stop