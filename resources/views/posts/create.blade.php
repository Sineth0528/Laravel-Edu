@extends('layouts.app')

@section('title', 'Create the pots')

@section('body')

    <form action="{{ route('posts.store')}}" method="POST">
        {{-- @csrf this is protiction --}}
        @csrf
        @include('posts.partials.form');

        <div><input type="submit" value="Create"></div>
    </form>

@endsection
