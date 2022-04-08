<table class="table table-head-fixed table-hover text-nowrap">
    <thead>
        <tr>
            <th>Tên chức vụ</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody id="positionList">
        @foreach ($positions as $position)
            <tr>
                <td>{{ $position->ten_chuc_vu }}</td>
                <td>
                    <button type="button" class="btn btn-primary text-uppercase btnEdit" data-toggle="modal" data-target="{{ '#modalEdit'.$position->id }}">
                        sửa
                    </button>
                    <div class="modal fade" id="{{ 'modalEdit'.$position->id }}">
                        <div class="modal-dialog">
                            <form class="formEditPosition" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-uppercase" id="staticBackdropLabel">sửa chức vụ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="idPosition" value="{{ $position->id }}">
                                        <input type="text" name="namePosition" value="{{ $position->ten_chuc_vu }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default text-capitalize btnEditExit" data-dismiss="modal">thoát</button>
                                        <button type="submit" class="btn btn-primary text-capitalize">sửa</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
                <td><a class="btn btn-danger text-uppercase btnDelete" id-position="{{ $position->id }}">Xóa</a></td>
            </tr>
        @endforeach
    </tbody>
</table>


