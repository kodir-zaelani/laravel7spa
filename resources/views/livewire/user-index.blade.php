<div>
    <div class="container">
        <div class="row justify-content-center">
            {{--  <div class="col-md-8">  --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">User List</div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            @if ($statusUpdate)
                            <livewire:user-update></livewire:user-update>
                            @else 
                            <livewire:user-create></livewire:user-create>
                            @endif
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <select wire:model="paginate" id="" class="form-control form-control-sm w-auto" name="">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input wire:model.debounce.600ms="term" class="form-control form-control-sm" type="text" name="" placeholder="Search">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    {{--  Menggunakan Datatables  --}}
                                    <table class="table">
                                        <thead>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date</th>
                                            <th scope="col"></th>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach ($users as $user)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $no }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                {{--  <td>{{ $user->created_at->diffForHumans() }}</td>  --}}
                                                <td>
                                                    <button wire:click="getUser({{ $user->id }})" class="btn btn-sm btn-info text-white">Edit</button>
                                                    <button wire:click="destroy({{ $user->id }})" class="btn btn-sm btn-danger text-white">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->links() }}
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
