@extends('layouts.main')
@section('title', 'Тэги')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Тэги</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="#">Тэги</a></li>
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
                            <a href="{{ route('tag.create') }}" class="btn btn-block btn-primary mb-3">Добавить</a>
                        </div>
                        <div class="col-md-auto">
                            <div class="card ">
                                <div class="card-body">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Наименование</th>
                                                <th colspan="2">Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tags as $tag)
                                                <tr>
                                                    <td>{{ $tag->id }}</td>
                                                    <td>{{ $tag->title }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('tag.edit', $tag->id) }}"><i
                                                                class="fas fa-pen"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('tag.delete', $tag->id) }}"
                                                            method="POST">
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
