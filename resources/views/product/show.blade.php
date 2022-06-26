@extends('layouts.main')
@section('title', 'Карточка товара')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Карточка товара</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Продукты</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                            <div class="col-12">
                                <img src="{{ Storage::url($product->preview_image) }}" class="product-image"
                                    alt="Product Image">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                <div class="product-image-thumb active"><img
                                        src="{{ Storage::url($product->preview_image) }}" alt="Product Image">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{ $product->title }}</h3>
                            <p>{{ $product->description }}
                            </p>

                            <hr>
                            <h4>Цвета</h4>

                            @foreach ($colors as $color)
                                @if (collect($hex_code)->contains($color->hex_code))
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-default text-center">
                                            <input type="radio" name="color_option" id="color_option_a1"
                                                autocomplete="off" checked="">
                                            {{ $color->title }}
                                            <br>
                                            <div class="m-auto rounded-circle ml-1"
                                                style="width: 30px;height:30px; background-color:{{ $color->hex_code }}">
                                            </div>
                                        </label>
                                    </div>
                                    {{-- <div>
                                                        <p>{{ $color->title }}</p>
                                                        <div class="rounded-circle ml-1"
                                                            style="width: 30px;height:30px; background-color:{{ $color->hex_code }}">
                                                        </div>
                                                    </div> --}}
                                @endif
                            @endforeach

                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    ₽ {{ $product->price }}
                                </h2>
                            </div>
                            <h3 class="mt-4">Описание</h3>
                            <div class="tab-content p-3" id="nav-tabContent">
                                <p class="mb-0">
                                    {{ $product->content }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
    </div>
@endsection
