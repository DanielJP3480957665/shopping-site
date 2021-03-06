<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products =Product::orderBy('name','asc');
        return view('products.index',compact('products'));
    }
    
    public function show($id){
        $product =Product::findOrfail($id);
        return view('product.show',compact('product'));
    }
    
}
