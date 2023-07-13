@extends('layouts.base')

@section('title', $bb->title)
    
@section('main')

<h1 class="my-3 text-center">The Item</h1>
<h2>{{$bb->title}}</h2>
{{-- <img src="{{ asset('storage/' . $bb->pic) }}" alt="post img"> --}}
{{-- <img src="{{ asset("storage/{$bb->pic}") }}" alt="post img"> --}}
<img src="{{ asset('storage/images/1.jpg') }}" alt="Your Image">
<img src="{{ asset('images/1.jpg') }}" alt="post img">
{{-- <img src="{{ asset("1.jpg") }}" alt="post img"> --}}
{{-- <img src="{{ asset("1.jpg") }}" alt="post img"> --}}
<p>{{$bb->content}}</p>
<p>${{$bb->price}}</p>
<p>Author: {{ $bb->user->name }}</p>
<a href="{{ route('index') }}">Homepage</a>


@endsection('main')