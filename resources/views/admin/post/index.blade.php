@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categories

    <a href="{{ route("admin.posts.create") }}" class="btn btn-xs btn-default text-primary float-right mx-1 shadow" title="Add New Category">
        <i class="fa fa-lg faF-fw fa-plus"></i>
    </a>
    </h1>
@stop
@section('content')
    <table class="table table-sm table-hover table-bordered ">
        <thead>
        <tr>
            <th width="5" scope="col">#</th>
            <th scope="col">Category</th>
            <th width="5"  scope="col">Comments</th>
            <th width="15"  scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
@foreach($posts as $post)
    <tr>
        <th width="5%" scope="row">{{$post->id}}</th>
        <td>{{ $post->title }}</td>
        <td>{{ $post->comments_count }}</td>
        <td width="15%">

            <form action="{{ route("admin.posts.destroy",['post' => $post->id]) }}" class="form-inline" method="post">
                @csrf()
                @method('delete')
                <a href="{{ route("admin.posts.edit",['post' => $post->id]) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
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
    {{ $posts->onEachSide(5)->links() }}
@stop
