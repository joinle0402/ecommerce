@extends('administrator.layouts.index')

@section('style')
    <link rel="stylesheet" href="{{ asset('administrator/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" integrity="sha512-uyGg6dZr3cE1PxtKOCGqKGTiZybe5iSq3LsqOolABqAWlIRLo/HKyrMMD8drX+gls3twJdpYX0gDKEdtf2dpmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="flex gap-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Nhập từ khoá">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button" id="button-addon2">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-success">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkall">
                                                    <label for="checkall"></label>
                                                </div>
                                            </th>
                                            <th scope="col" class="table-column" style="width: 50px;">
                                                STT
                                            </th>
                                            <th scope="col" class="table-column">
                                                Họ tên
                                            </th>
                                            <th scope="col" class="table-column">
                                                Email</
                                                th>
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
                                            <tr>
                                                <th scope="row">
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="checkbox-row" id="checkbox-row-{{ $index }}" value="{{ $user->id }}">
                                                        <label for="checkbox-row-{{ $index }}"></label>
                                                    </div>
                                                </th>
                                                <td class="text-center vertical-middle">{{ $index + 1 }}</td>
                                                <td class="vertical-middle">{{ $user->name }}</td>
                                                <td class="vertical-middle">{{ $user->email }}</td>
                                                <td class="vertical-middle text-center">
                                                    <input type="checkbox" class="switchery" @checked($user->active) />
                                                </td>
                                                <td>
                                                    <div class="flex gap-2">
                                                        <button type="button" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 flex justify-end">
                                {{ $users->links() }}
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
    <script>
        $(document).ready(function() {
            $('.switchery').each(function() {
                var switchery = new Switchery($(this)[0], {
                    color: '#2196F3'
                });
            });

            $('#checkall').on('click', function() {
                $('.checkbox-row').prop('checked', $(this).prop('checked'));
            });

            $('.checkbox-row').on('click', function() {
                if ($('.checkbox-row:checked').length == $('.checkbox-row').length) {
                    $('#checkall').prop('checked', true);
                } else {
                    $('#checkall').prop('checked', false);
                }
            });
        });
    </script>
@endsection
