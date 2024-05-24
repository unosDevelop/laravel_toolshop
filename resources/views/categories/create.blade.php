@extends('admin.layout.main')

@section('container')
<div class="card">
    <div class="d-grid gap-2 d-md-block">
        <a href="{{ route('categories.index') }}" class="btn btn-light m-2">Back</a>
    </div>
    @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="card-body">
        <h5>Tambahkan Kategori Barang</h5>
        <div class="container">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
