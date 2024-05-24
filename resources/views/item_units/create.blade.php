@extends('admin.layout.main')

@section('container')
<div class="card">
    <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-light m-2" href="{{ route('item-units.index') }}"> Back</a>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Create New Item Unit</h2>
                    <form action="{{ route('item-units.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="item_id">Item:</label>
                            <select class="form-control" id="item_id" name="item_id">
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} {{  $item->id }} {{ $item->brand}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="condition">Condition:</label>
                            <select name="condition" class="form-control" id="condition">
                                <option value="bagus">Bagus</option>
                                <option value="rusak">Rusak</option>
                                <option value="perlu perbaikan">Perlu Perbaikan</option>
                                <option value="dalam perbaikan">Dalam Perbaikan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
