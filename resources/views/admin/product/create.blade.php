@extends('admin.layouts.layout')

@section('content')
    <div class="pagetitle">
        <h1>Məhsullar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Məhsullar</a></li>
                <li class="breadcrumb-item active">Əlavə et</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <h5 class="card-title">Məhsul əlavə etmə formu</h5>

                    <!-- General Form Elements -->
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Məhsulun adı</label>
                            <input type="text" name="name" class="form-control" placeholder="Məhsul adı">
                            @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Brend </label>
                            <input type="text" name="brand" class="form-control" placeholder="Brend">
                            @error('brand')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Kateqoriya</label>
                            <input type="text" name="category" class="form-control" placeholder="Kateqoriya">
                            @error('category')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Cinsi </label>
                            <select name="gender" id="" class="form-select">
                                <option value="">Seçim edin</option>
                                <option value="1">Kişi</option>
                                <option value="2">Qadın</option>
                                <option value="3">Unisex</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Məhsul qrupu</label>
                            <input type="text" name="product_group" class="form-control" placeholder="Məhsul qrupu">
                            @error('product_group')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Maksimum çatdırılma vaxtı</label>
                            <input type="text" name="delivery_time" class="form-control"
                                placeholder="Maksimum çatdırılma vaxtı">
                            @error('delivery_time')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Pulsuz karqo</label>
                            <input type="text" name="free_cargo" class="form-control" placeholder="Pulsuz karqo">
                            @error('free_cargo')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Məhsulun qiyməti</label>
                            <input type="text" name="price" class="form-control" placeholder="Məhsulun qiyməti">
                            @error('price')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Endirimli qiymət</label>
                            <input type="text" name="discount" class="form-control" placeholder="Endirimli qiymət">
                            @error('discount')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Məhsul haqqında</h5>

                                    <!-- TinyMCE Editor -->
                                    <textarea class="tinymce-editor" name="details">
                                    </textarea><!-- End TinyMCE Editor -->

                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Material</h5>

                                    <!-- TinyMCE Editor -->
                                    <textarea class="tinymce-editor" name="material">
                                    </textarea><!-- End TinyMCE Editor -->

                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="">Rənglər</label>
                            <select name="colors[]" multiple id="" style="width: 100%"
                                class="js-basic-example-multiple">
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="">Mənsub olduğu link</label>
                            <select name="category_id" id="" style="width: 100%"
                                class="js-basic-example-single">
                                <option value="">Seçim edin</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ URL::to('/mehsullar') . '/' . $category->slug }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="">Məhsulun şəkilləri</label>
                            <input type="file" multiple name="images[]" class="form-control">
                            @error('images')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Təsdiq et</button>
                        <a href="{{ route('admin.products') }}" class="btn btn-secondary">Geri</a>
                </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
        </div>
    </section>
@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.js-basic-example-single').select2();
        $('.js-basic-example-multiple').select2();
    </script>
@endpush
