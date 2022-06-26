@extends('layouts.main')
@section('title', 'Редактирование пользователя')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Пользователи</a></li>
                    </ol>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-12 ">
                    <div class="card card-primary ">
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h3 class="card-title">Редактирование пользователя</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="inputDescription">Имя</label>
                                    <input name="name" class="form-control" value="{{ old('name', $user->name) }}">
                                </div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="surname">Фамилия</label>
                                    <input name="surname" class="form-control"
                                        value="{{ old('surname', $user->surname) }}">
                                </div>
                                @error('surname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="patronymic">Отчество</label>
                                    <input name="patronymic" class="form-control"
                                        value="{{ old('patronymic', $user->patronymic) }}">
                                </div>
                                @error('patronymic')
                                    <div class="text-danger">{{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="age">Возраст</label>
                                    <input name="age" class="form-control"value="{{ old('age', $user->age) }}">
                                </div>
                                @error('age')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="gender">Пол</label>
                                    <select class="form-control" name="gender">
                                        @foreach ($genders as $id => $gender)
                                            <option value="{{ $id }}"
                                                {{ $id == old('gender') ? 'selected' : '$user->gender' }}>
                                                {{ $gender }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" class="form-control" value="{{ old('email', $user->email) }}">
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group"><input type="submit" class="btn btn-primary mr-2" value="Обновить">
                                </div>
                        </form>
                        <form action="{{ route('user.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="row justify-content-center">

                </div>
            </div>


        </section>

    </div>

@endsection
