@extends('layout')

@section('title', 'Films')

@section('content')
    <div class="container pt-5 pb-5">
        <div class="film ml-auto mr-auto">
            <div class="card w-50 ml-auto mr-auto">
                <div class="card-header"><h3 id="film-title"></h3></div>
                <div class="card-body text-center">
                    <img id="film-img" />
                </div>
            </div>
        </div>
    </div>
@stop

@section('extra_scripts')
    <script type="text/javascript">
        var films = null;
        var data = null;

        jQuery(window).on('load', function(){

            jQuery.ajax({url: '{{ route('film.index') }}', success: function(result){
                films = result.data;
                data = result;


                jQuery('#film-title').text(films[0].name);
                jQuery('#film-img').attr('src', films[0].photo);
            }});

        });
    </script>
@stop