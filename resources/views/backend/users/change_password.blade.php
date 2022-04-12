<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Task Management Platform</title>
    @include('backend.layouts.styles')
    <style>
        #input_container {
            position:relative;
            padding:0 0 0 5px;
            margin-left: 5px;
        }
        #input {
            height:20px;
            margin:0;
            padding-right: 30px;
            border:none;
            width: 100%;
        }
        #input_img {
            position:absolute;
            bottom:2px;
            right:5px;
            width:24px;
            height:24px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layouts.header')
    <div class="container-fluid page-body-wrapper">
        @include('backend.layouts.sidebar')
        <div class="main-panel user-profile-edit-panel">
            <div class="content-wrapper">
                @include('backend.layouts.messages')
                <div class="CreateTeamBox card-body">
                    <h5 class="mb-2 mt-2 profile-edit-page">Edit Profile</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center mt-2">
                            @if(!empty(\Illuminate\Support\Facades\Auth::user()['image']) && (file_exists(public_path('backend/uploads/profile_images/'.$user->id.'/'.\Illuminate\Support\Facades\Auth::user()['image']))))
                                <img class="profile-picture" src="{!! URL::to('public/backend/uploads/profile_images/'.$user->id.'/'.\Illuminate\Support\Facades\Auth::user()['image']) !!}" alt="profile" height="150px;" width="150px"/>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" height="150" viewBox="0 0 24 24" width="150"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg> 
                            @endif
                        </div>
                    </div>
                    <div class="p-4">
                        <form method="POST" action="{{route('users.updatePassword',$user->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-2 user-photo-edit-label">
                                            <label for="inputPassword">User Photo</label>
                                        </div>
                                        <div class="col-md-10 user-photo-edit">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFileLang" lang="es" name="image">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                <label class="custom-file-label" for="customFileLang"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="password_confirmation">Confirm Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 text-center">
                                    <a href="{{route('users.show',$user->id)}}" class="btn custom-outline-btn">Cancel</a>
                                    <button class="btn custom-btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            {{--            footer--}}
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        <!-- container-scroller -->
        @include('backend.layouts.scripts')
        <script>
            $('input[type="file"]').change(function(e){
                const fileName = e.target.files[0].name;
                $('.custom-file-label').html(fileName);
            });
        </script>

</body>

</html>
