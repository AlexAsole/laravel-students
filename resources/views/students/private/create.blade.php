@extends('students.template.base')
@section('title', 'Crea')

@section('content')
    @include('students.template.form',['edit'=>false])
@endsection
