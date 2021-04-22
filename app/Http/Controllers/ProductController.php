<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateImageRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $products = Product::orderBy('updated_at', 'desc')->get();
        $deletedProducts = Product::onlyTrashed()->get();

        return view('product.index', compact('categories', 'products', 'deletedProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $realFileName = $request->file('image')->getClientOriginalName();
        $newFileName = time().".".$realFileName;
        /* dd($newFileName); */

        $img = Image::make($request->file('image'))->resize(600, 600);

        $path = public_path('storage/products');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        $img->save('storage/products/'.$newFileName, 60);
        /* dd($img); */
        Product::create([
            'category' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'units' => $request->units,
            'details' => $request->details,
            'description' => $request->description,
            'image_path' => 'products/'.$newFileName,
        ]);

        return redirect()->back()->with('message', "Product {$request->name} added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->category = $request->category;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->units = $request->units;
        $product->details = $request->details;
        $product->description = $request->description;
        $product->save();

        return redirect()->back()->with('message', "Product {$request->name} updated successfully!");
    }

    public function updateImage(ProductUpdateImageRequest $request, Product $product)
    {
        Storage::delete('public/'.$product->image_path);

        $realFileName = $request->file('image')->getClientOriginalName();
        $newFileName = time().".".$realFileName;
        /* dd($newFileName); */
        $img = Image::make($request->file('image'))->resize(600, 600);

        $img->save('storage/products/'.$newFileName, 60);

        $product->image_path = 'products/'.$newFileName;
        $product->save();

        return redirect()->back()->with('message', "Product {$product->name} image updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('message', "Product $product->name deleted successfully!");
    }

    public function restored($id)
    {
        try {
            $product = Product::withTrashed()->findOrFail($id);
            $product->restore();
        } catch (\Exception $th) {
            throw new NotFoundException("Product");
        }

        return redirect()->back()->with('message', "Product {$product->name} restored successfully!");
    }

    public function forceDeleted($id)
    {
        try {
            $product = Product::withTrashed()->findOrFail($id);
            Storage::delete('public/'.$product->image_path);
            $product->forceDelete();
        } catch (\Throwable $th) {
            throw new NotFoundException("Product");
        }

        return redirect()->back()->with('message', "Product {$product->name} deleted permanently!");
    }
}
