@extends('layouts.main')

@section('contents')
    <h1>Hi guest number #{{ rand(0,9999) }}</h1>
    <img src="{{ asset('images/bibizeana.png') }}" alt="image">
@endsection
