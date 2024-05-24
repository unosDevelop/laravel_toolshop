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
                    <h5>Edit Item Unit</h5>
                    <form action="{{ route('item-units.update', $itemUnit->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="item_id">Item ID:</label>
                            <input type="text" class="form-control" id="item_id" name="item_id" value="{{ $itemUnit->item_id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="unit_code">Unit Code:</label>
                            <input type="text" class="form-control" id="unit_code" name="unit_code" value="{{ $itemUnit->unit_code }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="condition">Condition:</label>
                            <select class="form-control" id="condition" name="condition">
                                <option value="baik" {{ $itemUnit->condition == 'baik' ? 'selected' : '' }}>Baik</option>
                                <option value="rusak" {{ $itemUnit->condition == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="perlu diperbaiki" {{ $itemUnit->condition == 'perlu diperbaiki' ? 'selected' : '' }}>Perlu diperbaiki</option>
                                <option value="sedang diperbaiki" {{ $itemUnit->condition == 'sedang diperbaiki' ? 'selected' : '' }}>Sedang diperbaiki</option>
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
