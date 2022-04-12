<div class="row Blue-Color-BG-row">
    @foreach($users as $user)
        <div class="col-md-4">
            <div class="Pie-Chart-Card-Box" style="position:relative;">
                <div style="margin-bottom:20px;">
                    <a class="Rectangle-Edit btn-hover2" style="text-decoration: none;" href="{{route('users.show', $user->id)}}"><i class="fa fa-eye" style="margin-right: 5px;"></i>View</a>
                    <a class="Rectangle-Edit btn-hover2" style="text-decoration: none;" href="{{route('users.edit', $user->id)}}"><i class="fa fa-pencil" style="margin-right: 5px;"></i>Edit</a>
                
                    <a class="Rectangle-Delete btn-hover2" style="text-decoration: none;" href="{{ route('users.destroy', $user->id) }}"
                        onclick="deleteData('delete-form-{{$user->id}}');"><i class="fa fa-trash"></i>
                        Delete
                    </a>

                    <form id="delete-form-{{$user->id}}" action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-none" style="display: none">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
                <div class="col-md-12 text-center mb-5">
                    @if(!empty($user->image) && (file_exists(public_path('backend/uploads/profile_images/'.$user->image))))
                        <img class="profile-picture" src="{!! URL::to('public/backend/uploads/profile_images/'.$user->image) !!}" alt="profile" height="90px;" width="90px" style="border-radius:50%;"/>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" height="90" viewBox="0 0 24 24" width="90"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg> 
                    @endif
                </div>
                <p style="position:sticky;">Name: {{$user->name}}</P>
                <p>Email: {{$user->email}}</p>
                <p>Phone Number: {{$user->phone_number}}</p>
                <p>Class: {{$user->class}}</p>
                <p>Education Year: {{$user->education_year}}</p>
                <p>Gender: {{$user->gender}}</p>
                <p>Address: {{$user->address}}</p>                    
            </div>
        </div>
    @endforeach
</div>
<script>
    function deleteData(id){
        event.preventDefault();
        swal({
                title: "Are you sure?",
                type: "error",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "CONFIRM",
                cancelButtonText: "CANCEL",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                $.ajax({
                    url: $("#" + id).attr('action'),
                    method: 'POST',
                    data: $("#" + id).serializeArray(),
                    success: function (data) {
                        location.reload();
                    }
                });
            }
        );
    }
</script>
