
@extends('admin.mst')
@section('konten')

<div class="card">
    <div class="card-header">
        <h6 class="fw-bold">Master User</h6>
    </div>
    <div class="card-body">
        <table class="table" id="myTable" style="font-size: small">
            <thead class="table-light">
                <tr>
                    <th class="align-middle text-center">Name</th>
                    <th class="align-middle text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update{{ $item->id }}">
                                Update
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="update{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title" id="staticBackdropLabel">Update {{ $item->name }}</h6>
                                    <button type="button" data-dismiss="modal" aria-label="Close">X</button>
                                </div>
                                <form class="formLoad" action="{{ route('updateUser', encrypt($item->id)) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body my-0">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label">Code</label>
                                                <input class="form-control" type="text" value="{{ $item->code }}" placeholder="" readonly>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label">Is Success</label>
                                                <input class="form-control" name="is_success" type="text" value="{{ $item->is_success }}" placeholder="Input..">
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label">Code Success</label>
                                                <input class="form-control" name="code_success" type="text" value="{{ $item->code_success }}" placeholder="Input..">
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label">Is Wrong PW</label>
                                                <input class="form-control" name="is_wrong_pw" type="text" value="{{ $item->is_wrong_pw }}" placeholder="Input..">
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label">Is Not 12</label>
                                                <input class="form-control" name="is_not_12" type="text" value="{{ $item->is_not_12 }}" placeholder="Input..">
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label">Is Verif Code</label>
                                                <input class="form-control" name="is_verif_code" type="text" value="{{ $item->is_verif_code }}" placeholder="Input..">
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <label class="form-label">Verif Code</label>
                                                <input class="form-control" type="text" value="{{ $item->verif_code }}" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                        <button type="submit" id="submitButton" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection