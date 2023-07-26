@extends('admin.layouts.layout')
@php
    $counter = 0;
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Sifariş</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Sifariş</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sifarişlər</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">İstifadəçi</th>
                            <th scope="col">Ümumi dəyər</th>
                            <th scope="col">Sifariş tarixi</th>
                            <th scope="col">Sifariş statusu</th>
                            <th scope="col">Proseslər</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ ++$counter }}</th>
                                <td>
                                    {{ $order->user?->name ?? 'Anomim' }}
                                </td>
                                <td>{{ $order->total }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->datetime)->format('d.m.Y') }}</td>
                                <td>
                                    @if ($order->status == 0)
                                        <span class="badge bg-info">Gözləmədə</span>
                                    @elseif($order->status == 1)
                                        <span class="badge bg-primary">Qəbul olunub</span>
                                    @else
                                        <span class="badge bg-danger"> İmtina olunub</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.order.detail', $order->id) }}" class="btn btn-info">
                                        <i class="bx bxs-info-circle"></i>
                                    </a>
                                    @if ($order->status != 1)
                                        <a href="{{ route('admin.order.change-status', $order->id) }}?status=1"
                                            class="btn btn-success">
                                            <i class="bx bx-check"></i>
                                        </a>
                                    @endif
                                    @if ($order->status != 2)
                                        <a href="{{ route('admin.order.change-status', $order->id) }}?status=2"
                                            class="btn btn-danger">
                                            <i class="bx bx-x"></i>
                                        </a>
                                    @endif
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
