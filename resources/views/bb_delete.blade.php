@extends('layouts.base')

@section('title', 'Удаление объявления')
    
@section('main')

<h1 class="my-3 text-center">The Item</h1>
<h2>{{$bb->title}}</h2>
<p>{{$bb->content}}</p>
<p>${{$bb->price}}</p>
<p>Author: {{ $bb->user->name }}</p>
<form action="{{ route('bb.destroy', ['bb' => $bb->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" class="btn btn-danger" value="Delete">
</form>


@endsection('main')