@extends('layouts.app_main')

@section('content')
    <div class="container">
        <h2>Category Details</h2>

        <p><strong>Name:</strong> {{ $category->name }}</p>

        @if ($category->parent)
            <p><strong>Parent Category:</strong> {{ $category->parent->name }}</p>
        @else
            <p><strong>Parent Category:</strong> None</p>
        @endif

        @if ($category->children->count() > 0)
            <p><strong>Child Categories:</strong>
            <ul>
                @foreach ($category->children as $child)
                    <li>{{ $child->name }}</li>
                @endforeach
            </ul>
            </p>
        @else
            <p><strong>Child Categories:</strong> None</p>
        @endif

        <a href="{{ route('category.index') }}" class="btn btn-primary mt-3">Back to Categories</a>
    </div>
@endsection
