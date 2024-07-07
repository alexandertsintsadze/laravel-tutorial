<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="test.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
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
</body>

</html>
