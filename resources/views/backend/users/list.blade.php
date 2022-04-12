<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Management System</title>
    @include('backend.layouts.styles')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layouts.header')
    <div class="container-fluid page-body-wrapper">
        @include('backend.layouts.sidebar')
        <div class="main-panel users-list-main-panel">
            <div class="content-wrapper" >
                <div id="alert-show">
                    @include('backend.layouts.messages')
                </div>
                <h3 class="users-list-title">User Management</h3>
                <hr class="Dash-Line">
                <div class="row DataTableBox">
                    <div class="row users-list-table-subHeader">
                        <div class="col-sm-5 subHeader-col-1">
                            <form action="{{route('users.index')}}" method="GET">
                                <div class="form-inline">
                                    <span><b>All Users List</b></span>
                                    <input class="form-control mr-sm-2 user-list-search" type="search" placeholder="Search..." aria-label="Search" id="search_key" name="search_key">
                                    <button>Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-7 subHeader-col-2">
                            <a class="btn-hover" href="{{route('users.create')}}"><button class="user-list-New-User">New User</button></a>
                        </div>
                    </div>
                    <div>
                      <hr>
                    </div>

                    <div class="user-table-section">
                        @include('backend.users.fetch_user')
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            {{--            footer--}}
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
    </div>
</div>
        <!-- page-body-wrapper ends -->
        <!-- container-scroller -->

        @include('backend.layouts.scripts')

</body>

</html>
