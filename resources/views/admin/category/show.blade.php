@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ isset($category) ? 'Update' : 'Add'}} Category</h1>
@stop
@section('content')
    <form action="{{isset($category) ? route('admin.categories.update', ['category' => $category->id]) : route('admin.categories.store')}}" method="post">
        @csrf()
        @if(isset($category))
            @method('PUT')
        @endif
        {{-- Minimal --}}
        <x-adminlte-input name="title" value="{{ $category->title ?? old('title') }}"/>
        <x-adminlte-button class="btn-sm" type="submit" label="Save" theme="outline-danger" icon="fas fa-lg fa-plus"/>
    </form>

@stop
