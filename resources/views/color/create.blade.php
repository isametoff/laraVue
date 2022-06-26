@extends('layouts.main')
@section('title', 'Добавление цвета')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('color.index') }}">Цвета</a></li>
                    </ol>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="row justify-content-md-center">
                <form action="{{ route('color.store') }}" method="POST">
                    <div class="col-md-auto">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Добававление цвета</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Выберете цвет</label>
                                    <input type="color" class="form-control" id="colorPicker" value="#6a5acd" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">HEX код</label>
                                    <input name="hex_code" class="form-control" type="text" id="box"
                                        value="{{ old('hex_code') }}">
                                </div>
                                @error('hex_code')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                                <div class="form-group">
                                    <label>Наименование</label>
                                    <input name="title" class="form-control" type="text" value="{{ old('title') }} ">
                                </div>
                                @error('title')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary mr-2" value="Добавить">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
