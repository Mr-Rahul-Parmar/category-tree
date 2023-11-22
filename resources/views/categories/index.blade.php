@extends('layouts.app_main')

@section('content')
    <div class="container">
        <h2>Categories Tree View</h2>
        <div class="text-end">
            <a href="{{ route('category.create') }}" class="btn btn-primary mt-3">Create Category</a>
        </div>
        @include('message_error_success')
        <ul class="list-group">
            @foreach ($categories as $category)
                @include('categories.partials.category_item', ['category' => $category])
            @endforeach
        </ul>
    </div>
@endsection
@section('page-js')
    <script src="{{ url('/assets/js/page/delete.js') }}" type="text/javascript"></script>
@endsection
