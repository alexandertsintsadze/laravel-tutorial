<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <script src="test.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>
    </head>

    <body>
        <div class="container">
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
        </div>
    </body>
</html>
