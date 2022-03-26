@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.messages')
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
                                <button type="button" class="btn btn-danger btn-delete"
                                        data-action="{{route('categories.destroy', [$category])}}">
                                    Elimina
                                </button>
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
                                    <td><a href="{{route('projects.edit', [$project])}}" class="btn btn-warning">Modifica</a></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-delete"
                                            data-action="{{route('projects.destroy', [$project])}}">
                                            Elimina
                                        </button>
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

@push('modals')
    <!--Modale-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminazione dati definitiva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare questo contenuto?
                    <br>
                    <strong>(Se stai eliminando una categoria ricordati che verranno anche cancellati i progetti annessi)</strong>
                </div>
                <div class="modal-footer">
                    <form id="deleteform" action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Si
                        </button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        $(function (){
            $('.btn-delete').on('click', function (e){
                e.preventDefault();
                $('#deleteform').prop('action', $(this).data('action'));
                var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
                    keyboard: false
                });
                myModal.show();
            });
        });
    </script>
@endpush
