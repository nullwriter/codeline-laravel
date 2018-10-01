@extends('layout')

@section('content')
    <div class="container pt-2 pb-5">
        @include('partials/film_item')
    </div>
@stop

@section('extra_scripts')
    <script type="text/javascript">
        jQuery(window).on('load', function(){
            var url = '{{ route('api.film.view', [request()->route()->parameter('film')]) }}';
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
                console.log(url);
                console.log(JSON.stringify(result));
                loadFilmHtml(result);
            }});
        }
    </script>
@stop