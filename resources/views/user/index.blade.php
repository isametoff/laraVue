@extends('layouts.main')
@section('title', 'Пользователи')
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
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            <div class="col-md-2">
                                <a href="{{ route('user.create') }}" class="btn btn-block btn-primary mb-3">Добавить</a>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive ">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Имя</th>
                                                <th>Фамилия</th>
                                                <th>Отчество</th>
                                                <th>Возраст</th>
                                                <th>Пол</th>
                                                <th>Email</th>
                                                <th colspan="3">Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->surname }}</td>
                                                    <td>{{ $user->patronymic }}</td>
                                                    <td>{{ $user->age }}</td>
                                                    <td>
                                                        @if ($user->gender == 0)
                                                            {{ 'Мужской' }}
                                                        @else
                                                            {{ 'Женский' }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td class="text-center"><a
                                                            href="{{ route('user.show', $user->id) }}">
                                                            <i class="far fa-eye"></i></a></td>
                                                    <td class="text-center"><a
                                                            href="{{ route('user.edit', $user->id) }}"><i
                                                                class="fas fa-pen"></i></a></td>
                                                    <td class="text-center">
                                                        <form action="{{ route('user.delete', $user->id) }}"
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
@endsection
