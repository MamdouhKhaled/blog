@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>sadasd</h1>
@stop
@section('plugins.Select2', true)
@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    {{-- With multiple slots, and plugin config parameter --}}
    @php
        $config = [
            "placeholder" => "Select multiple options...",
            "allowClear" => true,
        ];
    @endphp
    <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Categories"
                        label-class="text-danger" igroup-size="sm" :config="$config" multiple>
        <option>Sports</option>
        <option>News</option>
        <option>Games</option>
        <option>Science</option>
        <option>Maths</option>
    </x-adminlte-select2>

@stop
