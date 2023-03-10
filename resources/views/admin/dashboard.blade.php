@extends('layouts.master')
@section('tittle', 'Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Halo {{$name}}</h1>
            <h1>You are {{ucfirst(Auth::user()->level ?? 'Siswa')}}</h1>
        </div>
    </div>
</div>
@endsection
