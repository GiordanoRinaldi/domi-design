@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{$project->title}}</h1>
        <p class="text-center">{{$project->description}}</p>
        <div class="row">
            @foreach($project->photos as $photo)
                <div class="col-12 col-sm-6">
                    <img style="width: 100%; height: auto;" class="figure-img" src="{{asset('storage/' . $photo->path_img)}}" alt="img progetto">
                    <p>{{$photo->description}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
