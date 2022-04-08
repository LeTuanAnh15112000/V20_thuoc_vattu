@extends('layouts.app')
@section('content')

    {{-- Infomation --}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{-- Session thông báo --}}
        @include('notification')

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-capitalize">thông tin cá nhân</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"
                                    class="text-capitalize">bảng điều khiển</a></li>
                            <li class="breadcrumb-item active text-capitalize">thông tin cá nhân</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('images/user/' . Auth::user()->anh_dai_dien) }}"
                                        alt="User profile picture" id="nav-maintop-avatar">
                                </div>

                                <h3 class="profile-username text-center" id="nav-maintop-name">
                                    {{ Auth::user()->ho_va_ten }}
                                </h3>
                                <p class="text-center" id="nav-maintop-email">{{ Auth::user()->email }}</p>
                                <p class="text-muted text-center text-capitalize">
                                    @if (Auth::user()->hasRole('admin'))
                                        <span class="badge bg-primary text-capitalize">Quản trị viên</span>
                                    @elseif (Auth::user()->hasRole('department_of_health'))
                                        <span class="badge bg-info text-black text-capitalize">sở y tế</span>
                                    @elseif(Auth::user()->hasRole('medical_center'))
                                        <span class="badge bg-warning text-capitalize">trung tâm y tế</span>
                                    @elseif (Auth::user()->hasRole('medical_station'))
                                        <span class="badge bg-secondary text-capitalize">trạm y tế</span>
                                    @endif
                                </p>
                                <div class="row">
                                    <div class="col">
                                        <form action="#" method="POST">
                                            @csrf
                                            <button class="btn btn-success">
                                                <i class="fas fa-exchange-alt"></i> Đổi mật khẩu</button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Đăng
                                                xuất</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Chi tiết --}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">thông tin chi tiết</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Ngày sinh</strong>
                                <p class="text-muted">{{ date('d/m/Y', strtotime(Auth::user()->ngay_sinh)) }}</p>
                                <hr>

                                <strong><i class="fas fa-book mr-1"></i> giới tính</strong>
                                <p class="text-muted">{{ Auth::user()->gioi_tinh }}</p>
                                <hr>

                                <strong><i class="fas fa-book mr-1"></i> CMND/CCCD</strong>
                                <p class="text-muted">{{ Auth::user()->cmnd_or_cccd }}</p>
                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Khu vực trực thuộc</strong>
                                <p class="text-muted">{{ Auth::user()->ID_MEDICAL_LOCATION }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> dân tộc</strong>
                                <p class="text-muted">{{ Auth::user()->id_ethnic }}</p>
                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> số điện thoại</strong>
                                <p class="text-muted">{{ Auth::user()->sdt }}</p>
                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> email</strong>
                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> địa chỉ</strong>
                                <p class="text-muted">{{ Auth::user()->dia_chi }}</p>
                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> chứng chỉ hành nghề trong y khoa</strong>
                                <p class="text-muted">
                                    @if (Auth::user()->chung_chi_hanh_nghe == '')
                                        <span>không có chứng chỉ</span>
                                    @else
                                        <span>{{ Auth::user()->chung_chi_hanh_nghe }}</span>
                                    @endif
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link text-capitalize active"
                                            href="#tabUpdateUser" data-toggle="tab">Cập nhật thông tin người dùng</a></li>
                                    <li class="nav-item"><a class="nav-link text-capitalize" href="#settings"
                                            data-toggle="tab">cập nhật thông tin đối tượng</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="tabUpdateUser">
                                        <form id="fUpdateUser" class="form-horizontal text-capitalize"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="userId" id="userId"
                                                value="{{ Auth::user()->id }}">

                                            <div class="row">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        @if (file_exists('images/user/' . Auth::user()->anh_dai_dien))
                                                            <img class="profile-user-img img-fluid img-circle"
                                                                style="cursor: pointer;" data-bs-toggle="modal"
                                                                data-bs-target="#btnShowImage"
                                                                src="{{ asset('images/user/' . Auth::user()->anh_dai_dien) }}"
                                                                alt="">
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="btnShowImage" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div
                                                                    class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        @if (file_exists('images/user/' . Auth::user()->anh_dai_dien))
                                                                            <img src="{{ asset('images/user/' . Auth::user()->anh_dai_dien) }}"
                                                                                style="height: 300px; width: 300px"
                                                                                class="rounded mx-auto d-block"
                                                                                alt="{{ asset(Auth::user()->anh_dai_dien) }}">
                                                                        @else
                                                                            <i class="fas fa-user-tie fa-3x"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <i class="fas fa-user-tie fa-5x"></i>
                                                        @endif
                                                    </div>
                                                    <div class="profile-username text-center">
                                                        <label for="exampleInputFile" class="form-label text-capitalize"
                                                            id="display-image">đổi ảnh <i
                                                                class="fas fa-upload"></i></label>
                                                        <input type="file" class="custom-file-input" id="anhDaiDien"
                                                            name="anhDaiDien" onchange="getImage(this.value)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tên người dùng</label>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="tenNguoiDung"
                                                        id="tenNguoiDung" placeholder="Tên người dùng"
                                                        value="{{ Auth::user()->ho_va_ten }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-3 col-form-label">email</label>
                                                <div class="col">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="họ và tên" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-3 col">
                                                    <button type="submit" class="btn btn-success text-capitalize">cập
                                                        nhật</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-danger">
                                                    10 Feb. 2014
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i>
                                                        12:05</span>

                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                        email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 5 mins
                                                        ago</span>

                                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                                        accepted your friend request
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-warning"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 27 mins
                                                        ago</span>

                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your
                                                        post</h3>

                                                    <div class="timeline-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                            comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-success">
                                                    3 Jan. 2014
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 2 days
                                                        ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new
                                                        photos</h3>

                                                    <div class="timeline-body">

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="settings">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Hiển thị ảnh --}}
    <script>
        function getImage(imageName) {
            $('#display-image').html(imageName);
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#fUpdateUser').submit(function(e) {
                e.preventDefault();

                let formData = new FormData($('#fUpdateUser')[0]);
                $.ajax({
                    url: "http://127.0.0.1:8000/manager/update-user",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if(response.status == 200){
                            console.log(response.msgSuccess);
                        }else{
                            console.log(response.msgError);
                        }
                        // $('#nav-left-avatar').attr('src', response.avatar);
                        // $('#nav-left-name').html(response.name);
                        // $('#nav-maintop-avatar').html(response.avatar);
                        // $('#nav-maintop-name').html(response.name);
                        // $('#nav-maintop-email').html(response.email);
                        // toastr.success(response.success);
                    },
                });
            });
        });
    </script>
@endsection
