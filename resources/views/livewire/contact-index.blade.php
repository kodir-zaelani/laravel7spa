<div>
    <div class="container">
        <div class="row justify-content-center">
            {{--  <div class="col-md-8">  --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Contact List</div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            @if ($statusUpdate == 1)
                                <livewire:contact-update></livewire:contact-update>
                            @elseif ($statusUpdate == 2)
                                <livewire:contact-show></livewire:contact-show>
                             @else
                                <livewire:contact-create></livewire:contact-create>
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
                                    {{--  Contoh pertama  --}}
                                    {{--  <ul>  --}}
                                        {{--  menggunakan Proferty public $data  --}}
                                        {{--  @foreach ($data as $contact)  --}}
                                        {{--  menggunakan parameter kedua pada view public $data  --}}
                                        {{--  @foreach ($contacts as $contact)
                                            <li>{{ $contact->name }}</li>
                                            @endforeach  --}}
                                            {{--  </ul>  --}}
                                            
                                            {{--  Contoh kedua   --}}
                                            {{--  Menggunakan Datatables  --}}
                                            <table class="table">
                                                <thead>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col"></th>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no = 0;
                                                    @endphp
                                                    @foreach ($contacts as $contact)
                                                    @php
                                                    $no++;
                                                    @endphp
                                                    <tr>
                                                        <th scope="row">{{ $no }}</th>
                                                        <td>{{ $contact->name }}</td>
                                                        <td>{{ $contact->phone }}</td>
                                                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                                                        <td>
                                                            <button wire:click="getContact({{ $contact->id }})" class="btn btn-sm btn-info text-white">Edit</button>
                                                            <button wire:click="getContactShow({{ $contact->id }})" class="btn btn-sm btn-info text-white">Show</button>
                                                            <button wire:click="destroy({{ $contact->id }})" class="btn btn-sm btn-danger text-white">Delete</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $contacts->links() }}
                                        </div>
                                    </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>