<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(ProductsDataTable $dataTable)
    // {
    //     // $product = Product::with('category')->get();
    //     // return view('product.index', ["title"=>"Product list", 'data' =>$product]);
    //     return $dataTable->render('product.index');


    // }
    public function index()
    {
        if(\request()->ajax()){
            $data = Product::with('category:id,category_name');
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('action', function($row){
                //     $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                //     return $actionBtn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories  = Category::all()->pluck('category_name','id');
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $input  = $request->all();
        $file = $request->file('image'); // Retrieve the uploaded file from the request
        $file_name = $file->getClientOriginalName(); // Retrieve the original file_name
        Storage::disk('public')->put('upload/'.$file_name, file_get_contents($file));
        $input['image']= $file_name;
        $input['status']= 1;
        try{
            Product::create($input);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('error', $e->getMessage());
        }

        return redirect()->route('products.index')->with('success', 'Product Added Successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd("Show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::find($id);
        $categories  = Category::all()->pluck('category_name','id');
        return view('product.edit', compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $input = $request->all();
        $data = Product::where('id', $id)->first();
        $file_name = "";

        if($request->hasFile('image')){
            $file = $request->file('image'); // Retrieve the uploaded file from the request
            $file_name = $file->getClientOriginalName(); // Retrieve the original file_name

            Storage::disk('public')->put('upload/'.$file_name, file_get_contents($file));
        };

        if($file_name){
            $input['image']=$file_name;
        }

        $data->update($input);
        return redirect()->back()->with('success', 'Product Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Product::where('id', $id)->first();
        $data->delete();
        return redirect()->back()->with('success', 'Product Deleted');
    }
}
