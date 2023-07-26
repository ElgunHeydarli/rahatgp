<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        if (Category::where(['name' => $data['name']])->first()) {
            toastr('Bu kateqoriya mövcuddur', 'error');
            return redirect()->back();
        }
        $data['slug'] = Str::slug($data['name']);
        Category::create($data);
        toastr('Kateqoriya əlavə olundu');
        return redirect()->route('admin.categories');
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validated();
        if (Category::where(['name' => $data['name']])->where('id', '!=', $id)->first()) {
            toastr('Bu kateqoriya mövcuddur', 'error');
            return redirect()->back();
        }
        $data['slug'] = Str::slug($data['name']);
        $category->update($data);
        toastr('Kateqoriya redaktə edildi');
        return redirect()->route('admin.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        try {
            $category->delete();
            return response([
                'message' => 'Kateqoriya silindi',
                'code' => 204,
            ]);
        } catch (\Exception $ex) {
            return response([
                'message' => 'Silərkən xəta baş verdi',
                'code' => 500,
            ]);
        }
    }
}
