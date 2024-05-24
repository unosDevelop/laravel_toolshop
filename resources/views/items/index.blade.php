@extends('admin.layout.main')

@section('container')
@include('modals.info')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-flex justify-content-end mb-3">
                    <a class="btn btn-primary" href="{{ route('items.create') }}"> Create New Item</a>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Category</th>
                <th width="280px">Action</th>
            </tr>
            @php $i = ($items->currentPage()-1) * $items->perPage(); @endphp
            @foreach ($items as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->brand }}</td>
                <td>{{ $item->category->name }}</td>
                <td>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('items.show', $item->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('items.edit', $item->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex justify-content-right">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
