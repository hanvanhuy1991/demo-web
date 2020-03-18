@extends('customer.layouts.app')


@section('content')
    @include('customer.inc.customer_side_nav')
    <div id="content" class="p-4 p-md-5">
        <div class="widget">
            <div class="widget-header">
                <h4 class="title-header">Thông tin cá nhân</h4>
            </div>
            <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group text-center">
                    <div>
                        <img style="max-width: 100px" src="{{ $user->image }}" alt="Avatar">
                    </div>
                    <input name="image" type="file">
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Họ và tên</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input type="text" class="form-control form-control__static-text" name="name" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Khu vực</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <select class="form-control" name="area" id="">
                                            <option value="{{ $user->area->id }}">{{ $user->area->name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Ngày sinh</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input class="form-control" name="birthday" type="text" value="{{ $user->birthday }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Tên ngân hàng</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <select class="form-control" name="bank" id="">
                                            <option value="{{ $user->bank_id }}">{{ $user->bank->name }}</option>
                                            @foreach($banks as $bank)
                                                    <option value="">{{ $bank->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Chủ thẻ</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input name="master_name" class="form-control" type="text" value="{{ $user->master_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">CMT</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input name="identity_number" class="form-control" type="text" value="{{ $user->identity->number }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Nơi cấp</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input name="identity_address" class="form-control" type="text" value="{{ $user->identity->address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">CMT mặt trước</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <img id="identity_image_before" src="{{ $user->identity->image_before }}" alt="" style="max-width: 250px">
                                        <input id="image_before" name="image_before" class="form-control" type="file" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Cấp bậc</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input class="form-control form-control__static-text" type="text" name="level" value="{{ $user->level }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Email</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input name="email" class="form-control" type="text" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Địa chỉ</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input name="address" class="form-control" type="text" value="{{ $user->address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Diện thoại</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input name="phone" class="form-control" type="text" value="{{ $user->phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Tài khoản NH</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input name="bank_number" class="form-control" type="text" value="{{ $user->bank_number }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Chi nhánh</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input name="brand_name" class="form-control" type="text" value="{{ $user->brands_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">Ngày cấp</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <input name="identity_date" class="form-control" type="text" value="{{ $user->identity->date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5">CMT mặt sau</label>
                                <div class="col-md-7">
                                    <div class="form-control__static">
                                        <img id="identity_image_after" src="{{ $user->identity->image_after }}" alt="" style="max-width: 200px">
                                        <input id="image_after" name="image_after" class="form-control" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit">Cập nhật</button>
            </form>

        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            function readURL(input, preview) {
                console.log(input)
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        console.log(preview);
                        preview.attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#image_before').change(function () {
                var input = $(this);
                var preview = $('#identity_image_before');
                readURL(input[0], preview);
            })
            $('#image_after').change(function () {
                var input = $(this);
                var preview = $('#identity_image_after');
                readURL(input[0], preview);
            })

        })
    </script>
    @endsection
