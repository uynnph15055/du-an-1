@extends('admin.layouts.baseAdmin')
@section('title', 'Thông tin admin')
@section('main_content')
<div id="content">
    <h3 class="text-center" style="margin-bottom: 30px;">Thông tin cá nhân</h3>
    <div class="container-fluid">
        <div class="container">
            <div class="profile_admin">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img style="width: 175px; height: 175px; border-radius: 50%;margin-left:12px" class="img-fluid" src="./public/img/{{$admin['img']}}" alt="Maxwell Admin">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <br>
                                        <h6 class="text-center">Admin</h6>
                                        <h5 class="user-name" style="color:brown">{{$admin['name']}}</h5>
                                        <p>SĐT : {{$admin['phone']}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <form action="sua-admin" method="POST" enctype="multipart/form-data">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mb-2 text-primary">Cập nhật thông tin</h6>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="fullName">Tên</label>
                                                <input type="text" class="form-control" name="name" value="{{$admin['name']}}" placeholder="Enter full name">
                                                <input type="text" hidden name="id" value="{{$admin['id']}}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="eMail">Email</label>
                                                <input type="email" value="{{$admin['email']}}" class="form-control" name="email" placeholder="Enter email ID">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="phone">Số điện thoại</label>
                                                <input type="text" value="{{$admin['phone']}}" class="form-control" name="phone" placeholder="Enter phone number">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="website">Ảnh</label>
                                                <input type="file" name="img" class="form-control" id="website">
                                                <input type="text" hidden value="{{$admin['img']}}" name="img">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="website">Giới tính</label>
                                                <select class="form-control" name="gender" id="">
                                                    <option <?php if ($admin['gender'] == 0) {
                                                                echo 'selected';
                                                            } ?> value="0">Nam</option>
                                                    <option <?php if ($admin['gender'] == 1) {
                                                                echo 'selected';
                                                            } ?> value="1">Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="Street">Địa chỉ</label>
                                                <input type="text" value="{{$admin['address']}}" class="form-control" name="address" id="Street" placeholder="Enter Street">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success">Cập nhật</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection