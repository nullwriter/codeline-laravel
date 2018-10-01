<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Films</title>
    </head>
    <body>

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

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
    </body>
</html>