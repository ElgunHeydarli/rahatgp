<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductColor;

interface ProductRepository
{
    public function getAllProducts();

    public function getProductById(int $id);

    public function getProductBySlug(string $slug);

    public function insertProduct(array $data);

    public function updateProduct(Product $product, array $data);

    public function deleteProduct($id);

    public function updateColor(ProductColor $productColor, array $data);

    public function GetProductsByCategory(string $slug);

    public function deleteColor($id);
}
