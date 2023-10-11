<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        $products = Product::get();
        return view('admin.products.index', compact('products', 'categories' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.Products.create',compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = null;
        if (request()->hasFile('thumbnail'))
        {
            $fileName = $this->uploadImage($request->thumbnail, 'product');
        }
        // dd($request->all());
        $slug = Str::slug($request->title, '-');
        $product = Product::create([
            'title' => request()->get('title'),
            'slug' =>$slug,
            'short_decription' => request()->get('short_decription'),
            'long_description' => request()->get('long_description'),
            'price' => request()->get('price'),
            'category_id' => request()->get('category_id'),
            'type' => request()->get('type'),
            'brand_id' => request()->get('brand_id'),
            'thumbnail' => $fileName,
            'status' =>request()->get('status'),
        ]);

        foreach($request->images as $image)
        {
            ProductImage::create([
                'image' => $this->uploadImage($image, 'product_images'),
                'product_id' => $product->id
            ]);
        };
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::get();
        $categories = Category::get();
        $product = Product::find($id);
        return view('admin.Products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fileName = '';
        $slug = Str::slug($request->title, '-');
        $product =Product::find($id);
        $data = [
            'title' => request()->get('title'),
            'slug' =>$slug,
            'short_decription' => request()->get('short_decription'),
            'long_description' => request()->get('long_description'),
            'price' => request()->get('price'),
            'category_id' => request()->get('category_id'),
            'type' => request()->get('type'),
            'brand_id' => request()->get('brand_id'),
            'status' =>request()->get('status'),
        ];
        if (request()->hasFile('thumbnail'))
        {
            $fileName = $this->updateImage($request->thumbnail, $product->thumbnail ,'product');
            $data['thumbnail'] = $fileName;
        }

        if (request()->hasFile('images'))
        {
            foreach($request->images as $image) {
                $fileName = $this->updateImage($request->images, $product->images ,'product_images');
                $data['image'] = $fileName;
            }
        }


        $product->update($data);
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);
        $this->deleteImage($product->thumbnail, 'product');
        foreach ($product->images as $product_image) {
            $this->deleteImage($product_image->image, 'product_images');
            $product_image->delete();
        }
        $product->delete();

        return redirect()->back();

    }
}
