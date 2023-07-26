@extends('admin.layouts.layout')
@php
    $counter = 0;
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Məhsullar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Məhsullar</li>
            </ol>
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i>
            </a>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Məhsullar</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Şəkli</th>
                            <th scope="col">Adı</th>
                            <th scope="col">Mənsub olduğu link</th>
                            <th scope="col">Qiyməti</th>
                            <th scope="col">Rəngləri</th>
                            <th scope="col">Proseslər</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ ++$counter }}</th>
                                <td>
                                    <img src="{{ asset('uploads/products/' . $product->images[0]) }}" width="60"
                                        height="60" alt="">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <a href="{{ $product->cat ? \URL::to('/mehsullar') . '/' . $product?->cat?->slug : '' }}"
                                        target="_blank">{{ $product->cat ? \URL::to('/mehsullar') . '/' . $product?->cat?->slug : '' }}</a>
                                </td>
                                <td>{{ $product->price - $product->discount }}</td>
                                <td>{{ implode(',', $product->colors->pluck('name')->toArray()) }}</td>
                                <td>
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success">
                                        <i class="bx bxs-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.product.delete', $product->id) }}"
                                        class="btn btn-danger delete">
                                        <i class="bx bxs-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="https://sweetalert2.min.css">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let deletes = document.querySelectorAll('.delete');
        deletes.forEach(del => {
            del.addEventListener('click', function(e) {
                e.preventDefault();
                let url = del.getAttribute('href');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Silmək istədiyinizdən əminsiniz mi?',
                    text: "Silindikdən sonra geri qaytarmaq mümkün olmayacaq!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Bəli!',
                    cancelButtonText: 'Xeyr!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(url)
                            .then(res => res.json())
                            .then(data => {
                                if (data.code == 204) {
                                    swalWithBootstrapButtons.fire(
                                        'Silindi',
                                        data.message,
                                        'success'
                                    );

                                    setTimeout(() => {
                                        window.location.reload();
                                    }, 1500);
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        'Silinmədi',
                                        data.message,
                                        'error'
                                    )
                                }
                            })
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Silinmədi',
                            'error'
                        )
                    }
                })
            });
        });
    </script>
@endpush
