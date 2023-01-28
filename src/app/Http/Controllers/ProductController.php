<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->tokenCan("1")) {
            $request->validate([
                'name' => 'required|min:3',
                'slug' => 'required',
                'price' => 'required',
            ]);

            $data_product = [
                'name' => $request->name,
                'description' => $request->description,
                'slug' => $request->slug,
                'price' => $request->price,
                'user_id' => $user->id,
            ];

            return Product::create($data_product);
        } else {
            return [
                'status' => 'Permission denied to create',
            ];
        }
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if ($user->tokenCan("1")) {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'price' => 'required',
            ]);

            $data_product = array(
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'slug' => $request->input('slug'),
                'price' => $request->input('price'),
                'user_id' => $user->id,
            );

            $product = Product::find($id);
            $product->update($data_product);

            return $product;

        } else {
            return [
                'status' => 'Permission denied to create',
            ];
        }
    }

    public function destroy($id)
    {
        $user = auth()->user();

        if ($user->tokenCan("1")) {
            return Product::destroy($id);
        } else {
            return [
                'status' => 'Permission denied to create',
            ];
        }
    }
}
