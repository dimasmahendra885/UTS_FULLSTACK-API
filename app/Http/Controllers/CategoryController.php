<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getProductsByCategory($id)
    {
        // Validasi apakah kategori ada
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'error' => 'Category not found.'
            ], 404);
        }

        // Ambil produk berdasarkan category_id
        $products = $category->products;

        return response()->json([
            'category' => $category->name,
            'products' => $products
        ]);
    }
}