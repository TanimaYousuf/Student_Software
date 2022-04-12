<!-- partial:partials/_sidebar.html -->

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="row nav position-fixed">
       
        @if(Route::is('users.create') || Route::is('users.show') || Route::is('users.edit') || Route::is('users.index'))
            <li class="nav-item nav-active">
                    <a class="nav-link" href="{{route('users.index')}}">
                        <img src="{!!URL::to('public/backend/assets/img/stl_user-icon-active.png')!!}" class="sidebar-icon">
                        <span class="menu-title"><b>USERS</b></span>
                    </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.index')}}">
                    <img src="{!!URL::to('public/backend/assets/img/user-management-icon.png')!!}" class="sidebar-icon menu-non-active">
                    <img src="{!!URL::to('public/backend/assets/img/stl_user-icon-active.png')!!}" class="sidebar-icon menu-active">
                    <span class="menu-title">USERS</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
<!-- partial -->

<script>
    $('.navbar-toggler').click(function (){
        if($('.Support-Contact').is(':visible')){
            $('.Support-Contact').hide();
        }else{
            $('.Support-Contact').show();
        }
    });
</script>
