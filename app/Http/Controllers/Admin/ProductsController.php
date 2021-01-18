<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get list of categories
        $products = Product::orderBy('name')->paginate(10);
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // get categories
        $categories = Category::orderBy('name')->get();
        return view('admin.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        $data = request()->validate([
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|filled|unique:products,sku',
            'name' => 'required|filled|min:5|max:100',
            'price' => 'required|filled|numeric',
        ]);
        // post
        Product::create($data);
        // redirect
        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        // get categories
        $categories = Category::orderBy('name')->get();
        return view('admin.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Product $product)
    {
        // validate
        $data = request()->validate([
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|filled|unique:products,sku,' . $product->id . ',id',
            'name' => 'required|filled|min:5|max:100',
            'price' => 'required|filled|numeric',
        ]);
        // update
        $product->update($data);
        // redirect
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        // first delete photos
        foreach($product->images as $image) {
            // deleting record only, not deleting actual file
            $image->delete();
        }
        // delete
        $product->delete();
        // redirect
        return redirect('/admin/products');
    }
}
