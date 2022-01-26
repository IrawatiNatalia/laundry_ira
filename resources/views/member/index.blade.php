@extends('templates/header')

@section('content')

  <div style="">
  <h3 class="mb-2">Member</h3>

  <button type="button" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMember">
      <i class="bi bi-plus-lg">Tambah Member</i>
  </button>
            <table class="table" id="tableMember">
              <thead>
                <tr class="table-info">
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Action</th>
                </tr>
                  <?php
                  $no = 1;
                  ?>
                  @foreach ($data as $item)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->tlp }}</td>
                    <td>
                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalUpdate{{ $item->id }}">
                        <i class="bi bi-pencil-square"></i>
                      </button> 
                      <form action="{{ url('/member', $item->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        {{-- <a href="" method="post" class="btn btn-danger">Hapus</a> --}}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </form>
                  </td>
                </tr>
                    @endforeach
              </thead>
            </table>
  </div>

  <!-- Modal -->
  {{-- modal input --}}
  <div class="modal fade" id="tambahMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Data Member</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ ('member') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <div class="mb-2">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" id="alamat" required>
            </div>
            <div class="mb-2">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" id="jenis_kelamin">
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="mb-2">
              <label>Telepon</label>
              <input type="text" class="form-control" name="tlp" id="tlp" required>
            </div>
          {{-- form --}}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  {{-- modal update --}}
  @foreach ($data as $item)
  <div class="modal fade" id="exampleModalUpdate{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title fw-normal" id="exampleModalUpdate">Update data Member</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form method="post" action="{{ route('member.update', $item->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')
                        <input type="hidden" name="id" value="{{ $item->id }}">
                          <div class="mb-2">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}" required>

                          <label for="alamat">Alamat</label>
                          <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $item->alamat }}" required>

                          <label for="jenis_kelamin">Jenis Kelamin</label>
                          <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $item->jenis_kelamin }}" required>

                          <label for="tlp">Telepon</label>
                          <input type="text" class="form-control" id="tlp" name="tlp" value="{{ $item->tlp }}" required>
                          </div>
                          <button class="w-100 btn btn-lg btn-dark swalDefaultUpdate" type="submit">Update Data Member</button>
                  </form>
              </div>
        </div>
    </div>
  </div>
@endforeach

@endsection
