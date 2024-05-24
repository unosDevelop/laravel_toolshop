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
                    <h2>Show Item Unit</h2>
                    <div class="form-group">
                        <label for="item_id">Item Name:</label>
                        <p>{{ $itemUnit->item->name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="unit_code">Unit Code:</label>
                        <p>{{ $itemUnit->unit_code }}</p>
                    </div>
                    <div class="form-group">
                        <label for="condition">Condition:</label>
                        <p>{{ $itemUnit->condition }}</p>
                    </div>
                    <a class="btn btn-primary" href="{{ route('item-units.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
