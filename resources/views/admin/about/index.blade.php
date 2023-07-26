@extends('admin.layouts.layout')
@section('content')

        <section class="section">
            <div class="row">
                <div class="col-lg-12">



                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Haqqımızda səhifəsi</h5>
                            @if(session('success'))

                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Multi Columns Form -->
                            <form class="row g-3" action="{{route('admin.about.update')}}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="col-md-12">
                                    <label for="inputEmail5" class="form-label">Başlıq</label>
                                    <input type="text" class="form-control" name="title" value="{{$about->title}}" >
                                </div>



                                <div class="col-md-12">
                                    <label for="inputEmail5" class="form-label">Ətraflı mətn</label>
                                    <textarea class="form-control" name="description" id="editor">{!! $about->description !!}</textarea>

                                </div>




                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Yadda saxla</button>
                                </div>
                            </form><!-- End Multi Columns Form -->

                        </div>
                    </div>

                </div>


            </div>
        </section>

@endsection
