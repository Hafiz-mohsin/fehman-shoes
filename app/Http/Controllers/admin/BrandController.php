<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Brands;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::get();
        return view('admin.brands.index', compact('brands'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
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
        if (request()->hasFile('image'))
        {
            $fileName = $this->uploadImage($request->image, 'brand');
        }

        $slug = Str::slug($request->name, '-');
        Brand::create([
            'name' => request()->get('name'),
            'slug' =>$slug,
            'image' => $fileName,
            'status' =>request()->get('status'),
        ]);
        return redirect()->route('admin.brand.index');
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

        $brand = Brand::find($id);
        return view('admin.brands.edit', compact('brand'));
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
        $brand=Brand::find($id);
        $fileName = null;
        if (request()->hasFile('image'))
        {
            $file = request()->file('image');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $brand->update([
        'name' => request()->get('name'),
        'image' => $fileName,
        'status' => request()->get('status'),

        ]);

        return redirect('/admin/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $brand = Brand::findorfail($id);
    //    if( $brand->image != '' && file_exists('uploads/'.'brand/'.$brand->image)){
    //     unlink('uploads/'.'brand/'.$brand->image);
    //    }
        $this->deleteImage($brand->image, 'brand');
       $brand->delete();
       return redirect()->back();

    }
}
