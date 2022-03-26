@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('projects.update', [$project])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Nome Progetto') }}</label>
                                <div class="col-md-6">
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $project->title) }}" required>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __("Categoria d'appartenenza") }}</label>
                                <div class="col-md-6">
                                    <select id="category_id" name="category_id" class="form-select mb-3  @error('category_id') is-invalid @enderror" required>
                                        <option value="">Seleziona una categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if ($category->id == old('category_id', $project->category->id)) selected="selected" @endif >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Descrizione') }}</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <h4 class="text-center">Sezione immagini</h4>
                            @foreach($project->photos as $photo)
                                <div class="row mb-3">
                                    <label for="image" class="col-md-4 col-form-label text-md-end">@if($loop->index == 0)(Immagine di copertina)@else Foto @endif</label>
                                    <div class="col-md-6">
                                        <input type="file" name="img[{{$loop->index}}][image]" class="form-control">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <img class="img-fluid" src="{{asset('storage/' . $photo->path_img)}}" alt="#">
                                </div>
                                <div class="row mb-5">
                                    <label for="description-image" class="col-md-4 col-form-label text-md-end">{{ __('Descrizione immagine') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="description-image" class="form-control @error('description-image') is-invalid @enderror" name="img[{{$loop->index}}][description]" rows="3" required>{{old('description-image', $photo->description )}}</textarea>
                                        @error('description-image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">Modifica</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
