@extends('layouts.main')
@section('title', 'Добавление групп')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление группы</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('group.index') }}">Группы</a></li>
                            <li class="breadcrumb-item"><a href="#">Добавление группы</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <form action="{{ route('group.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group col-12">
                                <input name="title" type="text" class="form-control" value="{{ old('title') }}"
                                    placeholder="Название группы" autofocus>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
