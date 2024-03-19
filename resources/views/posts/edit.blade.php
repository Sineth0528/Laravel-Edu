@extends('layouts.app')

@section('title', 'Update the pots')

@section('body')

    <form action="{{ route('posts.update', ['post' => $post->id])}}" method="POST">
        {{-- @csrf this is protiction --}}
        @csrf
        @method('PUT')
        @include('posts.partials.form')

        <div><input type="submit" value="Update"></div>
    </form>

@endsection

