@extends('layouts.app')

@section('content')
    <div class="container pt-2 pb-5">
        @include('partials/film_item')
        <div id="comment-section" class="w-50 ml-auto mr-auto mt-4">
            <h4>Comments</h4>
            <div class="comment-wrap">
                @foreach($comments as $key => $value)
                <div class="card mb-2">
                    <div class="card-body">
                        <b>{{ $value['user']['name'] }}</b>: <span>{{ $value['comment'] }}</span> <br>
                        <small class="float-right">{{ date('l F jS, Y h:i A', strtotime($value['created_at'])) }}</small>
                    </div>
                </div>
                @endforeach
                @if(empty($comments))
                <div class="card">
                    <div class="card-body">
                        There are no comments.
                    </div>
                </div>
                @endif
            </div>
            <div class="add-comment-form mt-4">
                @auth
                {{ Form::open(['route' => 'comment.submit', 'class' => ''])  }}
                    {{ Form::token()  }}
                    <div class="form-group">
                        <label for="comment">Submit a comment:</label>
                        <textarea type="text" class="form-control" name="comment" id="comment"></textarea>
                    </div>
                    <input type="hidden" name="film_id" value="{{ $film_id }}" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                {{ Form::close()  }}
                @else
                    <span>You need to <a href="{{ route('login') }}">log in</a> to comment.</span>
                @endauth
            </div>
        </div>
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