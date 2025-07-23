

@extends('admin.mst')
@section('konten')

<div class="card">
    <div class="card-header">
        <h6 class="fw-bold">List Home FYP</h6>
    </div>
    <div class="card-body">
        <table class="table" id="myTable" style="font-size: small">
            <thead class="table-light">
                <tr>
                    <th class="align-middle text-center">Username</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $item)
                    <tr>
                        <td>{{ $item->username }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection