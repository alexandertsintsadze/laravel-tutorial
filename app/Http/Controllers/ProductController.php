<?php

namespace App\Http\Controllers;

use App\Events\ProductCreated;
use App\Events\ProductUpdated;
use App\Http\Interfaces\PhotoServiceInterface;
use App\Http\Services\TestService;
use App\Jobs\TestJob;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PhotoServiceInterface $photoServiceInterface)
    {
        // return $photoServiceInterface->createPhoto(1);
        // $products = Product::get();
        $products = Cache::rememberForever('products', function () {
            dump('ამოვიკითხე ბაზიდან');
            return Product::get();
        });

        TestJob::dispatch('satesto teqsti')->delay(now()->addSeconds(4));
dump('test');
        // Bus::dispatch(new TestJob());

        // $products = $productQuery->get();

        return view('products.index', ['products' => $products]);
    }

    
    public function indexTest()
    {
        return ['products' => Product::get()];
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|max:1000000',
        ]);

        $file = '';
        if ($request->has('photo')) $file = $request->file('photo')->store('images', 'public');

        $product = Product::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'] * 100,
            'photo' => $file,
        ]);

        Cache::forget('products');

        ProductCreated::dispatch($product);

        return 'შეიქმნა';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // dump($product->created_at);


        Log::error('test');
        $productTest = 10;
        $productTest['price'];
        Log::info('Someone viewed product with ID: ' . $product['id']);

        

        ProductUpdated::dispatch($product);

        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|max:1000000',
        ]);

        $product->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? $product->description,
            'price' => $validated['price'] * 100
        ]);

        return redirect('/products')->with('edit_successful', 'Product was edited successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products')->with('delete_successful', 'Product was deleted successfuly!');
    }
}
