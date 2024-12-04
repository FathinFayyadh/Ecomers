<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function Dashboard()
    {

        return view('Admin.dashboard');
    }
    public function CreateProduct()
    {

        return view('admin.FormAdmin.createProduct');
    }
    public function loginAdmin()
    {
        return view('admin.FormAdmin.login-Admin');
    }


    public function manageproduct()
    {
        $products = product::all();
        return view('admin.manageProduct', compact('products'));
    }
    public function getproduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nameproduct' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create-product')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move('storage/products', $fileName);

        product::create([
            'user_id' => Auth::user()->id,
            'image' => '/storage/products/' . $fileName,
            'nameproduct' => $request->nameproduct,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()->route('manage.product')->with('success', 'Product added successfully');
    }
}
