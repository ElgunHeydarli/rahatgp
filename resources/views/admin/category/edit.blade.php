@extends('admin.layouts.layout')

@section('content')
    <div class="pagetitle">
        <h1>Kateqoriyalar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">Kateqoriyalar</a></li>
                <li class="breadcrumb-item active">{{ $category->name }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <h5 class="card-title">Kateqoriya redaktə etmə formu</h5>

                    <!-- General Form Elements -->
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Başlıq</label>
                            <input type="text" value="{{ $category->name }}" name="name" class="form-control"
                                placeholder="Başlıq">
                            @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Təsdiq et</button>
                        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Geri</a>

                    </form><!-- End General Form Elements -->

                </div>
            </div>
        </div>
    </section>
@endsection
