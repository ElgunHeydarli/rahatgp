<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\EditRequest;
use App\Models\Category;
use App\Models\Color;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product_service;
    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product_service->getAllProducts();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('admin.product.create', compact('colors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $data['images'] = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                array_push($data['images'], FileManager::fileUpload($file, 'products'));
            }
        }
        $this->product_service->insertProduct($data);
        toastr('Məhsul əlavə olundu');
        return redirect()->route('admin.products');
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
        $product = $this->product_service->getProductById($id);
        $colors = Color::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('admin.product.edit', compact('product', 'colors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $data = $request->validated();
        $product = $this->product_service->getProductById($id);
        if ($request->hasFile('images')) {
            $data['images'] = [];
            foreach ($product->images as $image) {
                FileManager::fileDelete('products', $image);
            }

            foreach ($request->file('images') as $file) {
                array_push($data['images'], FileManager::fileUpload($file, 'products'));
            }
        }
        $this->product_service->updateProduct($product, $data);

        toastr('Məhsul redaktə olundu');
        return redirect()->route('admin.products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->product_service->deleteProduct($id);
            return response([
                'message' => 'Məhsul silindi',
                'code' => 204,
            ]);
        } catch (\Exception $ex) {
            return response([
                'message' => 'Silərkən xəta baş verdi',
                'code' => 500
            ]);
        }
    }
}
