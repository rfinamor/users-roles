<x-app-layout>


    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>

                    <div class="card-body p-4 flex flex-col">
                        <div class="flex justify-start">
                            <a href="{{ url()->previous() }}" class="btn btn-primary mb-3 float-right">Back</a>   
                        </div>
                        @if ($errors->any())
                            <div class="flex justify-start p-4 mb-4 text-sm border-red-950 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" style="border:1px solid red">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><span class="text-sm text-red-800">-{{ $error }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                     @endif
                        <form action="{{ route('users.update',$user->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" value="{{ $user->password }}" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-select" aria-label="Default select example">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ ( $user_roles[0] == $role->name) ? 'selected' : '' }}>{{$role->name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="btn btn-primary mb-3 float-right">Save changes</a>   
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
   
</x-app-layout>
