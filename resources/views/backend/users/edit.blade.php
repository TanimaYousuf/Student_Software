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
        <div class="main-panel user-edit-main-panel">
            <div class="content-wrapper">
                <h4 class="user-edit-title">Edit User - {{empty($user->name) ? '' : $user->name}}</h4>
                <hr class="Dash-Line">
                <div class="CreateTaskBox card-body" style="margin-bottom: 20px;">
                    <h5 class="mb-4 mt-2">Edit User Information</h5>
                    <hr>
                    <form method="POST" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf  
                        <div class="form-row py-4">
                            {{-- start 1st col --}}
                            <div class="col-md-6 px-5">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="name" >Full Name <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ !empty(old('name')) ? old('name') : $user->name}}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="email">Email Id</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ !empty(old('email')) ? old('email') : $user->email}}" autocomplete="nope">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="address">Address <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ !empty(old('address')) ? old('address') : $user->address}}" name="address">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="class">Class <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('class') is-invalid @enderror" id="class" value="{{ !empty(old('class')) ? old('class') : $user->class}}" name="class">
                                        @error('class')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- end 1st col --}}
                            {{-- start 2nd col --}}
                            <div class="col-md-6 px-5">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="phone_number">Phone Number <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ !empty(old('phone_number')) ? old('phone_number') : $user->phone_number}}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="education_year">Education Year <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('education_year') is-invalid @enderror" id="phone_number" name="education_year" value="{{ !empty(old('education_year')) ? old('education_year') : $user->education_year}}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                        @error('education_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="inputPassword">User Photo</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" class="form-control custom-file-input @error('image') is-invalid @enderror" id="customFileLang" lang="es" name="image" value="{{ old('image') }}">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="custom-file-label" for="customFileLang"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="unit">Gender <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="radio-item">
                                            <input type="radio" id="status" name="gender" value="1" {{$user->gender == 1 ? 'checked' : ''}}>
                                            <label for="status">Male</label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="inactive" name="status" value="0" {{$user->gender == 0 ? 'checked' : ''}}>
                                            <label for="inactive">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end 2nd col --}}
                            <div class="col-md-12">
                                <div class="text-center">
                                    <a href="{{route('users.index')}}" class=" btn custom-outline-btn">Cancel</a>
                                    <button class="btn custom-btn">Create</button>
                                </div>
                            </div>
                        </div>                    
                    </form>
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
<script>
    $('input[type="file"]').change(function(e){
        const fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
    $('.select2').select2();
</script>

</body>

</html>
