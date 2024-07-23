@extends('layouts.admin')

@section('title')
    პროდუქცია
@endsection

@section('content')
    <div class="container">
        <input type="text" class="form-control"/>
        <h1>პროდუქტების სია</h1>
        @if (session('edit_successful'))
            <div class="alert alert-success">
                {{ session('edit_successful') }}
            </div>
        @endif
        
        @if (session('delete_successful'))
            <div class="alert alert-danger">
                {{ session('delete_successful') }}
            </div>
        @endif


        @foreach ($products as $product)
            <div>
                <a href="{{ route('product.edit', ['product' => $product['id']]) }}">
                    {{ $product['title'] }}
                    {{ $product['description'] }}
                    {{ $product['price'] / 100 }} ₾
                </a>

                <form method="POST" action="/products/{{ $product['id'] }}">
                    @method('delete')
                    @csrf
                    <button>
                        <span style="color: red">X</span>
                    </button>
                </form>
            </div>
        @endforeach

        {{-- {{$products->links()}} --}}
    </div>
@endsection

