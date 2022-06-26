@extends('layouts.main')
@section('title', 'Просмотр пользователя')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="#">Пользователи</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="card-group">
                        <div class="col-4">
                            <a href="{{ route('user.create') }}" class="btn btn-block btn-primary mb-3">Добавить</a>
                        </div>
                        <div class="col-md-auto">
                            <div class="card ">
                                <div class="card-body">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Имя</th>
                                                <th>Фамилия</th>
                                                <th>Отчество</th>
                                                <th>Возраст</th>
                                                <th>Пол</th>
                                                <th>Email</th>
                                                <th>Права/th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->surname }}</td>
                                                <td>{{ $user->patronymic }}</td>
                                                <td>{{ $user->age }}</td>
                                                <td>{{ $user->gender }}</td>

                                            </tr>
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
