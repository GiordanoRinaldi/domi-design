@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Lista Categorie') }}</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary" href="{{route('categories.create')}}">Aggiungi una categoria </a>
                    </div>
                    <table class="table mt-2">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Modifica</th>
                            <th scope="col">Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td class="align-middle">{{$category->name}}</td>
                            <td><a href="{{route('categories.edit', [$category])}}" class="btn btn-warning">Modifica</a></td>
                            <td>
                                <form method="POST" action="{{route('categories.destroy', [$category])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-3">
                    <div class="card-header">{{ __('Lista Progetti') }}</div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="{{route('projects.create')}}">Aggiungi un nuovo progetto </a>
                        </div>
                        <table class="table mt-2">
                            <thead>
                            <tr>
                                <th scope="col">Titolo</th>
                                <th scope="col">Categoria associata</th>
                                <th scope="col">Modifica</th>
                                <th scope="col">Elimina</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td class="align-middle">{{$project->title}}</td>
                                    <td>{{$project->category->name}}</td>
                                    <td><a href="{{route('categories.edit', [$project])}}" class="btn btn-warning">Modifica</a></td>
                                    <td>
                                        <form method="POST" action="{{route('projects.destroy', [$project])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
