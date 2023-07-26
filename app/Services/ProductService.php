<?php

namespace App\Services;

use App\Helpers\FileManager;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Repositories\ProductRepository;
use Illuminate\Support\Str;

class ProductService implements ProductRepository
{
    public function getAllProducts()
    {
        return Product::orderBy('created_at', 'desc')->get();
    }

    public function getProductById(int $id)
    {
        return Product::findOrFail($id);
    }

    public function getProductBySlug(string $slug)
    {
        return Product::where(['slug' => $slug])->firstOrFail();
    }

    public function insertProduct(array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        $product = Product::create($data);
        $product->colors()->sync($data['colors'] ?? []);
    }

    public function updateProduct(Product $product, array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        $product->update($data);
        $product->colors()->sync($data['colors'] ?? []);
    }

    public function deleteProduct($id)
    {
        $product = $this->getProductById($id);
        foreach ($product->images as $image) {
            FileManager::fileDelete('products', $image);
        }
        $product->delete();
    }

    public function GetProductsByCategory(string $slug)
    {
        $category = Category::where(['slug'=>$slug])->firstOrFail();
        return Product::where(['category_id'=>$category->id])->get();
    }

    public function updateColor(ProductColor $productColor, array $data)
    {
    }

    public function deleteColor($id)
    {
    }
}
