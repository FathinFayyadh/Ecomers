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

    public function profile(){

        return view('Admin.profil-admin');
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

    public function editproduct($id)
    {
        $product = product::find($id);
        return view('admin.FormAdmin.edit-product', compact('product'));
    }
    public function updateproduct(Request $request, $id)
    {
        $request->validate([
            'nameproduct' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $product = Product::findOrFail($id);
        $product->nameproduct = $request->nameproduct;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'storage/products/' . $fileName;

            $file->move(public_path('storage/products'), $fileName);
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $product->image = $filePath;
        }
        $product->save();
        return redirect()->route('manage.product')->with('success', 'Product updated successfully');
    }
    
    public function deleteproduct($id)
    {
        $product = product::find($id);
        $product->delete();
        $imagePath = public_path($product->image);
        if (file_exists($imagePath))
            unlink($imagePath);
        return redirect()->route('manage.product');
    }
}
