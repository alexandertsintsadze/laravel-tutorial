@extends('layouts.admin')

@section('title')
    {{ $product['title'] }} - რედაქტირება
@endsection

@section('content')
    <div class="container">
        <h1>პროდუქტის რედაქტირება</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/products/{{ $product['id'] }}">
            @csrf
            @method('put')
            <div class="row">
                <label>
                    <p>პროდუქტის სათაური</p>
                    <input type="text" class="form-control" name="title" value="{{ $product['title'] }}" />
                </label>
            </div>
            <div class="row">
                <label>
                    <p>აღწერა</p>
                    <textarea name="description" class="form-control"> {{ $product['description'] }} </textarea>
                </label>
            </div>
            <div class="row">
                <label>
                    <p>ფასი</p>
                    <input type="text" class="form-control" name="price" value="{{ $product['price'] / 100 }}" />
                </label>
            </div>
            <input type="submit" value="შენახვა" />
        </form>
    </div>
@endsection