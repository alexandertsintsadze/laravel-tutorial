<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\TestServiceInterface;
use App\Http\Services\TestService;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
    public function index(Request $request, TestServiceInterface $testService, JobServiceInterface $jobService)
    {
        return $jobService->index();
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

        $photo = $request->file('photo');
        $file = $request->file('photo')->store('images', 'public');

        Product::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'] * 100,
            'photo' => $file,
        ]);

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
            'description' => $validated['description'],
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
