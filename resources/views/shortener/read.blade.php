@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="col s12 m6 offset-m3">
                    <div class="card-panel teal lighten-2 white-text mt-3">
                        <h2 class="card-title text-center mb-2">Lista de URL's</h2>
                        <table class="table align-items-start">
                            <tbody>
                                @foreach ($urls as $url)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td> {{ $url->full_url }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href=" {{ url('/') }} " class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
<div class="background"></div>
@endsection
