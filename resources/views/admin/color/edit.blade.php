@extends('admin.layouts.layout')

@section('content')
    <div class="pagetitle">
        <h1>Rənglər</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('colors') }}">Rənglər</a></li>
                <li class="breadcrumb-item active">{{ $color->name }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <h5 class="card-title">Rəng redaktə etmə formu</h5>

                    <!-- General Form Elements -->
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Rəngin adı</label>
                            <input type="text" value="{{ $color->name }}" name="name" class="form-control"
                                placeholder="Rəngin adı">
                            @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Rəngin çaları</label>
                            <input type="color" name="code" style="width:100px;" value="{{ $color->code }}"
                                class="form-control">
                            @error('code')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Təsdiq et</button>
                        <a href="{{ route('admin.products') }}" class="btn btn-secondary">Geri</a>

                    </form><!-- End General Form Elements -->

                </div>
            </div>
        </div>
    </section>
@endsection
