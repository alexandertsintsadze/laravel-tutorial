@extends('layouts.admin')

@section('title')
    პროდუქტის შექმნა
@endsection

@section('content')
    <div class="container">
        <h1>პროდუქტის შექმნა</h1>
            
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('product.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label>
                    <p>პროდუქტის სათაური</p>
                    <input type="text" class="form-control" name="title" />
                </label>
            </div>
            <div class="row">
                <label>
                    <p>აღწერა</p>
                    <textarea
                        name="description"
                        class="form-control"
                    ></textarea>
                </label>
            </div>
            <div class="row">
                <label>
                    <p>ფასი</p>
                    <input
                        type="text"
                        class="form-control"
                        name="price"
                    />
                </label>
            </div>
            <input type="submit" value="შენახვა" />
        </form>
    </div>
@endsection