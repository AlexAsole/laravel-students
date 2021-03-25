@extends('students.template.base')
@section('title', 'Edita')

@section('content')
    @include('students.template.form',['edit'=>true])
@endsection
