@extends('admin.layout.main')

@section('container')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Item</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $item->name }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" name="brand" value="{{ $item->brand }}" class="form-control" placeholder="Brand">
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
