@extends('layouts.main')
@section('title', 'Редактирование тэга')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование тэга</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Тэги</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ $tag->title }}</a></li>
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
                        <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-12">
                                <input type="text" class="form-control" name="title" placeholder="Название тэга"
                                    value="{{ $tag->title }}">
                                @error('title')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                        </form>
                        <td class="text-center">
                            <form action="{{ route('tag.delete', $tag->id) }}" method="POST" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger ml-2" value="Удалить">
                            </form>
                        </td>

                    </div>
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
