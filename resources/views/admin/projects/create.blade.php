@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Aggiunta nuovo progetto') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('projects.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Nome Progetto') }}</label>
                                <div class="col-md-6">
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>

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
                                            @if ($category->id == old('category_id')) selected="selected" @endif >
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
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3" required>{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <h4 class="text-center">Sezione immagini</h4>
                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">Immagine di copertina</label>
                                <div class="col-md-6">
                                    <input type="file" name="img[0][image]" class="form-control filepond">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 mb-5">
                                <label for="description-image" class="col-md-4 col-form-label text-md-end">{{ __('Descrizione immagine') }}</label>
                                <div class="col-md-6">
                                    <textarea id="description-image" class="form-control @error('description-image') is-invalid @enderror" name="img[0][description]" rows="3" required></textarea>
                                    @error('description-image')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="more-photo"></div>
                            <div class="text-center">
                                <button type="button" class="btn btn-success" id="add-field">Aggingi altra foto</button>
                                <br>
                                <button type="button" class="btn btn-danger mt-2" id="remove-field" disabled>Rimuovi ultima foto</button>
                            </div>
                            <button type="submit" class="btn btn-primary ">Aggiungi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var x = 1;
        $('#add-field').click(function() {
            var html =
                '<div class="new-field'+x+'">' +
                '<div class="row mb-3">' +
                '<label for="image" class="col-md-4 col-form-label text-md-end">Immagine '+ x +'</label>' +
                '<div class="col-md-6">' +
                '<input type="file" name="img['+ Number(x) +'][image]" class="form-control">' +
                '@error("image")' +
                '<span class="invalid-feedback" role="alert">' +
                '<strong>{{ $message }}</strong>' +
                '</span>' +
                '@enderror' +
                '</div>' +
                '</div>' +
                '<div class="row mb-3 mb-5">' +
                '<label for="description-image" class="col-md-4 col-form-label text-md-end">{{ __('Descrizione immagine') }}</label>' +
                '<div class="col-md-6">' +
                '<textarea id="description-image" class="form-control @error("description-image") is-invalid @enderror" name="img['+ Number(x) +'][description]" rows="3" required></textarea>' +
                '@error("description-image")' +
                '<span class="invalid-feedback" role="alert">' +
                '<strong>{{ $message }}</strong>' +
                '</span>' +
                '@enderror' +
                '</div>' +
                '</div>' +
                '</div>';
           $('#more-photo').append(html);
           x++;
           document.location.reload();
           $('#remove-field').removeAttr('disabled');
        });

        $('#remove-field').click(function(){
            if(x >= 1){
                $('.new-field'+(x-1)).remove();
                if(x > 1){
                    x--;
                }
                if (x === 1){
                    $('#remove-field').prop('disabled', true);
                }
            }
        });
    </script>
@endpush
