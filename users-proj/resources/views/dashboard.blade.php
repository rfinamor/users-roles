<x-app-layout>


    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users Panel</div>
                    @if(session('message'))
                        <div class="text-white text-center text-l m-4 p-4" style="background-color:green">{{session('message')}}</div>
                    @endif
                    @if(session('error'))
                        <div class="bg-red-500 text-white text-center text-xl m-4 p-4">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                    <div class="flex justify-start p-4 mb-4 text-sm border-red-950 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" style="border:1px solid red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><span class="text-sm text-red-800">-{{ $error }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                     @endif
                    <div class="card-body">
                        @can('create')
                            <button class="btn btn-primary mb-3 float-right" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User
                            </button>
                        @endcan
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ ($user->getRoleNames()) }}</td>
                                        <td>
                                            @can('edit')
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            @endcan
                                            @can('delete')
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
   
</x-app-layout>

<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('users.store')}}" method="POST">
             @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input required type="text" placeholder="Name" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input required type="email" placeholder="Name@email.com" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input required type="password" placeholder="Password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select" aria-label="Default select example">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{$role->name}}</option>
                                @endforeach
                              </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


