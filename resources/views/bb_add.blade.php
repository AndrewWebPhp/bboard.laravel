@extends('layouts.base')

@section('title', 'Добавление объявления :: Мои объявления')

@section('main')
<form action="{{ route('bb.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <select name="rubric_id[]" size="5" multiple>
            <option value="">- No -</option>
            <option value="1">Rubric one</option>
            <option value="2">Rubric two</option>
            <option value="3">Rubric three</option>
            <option value="4">Rubric four</option>
            <option value="5">Rubric five</option>
        </select>
    </div>
    <div class="form-group">
        <input type="checkbox" name="publish" value="1">
    </div>
    /////////////////////
    <div class="form-group">
        <label for="txtTitle">Товар</label>
        <input name="title" id="txtTitle"
               class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
        @error('title')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="bb-img">Img</label>
        <input name="pic" id="bb-img" type="file"
               class="form-control @error('pic') is-invalid @enderror">
        @error('pic')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtContent">Описание</label>
        <textarea name="content" id="txtContent"
                  class="form-control @error('content') is-invalid @enderror"
                  row="3">{{ old('content') }}</textarea>
        @error('content')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtPrice">Цена</label>
        <input name="price" id="txtPrice"
               class="form-control @error('price') is-invalid @enderror"
               value="{{ old('price') }}">
        @error('price')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div>{!! captcha_img() !!}</div>
    <div class="form-group">
        <input name="captcha"
               class="form-control @error('captcha') is-invalid @enderror">
        @error('captcha')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <input type="submit" class="btn btn-primary" value="Добавить">
</form>
@endsection
