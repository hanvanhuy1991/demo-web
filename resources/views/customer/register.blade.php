@extends('customer.layouts.app')

@section('content')

    @include('customer.inc.customer_side_nav')
    <div id="content" class="p-4 p-md-5">
        <div class="widget">
            <div class="widget-header">
                <h4 class="title-header">Thông tin cá nhân</h4>
            </div>
            <form action="{{ route('customer.register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group text-center">
                    <div>
                        Tiêu đề linh ta linh tinh
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Email đăng nhập</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text" name="email">
                                    </div>
                                    @error('email')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Mật Khẩu</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="password" class="form-control form-control__static-text"
                                               name="password">
                                    </div>
                                    @error('password')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Họ tên</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text" name="name">
                                    </div>
                                    @error('name')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Ngày cấp</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text"
                                               name="identity_date" placeholder="01/02/2000">
                                    </div>
                                    @error('identity_date')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Ảnh CMT mặt trước</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="file" class="form-control form-control__static-text"
                                               name="image_before">
                                    </div>
                                    @error('image_before')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Khu vực</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <select class="form-control" name="area" id="">
                                            <option value="1">ádfsdfasdf</option>
                                        </select>
                                    </div>
                                    @error('area')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Ngày sinh</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="tex" class="form-control form-control__static-text"
                                               name="birthday" placeholder="01/02/2000">
                                    </div>
                                    @error('birthday')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Tên ngân hàng</label>

                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <select class="form-control" name="bank" id="">
                                            <option value="">-- Chọn ngân hàng --</option>
                                            @foreach($banks as $bank)
                                                <option value="{{ $bank ->id }}">{{ $bank->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    @error('bank')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Chủ thẻ</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text"
                                               name="master_name">
                                    </div>
                                    @error('master_name')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Người giới thiệu</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input class="form-control form-control__static-text" type="text"
                                               value="{{ Auth::user()->name }}" readonly>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Nhập lại mật khẩu</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="password" class="form-control form-control__static-text"
                                               name="password_confirmation">
                                    </div>
                                    @error('password_confirmation')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Số CMT</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text"
                                               name="identity_number">
                                    </div>
                                    @error('identity_number')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Nơi cấp</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text"
                                               name="identity_address">
                                    </div>
                                    @error('identity_address')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Ảnh CMT mặt sau </label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="file" class="form-control form-control__static-text"
                                               name="image_after">
                                    </div>
                                    @error('image_after')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Địa chỉ </label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text"
                                               name="address">
                                    </div>
                                    @error('address')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Điện thoại </label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text" name="phone">
                                    </div>
                                    @error('phone')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Tài khoản ngân hàng </label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text"
                                               name="bank_number">
                                    </div>
                                    @error('bank_number')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Chi nhánh </label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text"
                                               name="brand_name">
                                    </div>
                                    @error('brand_name')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div>
                                <img style="max-width: 100px" src="" alt="Avatar">
                            </div>
                            <input name="image" type="file">
                            @error('image')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                </div>
                <button type="submit">Cập nhật</button>
            </form>

        </div>
    </div>
@endsection
