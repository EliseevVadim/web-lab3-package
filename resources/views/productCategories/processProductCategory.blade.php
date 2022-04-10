@extends('lab3.abstract-shop-package.layouts.app')

@section('title')
    {{isset($category) ? "Редактировать информацию о категории товаров" : "Добавить категорию товаров"}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{isset($category) ? "Редактировать информацию о категории товаров" : "Добавить категорию товаров"}}
                    </div>
                    <div class="card-body bg-dark">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form enctype="multipart/form-data" action="{{!isset($category) ? "/addProductCategory" : "/updateProductCategory"}}" method="post">
                            @csrf
                            @if(isset($category))
                                <input type="hidden" name="id" value="{{$category->id}}" >
                                {{ @method_field('PUT') }}
                            @endif
                            <div class="form-group">
                                <label for="group-field" class="col-form-label text-light">Введите название категории услуг<sup>*</sup>:</label>
                                <input class="form-control" id="group-field" type="text" name="category_name" required placeholder="Название..." value="{{isset($category) ? $category->category_name : null}}">
                            </div>
                            <span class="text-light">Поля, помеченные звездочкой <sup>*</sup>, обязательны для заполнения!</span>
                            <div class="row d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-primary w-25 mx-1">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
