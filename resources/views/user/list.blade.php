<table class="table table-head-fixed table-hover text-nowrap">
    <thead>
        <tr>
            <th>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="checkAll">
                    <label for="checkAll" class="custom-control-label"></label>
                </div>
            </th>
            <th>Quyền hạn</th>
            <th>Email</th>
            <th>Họ và tên</th>
            <th>Trạng thái</th>
            <th>Khoá/Kích hoạt</th>
            <th>Phân quyền</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody id="userList">
        @foreach ($users as $user)
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"
                            id="{{ 'check' . $user->id }}">
                        <label for="{{ 'check' . $user->id }}"
                            class="custom-control-label"></label>
                    </div>
                </td>
                <td>
                    @if ($user->hasRole('admin'))
                        <span class="badge bg-primary text-capitalize">Quản trị viên</span>
                    @elseif ($user->hasRole('department_of_health'))
                        <span class="badge bg-info text-black text-capitalize">sở y tế</span>
                    @elseif($user->hasRole('medical_center'))
                        <span class="badge bg-warning text-capitalize">trung tâm y tế</span>
                    @elseif ($user->hasRole('medical_station'))
                        <span class="badge bg-secondary text-capitalize">trạm y tế</span>
                    @endif
                </td>
                <td>{{ $user->email }}</td>
                <td>
                    <a style="cursor: pointer;" data-toggle="modal"
                        data-target="{{ '#detailUser' . $user->id }}">
                        {{ $user->cadresByUser($user->id_cadres)->ho_ten }} (Click)
                    </a>
                    <div class="modal fade" id="{{ 'detailUser' . $user->id }}">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-uppercase"
                                        id="staticBackdropLabel">thông tin chi tiết</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            @if (file_exists(public_path() . '/images/user/' . $user->anh_dai_dien))
                                                <img src="{{ asset('images/user/' . $user->anh_dai_dien) }}"
                                                    style="height: 300px; width: 300px"
                                                    class="rounded mx-auto d-block"
                                                    alt="{{ $user->anh_dai_dien }}">
                                            @else
                                                <i class="fas fa-user-tie fa-3x"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Chức vụ:
                                                @if ($user->positionByCadres($user->cadresByUser($user->id)->id_position) != null)
                                                    {{ $user->positionByCadres($user->cadresByUser($user->id)->id_position)->ten_chuc_vu }}
                                                @else
                                                    không có
                                                @endif
                                                @if ($user->workUnitByCadres($user->cadresByUser($user->id)->id_work_unit) != null)
                                                    ({{ $user->workUnitByCadres($user->cadresByUser($user->id)->id_work_unit)->ten_dvct }})
                                                @endif
                                            </p>
                                            <p>Chức danh:
                                                @if ($user->titleByCadres($user->cadresByUser($user->id)->id_title) != null)
                                                    {{ $user->titleByCadres($user->cadresByUser($user->id)->id_title)->ten_chuc_danh }}
                                                @else
                                                    không có
                                                @endif
                                            </p>
                                            <p>Chuyên ngành chính:
                                                @if ($user->specializedByCadres($user->cadresByUser($user->id)->id_specialized) != null)
                                                    {{ $user->specializedByCadres($user->cadresByUser($user->id)->id_specialized)->ten_chuyen_nganh }}
                                                @else
                                                    không có
                                                @endif
                                            </p>
                                            <p>Chuyên ngành phụ:
                                                @if ($user->specializedByCadres($user->cadresByUser($user->id)->id_sub_specialized) != null)
                                                    {{ $user->specializedByCadres($user->cadresByUser($user->id)->id_sub_specialized)->ten_chuyen_nganh }}
                                                @else
                                                    không có
                                                @endif
                                            </p>
                                            <p>Ngày sinh:
                                                {{ date('d/m/Y', strtotime($user->cadresByUser($user->id)->ngay_sinh)) }}
                                            </p>
                                            <p>Giới tính:
                                                @switch($user->cadresByUser($user->id)->gioi_tinh)
                                                    @case(1)
                                                        Nam
                                                    @break

                                                    @case(2)
                                                        Nữ
                                                    @break

                                                    @case(3)
                                                        Khác
                                                    @break
                                                @endswitch
                                            </p>
                                            <p>Số điện thoại:
                                                {{ $user->cadresByUser($user->id)->sdt }}
                                            </p>
                                            <p>CMND/CCCD:
                                                {{ $user->cadresByUser($user->id)->so_cmnd }}
                                            </p>
                                            <p>Ngày cấp CMND:
                                                {{ $user->cadresByUser($user->id)->ngay_cap_cmnd }}
                                            </p>
                                            <p>Nơi cấp CMND:
                                                {{ $user->cadresByUser($user->id)->noi_cap_cmnd }}
                                            </p>
                                            <p>Địa chỉ tạm trú:
                                                {{ $user->cadresByUser($user->id)->dia_chi_tt .
                                                    ' (' .
                                                    $user->cadresByUser($user->id)->ma_tinh_tt .
                                                    '-' .
                                                    $user->cadresByUser($user->id)->ma_huyen_tt .
                                                    '-' .
                                                    $user->cadresByUser($user->id)->ma_xa_tt .
                                                    ')' }}
                                            </p>
                                            <p>Địa chỉ hộ khẩu:
                                                {{ $user->cadresByUser($user->id)->dia_chi_hk .
                                                    ' (' .
                                                    $user->cadresByUser($user->id)->ma_tinh_hk .
                                                    '-' .
                                                    $user->cadresByUser($user->id)->ma_huyen_hk .
                                                    '-' .
                                                    $user->cadresByUser($user->id)->ma_xa_hk .
                                                    ')' }}
                                            </p>
                                            <p>Tình trạng công tác:
                                                @switch($user->cadresByUser($user->id_cadres)->tinh_trang_cong_tac)
                                                    @case(0)
                                                        Đã nghĩ hưu
                                                    @break

                                                    @case(1)
                                                        Đang công tác
                                                    @break

                                                    @default
                                                @endswitch
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                @if (!$user->hasRole('admin'))
                    <td>
                        @switch($user->trang_thai)
                            @case(0)
                                <span class="badge bg-danger text-capitalize">bị khóa</span>
                            @break

                            @case(1)
                                <span class="badge bg-primary text-capitalize">đang hoạt động</span>
                            @break
                        @endswitch
                    </td>
                    <td>
                        @switch($user->trang_thai)
                            @case(0)
                                <a class="btn btn-primary btnModalUnlock"
                                    data="{{ '[' . $user->id . ',' . $user->trang_thai . ']' }}">
                                    <i class="fa-solid fa-lock-open"></i>
                                </a>
                            @break

                            @case(1)
                                <a class="btn btn-danger btnModalLock" data-toggle="modal"
                                    data-target="{{ '#modalLock' . $user->id }}">
                                    <i class="fa-solid fa-lock"></i>
                                </a>
                            @break
                        @endswitch
                    </td>
                    <div class="modal fade" id="{{ 'modalLock' . $user->id }}"
                        tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Thông
                                        báo</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn thật sự muốn khóa người dùng này?
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                        class="btn btn-secondary btnLockDisagree"
                                        data-dismiss="modal">Thoát</button>
                                    <button type="button" class="btn btn-primary btnLockAgree"
                                        data="{{ '[' . $user->id . ',' . $user->trang_thai . ']' }}">Đồng
                                        ý</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <td>
                        <a href="{{ route('manager.user.decentralization', ['idUser' => $user->id]) }}"
                            class="btn btn-primary"><i class="fa-solid fa-sliders"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btnModalDelete" data-toggle="modal"
                            data-target="{{ '#modalDelete' . $user->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <div class="modal fade" id="{{ 'modalDelete' . $user->id }}"
                            tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            Thông
                                            báo</h5>
                                        <button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn thật sự muốn xóa người dùng này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-secondary btnDisagree"
                                            data-dismiss="modal">Thoát</button>
                                        <button type="button" class="btn btn-primary btnAgree"
                                            data="{{ '[' . $user->id . ']' }}">Đồng
                                            ý</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
<script src="{{ asset('js/user.js') }}"></script>