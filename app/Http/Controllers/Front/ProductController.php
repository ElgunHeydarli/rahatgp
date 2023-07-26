<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $product_service;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }
    public function index($slug)
    {
        $products = $this->product_service->GetProductsByCategory($slug);
        $basket = Session::get('basket', []);
        $favorite = Session::get('favorite', []);
        return view('front.product', compact('products', 'basket', 'favorite'));
    }

    public function detail($slug)
    {
        $product = $this->product_service->getProductBySlug($slug);
        return view('front.product-detail', compact('product'));
    }

    public function add_to_cart($id, Request $request)
    {
        $basket = Session::get('basket', []);
        $product = $this->product_service->getProductById($id);
        try {
            if (isset($basket[$id])) {
                $basket[$id]['count'] += ($request->count ?? 1);
            } else {
                $basket[$id] = [
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'price' => $product->price - $product->discount,
                    'count' => $request->count ?? 1,
                    'image' => $product->images[0] ?? '',
                    'color' => $product->colors()->first()?->name ?? '',
                    'created_at' => now(),
                    'product_id' => $id
                ];
            }
            Session::put('basket', $basket);
            return response([
                'message' => 'Məhsul səbətə əlavə olundu',
                'data' => $basket,
                'code' => 200
            ]);
        } catch (\Exception $ex) {
            return response([
                'message' => 'Xəta baş verdi',
                'code' => 500
            ]);
        }
    }

    public function add_to_favorite($id)
    {
        $favorite = Session::get('favorite', []);
        $product = $this->product_service->getProductById($id);
        try {
            if (isset($favorite[$id])) {
                unset($favorite[$id]);
                Session::put('favorite', $favorite);
                return response([
                    'message' => 'Məhsul sevimlilər siyahısından çıxarıldı',
                    'code' => 200
                ]);
            } else {
                $favorite[$id] = [
                    'name' => $product->name,
                    'price' => $product->price - $product->discount,
                    'image' => $product->images[0] ?? '',
                    'slug' => $product->slug,
                    'colors' => $product->colors()->pluck('code')->toArray(),
                    'created_at' => now(),
                    'product_id' => $id,
                ];
                Session::put('favorite', $favorite);
                return response([
                    'message' => 'Məhsul sevimlilər siyahısına əlavə olundu',
                    'code' => 200
                ]);
            }
        } catch (\Exception $ex) {
            return response([
                'message' => 'Xəta baş verdi',
                'code' => 500
            ]);
        }
    }

    public function remove_from_basket(Request $request)
    {
        $product_ids = explode(',', $request->product_ids);
        if ($product_ids == ['']) {
            return response([
                'message' => 'Heç bir məhsul seçilməyib',
                'code' => 405,
            ]);
        }
        $basket = Session::get('basket', []);
        foreach ($product_ids as $product_id) {
            unset($basket[$product_id]);
        }
        Session::put('basket', $basket);
        return response([
            'message' => 'Seçilmiş məhsullar səbətdən silindi',
            'code' => 204
        ]);
    }
}
