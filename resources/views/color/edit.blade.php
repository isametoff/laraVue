@extends('layouts.main')
@section('title', 'Редактирование цвета')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('color.index') }}">Цвета</a></li>
                    </ol>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-4 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Редактирование цвета</h3>
                        </div>
                        <form action="{{ route('color.update', $color->id) }}" method="POST">
                            <div class="card-body ">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="inputName">Выберете цвет</label>
                                    <input type="color" class="form-control" id="colorPicker" value="#6a5acd">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">HEX код</label>
                                    <input name="hex_code" class="form-control" type="text" id="box"
                                        value="{{old( 'hex_code', $color->hex_code) }}">
                                </div>
                                @error('hex_code')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                                <div class="form-group">
                                    <label>Наименование</label>
                                    <input name="title" class="form-control" type="text" value="{{ old('title', $color->title) }} ">
                                </div>
                                @error('title')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                                <!-- /.card-body -->
                                <!-- /.card -->
                                <input type="submit" class="btn btn-primary mr-2" value="Обновить">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </div>


    </section>

    </div>

@endsection
