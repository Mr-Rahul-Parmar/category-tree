@extends('layouts.app_main')
@section('content')
    <div class="container">
        <h2>Create Category</h2>

        <form action="{{ route('category.store') }}" id="categoryCreate" method="post">
            @csrf

            <div class="mb-3 form-error">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" class="form-control required" placeholder="Name" data-msg-required="Name is required">
            </div>

            <div class="mb-3 form-error">
                <label for="parent_id" class="form-label">Parent Category:</label>
                <select name="parent_id" class="form-select" data-msg-required="Parent category is required">
                    <option value="">Select Parent Category</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary saveBtn">Create</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
@section('page-js')
    <script src="{{ url('/assets/js/page/create.js') }}" type="text/javascript"></script>
@endsection
