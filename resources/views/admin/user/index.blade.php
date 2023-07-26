@extends('admin.layouts.layout')
@php
    $counter = 0;
@endphp

@section('content')
    <div class="pagetitle">
        <h1>İstifadəçilər</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">İstifadəçilər</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">İstifadəçilər</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">İstifadəçi adı</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Yaranma tarixi</th>
                            <th scope="col">Proseslər</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ ++$counter }}</th>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->active)
                                        <span class="badge bg-success">Verified</span>
                                    @else
                                        <span class="badge bg-warning">Unverified</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->addHours(4)->format('d.M.Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">
                                        <i class="bx bxs-edit"></i>
                                    </a>
                                    <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger delete">
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
