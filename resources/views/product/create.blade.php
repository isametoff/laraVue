@extends('layouts.main')
@section('title', 'Добавление продукта')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <section class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Продукты</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid mt-4 col px-md-4">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card card-default" data-select2-id="53">
                    <div class="card-header">
                        <h3 class="card-title">Добавление продукта</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" data-select2-id="52">
                        <div class="row" data-select2-id="51">
                            <div class="col-md-6" data-select2-id="62">
                                <div class="form-group">
                                    <div class="form-group" data-select2-id="29">
                                        <label>Название</label>
                                        <input type="text" name="title" value="{{ old('title') }} " autofocus
                                            class="form-control" placeholder="Название">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <div class="form-group" data-select2-id="29">
                                        <label>Описание</label>
                                        <input type="text" name="description" value="{{ old('description') }}"
                                            class="form-control" placeholder="Описание">
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group" data-select2-id="29">
                                        <label>Контент</label>
                                        <textarea type="text" class="form-control" name="content" rows="5" placeholder="Контент">{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Добавить изображение</label>
                                    <div class="input-group ">
                                        <div class="custom-file">
                                            <label class="custom-file-label">Выбрать изображение</label>
                                            <input type="file" class="custom-file-input" name="preview_image">
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Добавить изображение</label>
                                    <div class="input-group ">
                                        <div class="custom-file">
                                            <label class="custom-file-label">Выбрать изображение</label>
                                            <input type="file" class="custom-file-input" name="product_images[]">
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Добавить изображение</label>
                                    <div class="input-group ">
                                        <div class="custom-file">
                                            <label class="custom-file-label">Выбрать изображение</label>
                                            <input type="file" class="custom-file-input" name="product_images[]">
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Добавить изображение</label>
                                    <div class="input-group ">
                                        <div class="custom-file">
                                            <label class="custom-file-label">Выбрать изображение</label>
                                            <input type="file" class="custom-file-input" name="product_images[]">
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6" data-select2-id="30">
                                <div class="form-group" data-select2-id="41">
                                    <label>Тэги</label>
                                    <select name="tags[]" class="select2 select2-hidden-accessible" multiple=""
                                        data-placeholder="Select a State" style="width: 100%;" data-select2-id="7"
                                        tabindex="-1" aria-hidden="true">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                                                {{ $tag->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group" data-select2-id="42">
                                    <label>Цветa</label>
                                    <select name="colors[]" class="select2 select2-hidden-accessible" multiple=""
                                        data-placeholder="Select a State" style="width: 100%;" data-select2-id="8"
                                        tabindex="-1" aria-hidden="true">
                                        @foreach ($colors as $color)
                                            <option {{ collect(old('colors'))->contains($color->id) ? 'selected' : '' }}
                                                value="{{ $color->id }}">
                                                {{ $color->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('colors')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Категории</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ collect(old('category_id'))->contains($category->id) ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Количество на складе</label>
                                    <input name="count" value="{{ old('count') }}" class="form-control" type="integer">
                                    @error('count')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group" data-select2-id="29">
                                    <label>Цена</label>
                                    <input name="price" value="{{ old('price') }}" class="form-control"
                                        type="integer">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group" data-select2-id="29">
                                    <label>Старая цена</label>
                                    <input name="old_price" value="{{ old('old_price') }}" class="form-control"
                                        type="integer">
                                    @error('old_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->
@endsection
