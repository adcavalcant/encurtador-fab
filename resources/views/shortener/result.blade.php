@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="col s12 m6 offset-m3">
                    <div class="card-panel teal lighten-2 white-text text-center mt-3">
                        <h2>URL Encurtada com Sucesso!</h2>
                        <p>A sua URL foi encurtada para:</p>
                        @php
                        $shortenedUrl = isset($customSlug) ? $customSlug : $randomSlug;
                        @endphp
                        <a target="_blank" href="{{ url('/')}}/{{ $shortenedUrl }}">
                            <strong id="textoParaCopiar">{{ url('/')}}/{{ $shortenedUrl }}</strong>
                        </a>
                        <button onclick="copyText()" class="btn btn-light btn-sm"><i
                                class="fa-solid fa-copy"></i></button>
                        <div id="mensagemCopiado" class="alert alert-success mt-2" style="display: none;">Link copiado!
                        </div>
                        <p>Copie e compartilhe este link.</p>
                        <div class="buttons form-group mt-3 text-center">
                            <a href=" {{ url('/') }} "
                                class="btn btn-primary btn-block w-100">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="background"></div>
@endsection

@push('scripts')
<script>
    function copyText() {
        var elementoParaCopiar = document.getElementById("textoParaCopiar");
        var textoCopiado = elementoParaCopiar.innerText;
        navigator.clipboard.writeText(textoCopiado)
            .then(function () {
                var mensagemCopiado = document.getElementById("mensagemCopiado");
                mensagemCopiado.style.display = "block";
                setTimeout(function () {
                    mensagemCopiado.style.display = "none";
                }, 500);
            })
            .catch(function (err) {
                console.error('Falha ao copiar: ', err);
            });
    }
</script>
@endpush
