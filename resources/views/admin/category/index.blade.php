@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categories

    <a href="{{ route("admin.categories.create") }}" class="btn btn-xs btn-default text-primary float-right mx-1 shadow" title="Add New Category">
        <i class="fa fa-lg faF-fw fa-plus"></i>
    </a>
    </h1>
@stop
@section('content')
    <table class="table table-sm table-hover table-bordered ">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Posts</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
@foreach($categories as $category)
    <tr>
        <th width="5%" scope="row">{{$category->id}}</th>
        <td><a href="{{ route("admin.categories.show",['category' => $category->id]) }}">
                {{ $category->title }}
            </a></td>
        <td>{{ $category->posts_count   }}</td>
        <td width="15%">

            <form action="{{ route("admin.categories.destroy",['category' => $category->id]) }}" class="form-inline" method="post">
                @csrf()
                @method('delete')
                <a href="{{ route("admin.categories.edit",['category' => $category->id]) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>
                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach

        </tbody>
    </table>
    {{ $categories->onEachSide(5)->links() }}
@stop
