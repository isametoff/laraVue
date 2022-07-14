@extends('layouts.main')
@section('title', 'Продукты')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Продукты</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="#">Продукты</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            <div class="col-md-2">
                                <a href="{{ route('product.create') }}"
                                   class="btn btn-block btn-primary mb-3">Добавить</a>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive ">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th class="col-4 ">Описание</th>
                                            <th>Категория</th>
                                            <th>Цена</th>
                                            <th>Кол-во</th>
                                            <th colspan="3">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->category->title }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->count }}</td>
                                                <td class="text-center"><a
                                                        href="{{ route('product.show', $product->id) }}">
                                                        <i class="far fa-eye"></i></a></td>
                                                <td class="text-center"><a
                                                        href="{{ route('product.edit', $product->id) }}"><i
                                                            class="fas fa-pen"></i></a></td>
                                                <td class="text-center">
                                                    <form action="{{ route('product.delete', $product->id) }}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0">
                                                            <i class="fas fa-trash text-danger" role="button"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="d-flex justify-content-center">
        <div class="mt-3    pagination-wrapper">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
@endsection
