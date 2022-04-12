<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Management System</title>
    <?php echo $__env->make('backend.layouts.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php echo $__env->make('backend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid page-body-wrapper">
        <?php echo $__env->make('backend.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel users-list-main-panel">
            <div class="content-wrapper" >
                <div id="alert-show">
                    <?php echo $__env->make('backend.layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <h3 class="users-list-title">User Management</h3>
                <hr class="Dash-Line">
                <div class="row DataTableBox">
                    <div class="row users-list-table-subHeader">
                        <div class="col-sm-5 subHeader-col-1">
                            <form action="<?php echo e(route('users.index')); ?>" method="GET">
                                <div class="form-inline">
                                    <span><b>All Users List</b></span>
                                    <input class="form-control mr-sm-2 user-list-search" type="search" placeholder="Search..." aria-label="Search" id="search_key" name="search_key">
                                    <button>Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-7 subHeader-col-2">
                            <a class="btn-hover" href="<?php echo e(route('users.create')); ?>"><button class="user-list-New-User">New User</button></a>
                        </div>
                    </div>
                    <div>
                      <hr>
                    </div>

                    <div class="user-table-section">
                        <?php echo $__env->make('backend.users.fetch_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
    </div>
</div>
        <!-- page-body-wrapper ends -->
        <!-- container-scroller -->

        <?php echo $__env->make('backend.layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\student_management_system\resources\views/backend/users/list.blade.php ENDPATH**/ ?>