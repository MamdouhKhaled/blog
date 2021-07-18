@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ isset($post) ? 'Update' : 'Add'}} Post</h1>
@stop
@section('content')
    <form action="{{isset($post) ? route('admin.posts.update', ['post' => $post->id]) : route('admin.posts.store')}}" method="post">
        @csrf()
        @if(isset($post))
            @method('PUT')
        @endif
        {{-- Minimal --}}
        <x-adminlte-input name="title" value="{{ $post->title ?? old('title') }}"/>

        <x-adminlte-textarea name="content">{{ $post->content ?? old('content') }}

        </x-adminlte-textarea>
        <x-adminlte-select name="category_id">
            <option>None</option>
            @foreach($categories as $category)
                <option {{ (isset($post) && $category->id === $post->category_id) ? "selected='selected'": "" }} value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-button class="btn-sm" type="submit" label="Save" theme="outline-danger" icon="fas fa-lg fa-plus"/>
    </form>

@stop
