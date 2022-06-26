@extends('layouts.main')
@section('title', 'Добавление пользователей')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Пользователи</a></li>
                    </ol>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="row justify-content-md-center">
                <form action="{{ route('user.store') }}" method="POST">
                    <div class="col-md-auto">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Добававление пользователей</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="inputDescription">Имя</label>
                                    <input name="name" type="text" class="form-control" value="{{ old('name') }}" autofocus>
                                </div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="surname">Фамилия</label>
                                    <input name="surname" type="text" class="form-control"
                                        value="{{ old('surname') }}">
                                </div>
                                @error('surname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="patronymic">Отчество</label>
                                    <input name="patronymic" type="text" class="form-control"
                                        value="{{ old('patronymic') }}">
                                </div>
                                @error('patronymic')
                                    <div class="text-danger">{{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="age">Возраст</label>
                                    <select class="form-control" name="age">
                                        @for($i = 18; $i <= 50;)
                                            <option value="{{ $i }}"
                                                {{ $i == old('age') ? 'selected' : '' }}>
                                                {{ $i++ }}</option>
                                        @endfor
                                    </select>
                                </div>
                                @error('age')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="gender">Пол</label>
                                    <select class="form-control" name="gender">
                                        @foreach ($genders as $id => $gender)
                                            <option value="{{ $id }}"
                                                {{ $id == old('gender') ? 'selected' : '' }}>
                                                {{ $gender }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input name="password" type="password" class="form-control">
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                {{-- <div class="password-confirm">
                                    <label for="inputDescription">Подтвердите пароль</label>
                                    <input name="password-confirm" type="password" class="form-control">
                                </div>
                                @error('password-confirm')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary mr-2" value="Регистрация">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
