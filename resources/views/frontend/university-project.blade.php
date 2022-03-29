@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>University Projects</h1>
        @foreach($categories as $category)
            <h3>{{$category->name}}</h3>
            <div class="row">
                @foreach($category->projects as $project)
                    <div class="col-12 col-sm-6 col-xxl-4">
                    <a href="{{route('project', [$project])}}">
                        <img style="width: 100%; height: auto;" class="figure-img" src="{{asset('storage/' . $project->photos[0]->path_img)}}" alt="">
                    </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium doloremque harum magni non nulla quaerat sit. Asperiores assumenda at consectetur delectus deserunt, dicta dolores ducimus, quas ratione ut, voluptatibus!</p>
                </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
