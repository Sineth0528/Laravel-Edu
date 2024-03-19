@extends('layouts.app')

@section('title' , 'Posts')

@section('body')

@foreach ($data as $key => $post)
    <div> {{$key}} .  {{ $post['title'] }}</div>  
@endforeach

@endsection