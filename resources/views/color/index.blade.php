@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Цвета</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="#">Цвета</a></li>
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
                                <a href="{{ route('color.create') }}" class="btn btn-block btn-primary mb-3">Добавить</a>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive ">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Наименование</th>
                                                <th>HEX</th>
                                                <th>Цвет</th>
                                                <th>Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($colors as $color)
                                                <tr>
                                                    <td>{{ $color->id }}</td>
                                                    <td>{{ $color->title }}</td>
                                                    <td>{{ $color->hex_code }}</td>
                                                    <td>
                                                        <div class="rounded-circle"
                                                            style="width: 30px;height:30px; background-color:{{ $color->hex_code }}">
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <a href="{{ route('color.edit', $color->id) }}">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
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
@endsection
