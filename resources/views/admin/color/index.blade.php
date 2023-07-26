@extends('admin.layouts.layout')
@php
    $counter = 0;
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Rənglər</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Rənglər</li>
            </ol>
            <a href="{{ route('color.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i>
            </a>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rənglər</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Adı</th>
                            <th scope="col">Çaları</th>
                            <th scope="col">Proseslər</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $color)
                            <tr>
                                <th scope="row">{{ ++$counter }}</th>
                                <td>{{ $color->name }}</td>
                                <td>
                                    <div
                                        style="background-color: {{ $color->code }}; width:45px; height:45px; border-radius:5px">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('color.edit', $color->id) }}" class="btn btn-success">
                                        <i class="bx bxs-edit"></i>
                                    </a>
                                    <a href="{{ route('color.delete', $color->id) }}" class="btn btn-danger delete">
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
