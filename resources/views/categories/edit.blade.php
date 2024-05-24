@extends('admin.layout.main')

@section('container')
<div class="card">
    <div class="d-grid gap-2 d-md-block">
        <a href="{{ route('categories.index') }}" class="btn btn-light m-2">Back</a>
    </div>
    <div class="card-body">
        <div class="container">
            <h1>Edit Category</h1>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
