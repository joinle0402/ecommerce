@extends('administrator.layouts.index')

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm mới người dùng</h2>
            </div>
        </div>
        <form action="{{ route('admin.users.create') }}" method="POST">
            @csrf
            @method('POST')

            <div class="row mt-3">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email: <span style="color: red;">(*)</span></label>
                                        <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Họ tên: <span style="color: red;">(*)</span></label>
                                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_id">Nhóm thành viên: <span style="color: red;">(*)</span></label>
                                        <select id="role_id" class="form-control">
                                            <option value="">[Chọn nhóm thành viên]</option>
                                            <option value="1">Quản trị viên</option>
                                            <option value="2">Cộng tác viên</option>
                                        </select>
                                        @error('role_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birthday">Ngày sinh:</label>
                                        <input type="date" @class(['form-control', 'is-invalid' => $errors->has('birthday')]) id="birthday" name="birthday" value="{{ old('birthday') }}">
                                        @error('birthday')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="avatar">Ảnh đại diện:</label>
                                        <input type="file" class="form-control-file" onchange="handleInputAvatarChange(this)" accept="image/*" id="avatar" name="avatar">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="image-preview" style="display: none;"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại: </label>
                                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('phone')]) id="phone" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="province_code">Tỉnh thành:</label>
                                        <select class="form-control select2 select2-primary" id="province_code" name="province_code" onchange="handleSelectProvinceChange()" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option value="">Chọn thành phố</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->code }}">{{ $province->full_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('province_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district_code">Quận Huyện:</label>
                                        <select class="form-control select2 select2-primary" onchange="handleSelectDistrictChange()" id="district_code" name="district_code" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option value="">Chọn quận huyện</option>
                                        </select>
                                        @error('district_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ward_code">Phường Xã:</label>
                                        <select class="form-control select2 select2-primary" id="ward_code" name="ward_code" onchange="updateTextareaAddress()" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option value="">Chọn quận huyện</option>
                                        </select>
                                        @error('ward_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="street">Đường: </label>
                                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('street')]) onchange="updateTextareaAddress()" id="street" name="street" value="{{ old('street') }}">
                                        @error('street')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Địa chỉ: </label>
                                        <textarea class="form-control" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="note">Ghi chú: </label>
                                        <textarea class="form-control" id="note" name="note" rows="3">{{ old('note') }}</textarea>
                                        @error('note')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-8 flex gap-2 justify-end">
                    <a type="button" href="{{ route('admin.users.index') }}" class="btn btn-secondary">Trờ về</a>
                    <button type="subbmit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('administrator/plugins/select2/css/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--single .select2-selection__arrow,
        .select2-selection.select2-selection--single {height: 38px!important;}
        .select2-container--default .select2-selection--single .select2-selection__arrow { border-radius: 0.25rem; }
        .select2-container--default .select2-search--dropdown .select2-search__field {border-radius: 0.25rem;}
        .select2-container .select2-selection--single .select2-selection__rendered {padding-left: 0px;}
    </style>
@endsection

@section('script')
    <script src="{{ asset('administrator/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
        });

        async function request(method = 'GET', url, parameters = {}) {
            try {
                const response = await $.ajax({
                    method,
                    url: "{{ url("{url}") }}".replace('{url}', url),
                    body: parameters
                });
                console.log('request: ', { method, url, parameters, response });
                return response;
            } catch (error) {
                console.log(error);
            }
        }

        async function handleSelectProvinceChange() {
            const province_code = $('#province_code').val();
            if (province_code) {
                const response = await request("GET", `api/provinces/${province_code}/districts`);
                const template = response?.reduce(function (html, district) {
                    return html + `<option value="${district.code}">${district.full_name}</option>`;
                }, '<option value="">Chọn quận huyện</option>');
                $('#district_code').html(template);
                updateTextareaAddress();
            }
        }

        async function handleSelectDistrictChange() {
            const district_code = $('#district_code').val();
            if (district_code) {
                const response = await request("GET", `api/districts/${district_code}/wards`);
                const template = response?.reduce(function (html, ward) {
                    return html + `<option value="${ward.code}">${ward.full_name}</option>`;
                }, '<option value="">Chọn phường xã</option>');
                $('#ward_code').html(template);
                updateTextareaAddress();
            }
        }

        function handleInputAvatarChange(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                $('#image-preview').show();
                reader.onload = function(event) {
                    $('#image-preview').html("<img id='avatar-preview' name='avatar-preview' width='300' style='object-fit: cover;' />");
                    $('#avatar-preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function updateTextareaAddress () {
            const address = [];

            const street = $('#street').val();
            if (street) {
                address.push(street);
            }

            const ward_code = $('#ward_code').val();
            if (ward_code) {
                address.push($(`#ward_code option[value=${$('#ward_code').val()}]`).text().trim());
            }

            const district_code = $('#district_code').val();
            if (district_code) {
                address.push($(`#district_code option[value=${$('#district_code').val()}]`).text().trim());
            }

            const province_code = $('#province_code').val();
            if (province_code) {
                address.push($(`#province_code option[value=${$('#province_code').val()}]`).text().trim());
            }

            $('#address').val(address.join(','));
        }
    </script>
@endsection
