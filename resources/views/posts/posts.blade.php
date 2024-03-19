@extends('layouts.app')

@section('title' , $data['title'])

@section('body')

@if ($data['is_new'])
<h1> This is New Post!! Using IF</h1> 
@else
<h1> This is Old Post!! Using Else</h1> 
@endif

@unless ($data['is_new'])
    <h1> This is Old Post!! Using unless</h1> 
@endunless

@if(session('stat'))
    <div style="background: red; color:white; ">
        {{ session('stat') }}
    </div>
@endif


<h2>{{ $data['title']}}</h2>
<p>{{ $data['content']}}</p>
@endsection