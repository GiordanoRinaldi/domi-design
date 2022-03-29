@extends('layouts.app')

@section('content')
    <div class="container px-5">
        <div class="row">
            @foreach($projects as $project)
                <div class="col-12 col-sm-6 col-xxl-4">
                    <a href="{{route('project', [$project->slug])}}">
                        <img style="width: 100%; height: auto;" class="figure-img" src="{{asset('storage/' . $project->photos[0]->path_img)}}" alt="#">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

