@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- Qui do l'indicazione di logged in NB. Chiaramente può essere customizzata --}}
                    <h6>Benvenuto {{ Auth::user()->name }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
