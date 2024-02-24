@extends('administrator.layouts.index')
@inject("provinceService", "App\Services\Interfaces\ProvinceService")
@inject("districtService", "App\Services\Interfaces\DistrictService")
@inject("wardService", "App\Services\Interfaces\WardService")

@section('style')
    <link rel="stylesheet" href="{{ asset('administrator/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" integrity="sha512-uyGg6dZr3cE1PxtKOCGqKGTiZybe5iSq3LsqOolABqAWlIRLo/HKyrMMD8drX+gls3twJdpYX0gDKEdtf2dpmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #table-personal th,
        #table-address th {
            width: 100px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Danh sách người dùng</h5>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12 flex justify-between">
                                <div>
                                    <label for="per_page" style="margin-bottom: 0;">
                                        <select class="form-control" id="per_page" onchange="window.location = this.value">
                                            <option value="{{ request()->fullUrlWithQuery(['per_page' => 10]) }}" @selected(request()->query('per_page', 10) === '10')>10</option>
                                            <option value="{{ request()->fullUrlWithQuery(['per_page' => 50]) }}" @selected(request()->query('per_page', 10) === '50')>50</option>
                                            <option value="{{ request()->fullUrlWithQuery(['per_page' => 100]) }}" @selected(request()->query('per_page', 10) === '100')>100</option>
                                            <option value="{{ request()->fullUrlWithQuery(['per_page' => 500]) }}" @selected(request()->query('per_page', 10) === '500')>500</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="flex gap-2">
                                    <div class="input-group">
                                        <label for="keyword" style="margin-bottom: 0;">
                                            <input type="text" class="form-control" id="keyword" placeholder="Nhập từ khoá">
                                        </label>
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button" id="button-addon2">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger" onclick="handleButtonDeleteMultiple()">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a  type="button" href="{{ route('admin.users.create') }}" class="btn btn-success">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form id="form" method="POST">
                                    @csrf
                                    @method('POST')
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="check_all">
                                                    <label for="check_all"></label>
                                                </div>
                                            </th>
                                            <th scope="col" class="table-column" style="width: 50px;">
                                                STT
                                            </th>
                                            <th scope="col" class="table-column">
                                                Thông tin cá nhân
                                            </th>
                                            <th scope="col" class="table-column">
                                                Địa chỉ
                                            </th>
                                            <th scope="col" class="table-column" style="width: 50px;">
                                                Hoạt động
                                            </th>
                                            <th scope="col" class="table-column" style="width: 100px;">
                                                Thao tác
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $index => $user)
                                            <tr class="vertical-middle">
                                                <th class="vertical-middle" scope="row">
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="checkbox-row" id="checkbox-row-{{ $index }}" name="checkedRows[]" value="{{ $user->id }}">
                                                        <label for="checkbox-row-{{ $index }}"></label>
                                                    </div>
                                                </th>
                                                <td class="text-center vertical-middle">{{ $index + 1 }}</td>
                                                <td class="vertical-middle">
                                                    <table class="table table-inner" id="table-personal">
                                                        <tr>
                                                            <th>Họ tên</th>
                                                            <td>{{ $user->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td>{{ $user->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Điện thoại</th>
                                                            <td>{{ $user->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Ngày Sinh</th>
                                                            <td>{{ date('d/m/Y', strtotime($user->birthday)) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nhóm thành viên</th>
                                                            <td>{{ $user->role_id === '1' ? 'Quản trị viên' : 'Cộng tác viên' }}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="vertical-middle">
                                                    <table class="table table-inner" id="table-address">
                                                        <tr>
                                                            <th>Tỉnh thành</th>
                                                            <td>{{ $provinceService->findByCode($user->province_code)->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Quận huyện</th>
                                                            <td>{{ $districtService->findByCode($user->district_code)->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phường xã</th>
                                                            <td>{{ $wardService->findByCode($user->ward_code)->name }}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="vertical-middle text-center">
                                                    <label for="active-{{$index}}"></label>
                                                    <input type="checkbox" id="active-{{$index}}" class="switchery" @checked($user->active) />
                                                </td>
                                                <td class="vertical-middle">
                                                    <div class="flex gap-2">
                                                        <button type="button" class="btn btn-danger" onclick="handleButtonDeleteOneClick({{ $user->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="col-md-12 flex justify-end">
                                {{ $users->withQueryString()->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js" integrity="sha512-lC8vSUSlXWqh7A/F+EUS3l77bdlj+rGMN4NB5XFAHnTR3jQtg4ibZccWpuSSIdPoPUlUxtnGktLyrWcDhG8RvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('administrator/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.switchery').each(function() {
                var switchery =  new Switchery($(this)[0], {
                    color: '#2196F3'
                });
            });

            $('#check_all').on('click', function() {
                $('.checkbox-row').prop('checked', $(this).prop('checked'));
            });

            $('.checkbox-row').on('click', function() {
                if ($('.checkbox-row:checked').length === $('.checkbox-row').length) {
                    $('#check_all').prop('checked', true);
                } else {
                    $('#check_all').prop('checked', false);
                }
            });
        });

        function handleButtonDeleteMultiple() {
            Swal.fire({
                text: "Bạn có chắc muốn thực hiện thao tác này?",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Thực hiện",
                cancelButtonText: "Hủy",
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($('.checkbox-row:checked').length > 0) {
                        $('input[name="_method"]').val('DELETE');
                        $('#form').attr('action', '{{ route('admin.users.destroyMany') }}').submit();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Bạn chưa chọn dữ liệu để xóa',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });
        }

        function handleButtonDeleteOneClick(id) {
            Swal.fire({
                text: "Bạn có chắc muốn thực hiện thao tác này?",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Thực hiện",
                cancelButtonText: "Hủy",
            }).then((result) => {
                if (result.isConfirmed) {
                    if (id) {
                        $('input[name="_method"]').val('DELETE');
                        const url = "{{ route('admin.users.destroy', ":id") }}".replace(":id", id);
                        $('#form').attr('action', url).submit();
                    }
                }
            });
        }
    </script>
@endsection
