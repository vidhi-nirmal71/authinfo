@extends('authinfo::layouts.app')

@section('head')
<style>
.table thead th {
    background-color: #fff;
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.03);
}

.table-borderless th, 
.table-borderless td {
    border: none;
    color: #566A7F;
}
</style>
@endsection

@section('content')
    <div class="pt-3 pb-0">
        <div class="card shadow-sm border-0 bg-white p-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-white border-0">
                <h4 class="mb-0">User Login Logs</h4>
                <div class="input-group search-input" style="width: 250px;">
                    <input type="text" name="search" class="form-control" placeholder="Search..." title="Search by Designation" data-url="{{ route('login-logs.search') }}" id="searchInput">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                </div>
            </div>
            
            <div class="card-body p-0">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-striped tablecontentcss">
                        <thead>
                            <tr class="text-left">
                                <th>#</th>
                                <th>User Name</th>
                                <th>IP Address</th>
                                <th>Device Type</th>
                                <th>User Agent</th>
                                <th>Location</th>
                                <th>Login Time</th>
                                <th>Logout Time</th>
                                <th>Error Message</th>
                            </tr>
                        </thead>
                        <tbody class="loginLogTableBody" id="loginLogTableBody">
                        </tbody>
                        <tfoot class="pagination-links">
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var requestPage = 1;
        function fetchLoginLogs(query = '') {
            let url = "{{ route('login.logs.fetch') }}";
            $.ajax({
                url: url,
                type: 'GET',
                data: { search: query, page: requestPage},
                success: function (response) {
                    $('#loginLogTableBody').html(response.tbody);
                    $('.pagination-links').html(response.pagination);
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                }
            });
        }

        $(document).on('keyup', '#searchInput', function () {
            fetchLoginLogs($(this).val());
        });

        $(document).on('click', '.page-link', function () {
            let currentPage = $(this).parent().hasClass('active');
            console.log('currentPage: ', currentPage);
            if (!currentPage) {
                requestPage = $(this).attr('data-url').split('=').pop();
                fetchLoginLogs($('#searchInput').val());
            }
        });

        $(document).ready(function () {
            fetchLoginLogs();
        });
    </script>
@endsection
