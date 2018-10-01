@extends('layouts.app')

@section('title', 'Create Film')

@section('content')
    <div class="container pb-5">
        <div class="mb-5 text-center">
            <h3>Create a Film</h3>
        </div>
        {{ Form::open(['route' => 'api.film.save', 'class' => 'w-50 ml-auto mr-auto'])  }}
            {{ Form::token()  }}
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select class="form-control" multiple name="genre[]">
                    @foreach($genres as $key => $value)
                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="ticket_price">Ticket Price:</label>
                <input type="text" class="form-control" name="ticket_price" id="ticket_price">
            </div>
            <div class="form-group">
                <label for="release_date">Release Date:</label>
                <input type="text" class="form-control" name="release_date" id="release_date">
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="text" class="form-control" name="rating" id="rating">
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" id="country">
            </div>
            <div class="form-group">
                <label for="photo">Photo Url:</label>
                <input type="text" class="form-control" name="photo" id="photo">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea type="text" class="form-control" name="description" id="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@stop
