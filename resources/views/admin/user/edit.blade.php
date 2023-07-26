@extends('admin.layouts.layout')

@section('content')
    <div class="pagetitle">
        <h1>İstifadəçilər</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users') }}">İstifadəçilər</a></li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <h5 class="card-title">İstifadəçi redaktə etmə formu</h5>

                    <!-- General Form Elements -->
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">İstifadəçi adı</label>
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                                placeholder="İstifadəçi adı">
                            @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" value="{{ $user->email }}" name="email" class="form-control"
                                placeholder="Email">
                            @error('email')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Şifrə</label>
                            <input type="password" name="password" class="form-control" placeholder="Şifrə">
                            @error('password')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Təsdiq et</button>
                        <a href="{{ route('users') }}" class="btn btn-secondary">Geri</a>

                    </form><!-- End General Form Elements -->

                </div>
            </div>
        </div>
    </section>
@endsection
