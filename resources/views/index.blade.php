@extends('layouts.base')

@section('title', 'Home Page')
    
@section('main')

<h1 class="my-3 text-center">All Items</h1>
<p style="text-align: center; margin-bottom:70px;">{{ config('custom.my_description') }}</p>

    @if (count($bbs) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col"><h2>Title</h2></th>
                <th scope="col"><h2>Price</h2></th>
                <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bbs as $bb)
                    <tr>
                        <td><h3>{{ $bb->title }}</h3></td>
                        <td>${{ $bb->price }}</td>
                        <td><a href="{{ route('detail', ['bb' => $bb, 'anchor' => 'test']) }}">more...</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $bbs->links() }}

    @endif

<br>
<br>
<br>


{!! Form::open(['url' => 'foo/bar']) !!}
    {{ Form::label('title', 'Product') }}
    {{ Form::text('email', 'example@gmail.com') }}
    {{ Form::select('size', ['L' => 'Large', 'S' => 'Small']); }}
    {{ Form::select('animal',[
        'Cats' => ['leopard' => 'Leopard'],
        'Dogs' => ['spaniel' => 'Spaniel'],
    ]) }}
    {{ Form::selectRange('number', 10, 20) }}
    {{ Form::selectMonth('month') }}
    {{ Form::reset('Reset') }}
{!! Form::close() !!}

{{ link_to('/', 'Home Page') }}

<br>

{!! BBCode::convertToHtml('[b]Laravel wins[/b]'); !!}
<br>
<br>
<br>
<br>
<br>
<br>

@endsection('main')