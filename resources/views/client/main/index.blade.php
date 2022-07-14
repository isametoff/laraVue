@extends('layouts.main')
@section('title', 'Главная')
@section('content')

    {{-- <body class="hold-transition sidebar-mini layout-fixed"> --}}
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Админ панель</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>Заказы</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>                                </div>
                                <a href="#" class="small-box-footer">Подробнее <i
                                        class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $productCount }}<sup style="font-size: 20px"> %</sup></h3>
                                    <p>Продукты </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-tshirt"></i>                                </div>
                                <a href="{{ route('product.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right">
                                    </i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $data['usersCount'] }}</h3>
                                    <p>Пользователи </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-id-card"></i>                                </div>
                                <a href="{{ route('user.index') }}" class="small-box-footer">Подробнее <i
                                        class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Отзывы</p>
                                </div>
                                <div class="icon">
                                    {{-- <i class="ion ion-pie-graph"></i> --}}
                                    <i class=" fas fa-comment"></i>
                                </div>
                                <a href="#" class="small-box-footer">Подробнее <i
                                        class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    @endsection
