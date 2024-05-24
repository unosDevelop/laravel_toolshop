@extends('admin.layout.main')

@section('container')
@include('modals.info')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('item-units.create') }}" class="btn btn-primary">Add Unit</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Item Name</th>
                            <th>Unit Code</th>
                            <th>Condition</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($itemUnits as $key => $itemUnit)
                            <tr>
                                <td>{{ $itemUnits->firstItem() + $key }}</td>
                                <td>{{ $itemUnit->item->name }}</td>
                                <td>{!! DNS1D::getBarcodeHTML("$itemUnit->unit_code", 'PHARMA') !!}</td>
                                <td>
                                    <div class="progress-bar">
                                        @if($itemUnit->condition == 'baik')
                                            <div class="progress-bar bg-success" style="width: 100%;">Baik</div>
                                        @elseif($itemUnit->condition == 'rusak')
                                            <div class="progress-bar bg-danger" style="width: 100%;">Rusak</div>
                                        @elseif($itemUnit->condition == 'perlu diperbaiki')
                                            <div class="progress-bar bg-warning" style="width: 100%;">Perlu Diperbaiki</div>
                                        @elseif($itemUnit->condition == 'sedang diperbaiki')
                                            <div class="progress-bar bg-info" style="width: 100%;">Sedang Diperbaiki</div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('item-units.show',$itemUnit->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('item-units.edit',$itemUnit->id) }}">Edit</a>
                                    <form action="{{ route('item-units.destroy', $itemUnit->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $itemUnits->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
