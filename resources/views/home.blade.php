@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
        {{-- <div class="col"> --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        List Proyek
                    </div>
                    <div>
                        <a href="{{ route('proyek.create') }}" class="btn btn-primary">+ Tambah Proyek</a>
                    </div>
                </div>

                <div class="card-body">
                    {{-- <div id="inputContainer" class="form-group">
                        <div class="inputRow">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <button id="addButton">Tambah Input</button> --}}
                      <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama Proyek</th>
                                <th>Pengembang Proyek</th>
                                <th>Tanggal Pengembangan</th>
                                <th>Wilayah Pengembangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($proyeks as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        {{$item->nama_proyek}}
                                    </td>
                                    <td>
                                        {{$item->user->name}}
                                    </td>
                                    <td>
                                        {{$item->tanggal_pengembangan}}
                                    </td>
                                    <td>
                                        {{$item->wilayah_pengembangan}}
                                    </td>
                                    {{-- <td>
                                        {{$item->details}}
                                    </td> --}}
                                    <td class="d-flex">
                                        <a href="{{ route('proyek.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('proyek.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger ms-2">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th>No Data Exist...</th>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                      
                      
                </div>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
</div>

{{-- <script>
    // Mendapatkan elemen-elemen yang dibutuhkan
// Mendapatkan elemen-elemen yang dibutuhkan
const inputContainer = document.getElementById('inputContainer');
const addButton = document.getElementById('addButton');

// Menambahkan event listener pada tombol Tambah Input
addButton.addEventListener('click', function() {
  // Membuat elemen input baru dan tombol hapus
  const inputRow = document.createElement('div');
  inputRow.classList.add('inputRow');
  
  const newInput = document.createElement('input');
  newInput.type = 'text';
  newInput.classList.add('form-control');
  
  const deleteButton = document.createElement('button');
  deleteButton.innerText = 'Hapus';
  deleteButton.classList.add('deleteButton');
  
  // Menambahkan event listener pada tombol hapus
  deleteButton.addEventListener('click', function() {
    // Menghapus elemen input dan tombol hapus yang terkait
    inputContainer.removeChild(inputRow);
  });
  
  // Menambahkan elemen input dan tombol hapus ke dalam container
  inputRow.appendChild(newInput);
  inputRow.appendChild(deleteButton);
  inputContainer.appendChild(inputRow);
});


</script> --}}
@endsection
