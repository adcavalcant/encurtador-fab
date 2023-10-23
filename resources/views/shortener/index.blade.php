@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-2">Encurtador - CCA-BR</h2>
                    <form action="/shorten" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="label" for="original_slug">URL</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                <input class="form-control" type="text" name="original_url" id="original_url"
                                    placeholder="https://www.exemplo.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label" for="custom_slug">Fragmento Personalizado <small>(se não for informado,
                                    o sistema irá
                                    gerar um aleatório)</small></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                <input class="form-control" type="text" name="custom_slug" id="custom_slug"
                                    placeholder="opcional (entre 1 e 5 caracteres)" autocomplete="off" maxlength="5">
                            </div>
                            @if($errors->any())
                            <div class="alert alert-danger text-center">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li class="small">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="buttons form-group mt-3 text-center">
                            <button type="submit"
                                class="btn btn-primary btn-block waves-effect waves-light w-100">GERAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="background"></div>
@endsection
