@extends('layouts.app')

@section('title', 'Films')

@section('content')
    <div class="container pb-5">
        <div class="row mb-5">
            <div class="ml-auto mr-auto d-flex justify-content-center">
                <a id="prev" href class="mr-2 next-prev-link"><< Prev</a>
                <a id="next" href class="ml-2 next-prev-link">Next >></a>
            </div>
        </div>
        <div class="film ml-auto mr-auto">
            @include('partials/film_item')
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
    </script>
@stop