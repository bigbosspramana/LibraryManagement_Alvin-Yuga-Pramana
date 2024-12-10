<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seeder - Bigboss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2F2E47;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h3 {
            font-weight: 700;
            color: white;
        }

        hr {
            color: white;
        }

        h5 a {
            color: #007bff;
            text-decoration: none;
        }

        h5 a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        table {
            margin-top: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            padding: 12px;
        }

        .form-select {
            margin-bottom: 10px;
            display: inline-block;
            width: auto;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h3>Kelola Pustakawan</h3>
        <hr>
        <form action="{{ route('pustakawans.store') }}" method="POST" style="margin-bottom: 20px;">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label" style="color: white;">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="color: white;">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label" style="color: white;">Type</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="dosen">Dosen</option>
                    <option value="mahasiswa">Mahasiswa</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Pustakawan</button>
        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Type</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pustakawans as $pustakawan)
                <tr>
                    <td>{{ $pustakawan->id }}</td>
                    <td>{{ $pustakawan->username }}</td>
                    <td>{{ $pustakawan->type }}</td>
                    <td>
                        <form action="{{ route('pustakawans.destroy', $pustakawan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Bigboss Library [Admin] </h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form method="GET" action="{{ route('dashadmin') }}">
                            <select name="type" onchange="this.form.submit()" class="form-select w-auto">
                                <option value="">Select Type</option>
                                <option value="book" {{ request('type') == 'book' ? 'selected' : '' }}>Book</option>
                                <option value="journal" {{ request('type') == 'journal' ? 'selected' : '' }}>Journal</option>
                                <option value="cd" {{ request('type') == 'cd' ? 'selected' : '' }}>CD</option>
                                <option value="newspaper" {{ request('type') == 'newspaper' ? 'selected' : '' }}>Newspaper</option>
                                <option value="skripsi" {{ request('type') == 'skripsi' ? 'selected' : '' }}>Skripsi</option>
                                <option value="ebook" {{ request('type') == 'ebook' ? 'selected' : '' }}>Ebook</option>
                            </select>
                            <select name="sort" onchange="this.form.submit()" class="form-select w-auto">
                                <option value="">Sort by</option>
                                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Ascending</option>
                                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Descending</option>
                            </select>
                        </form>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    @if($type == '')
                                    <th scope="col">ID</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Halaman</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Tahun Terbit</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Artis</th>
                                    <th scope="col">Genre</th>

                                    @elseif ($type == 'book' || $type == 'journal' || $type == 'cd' || $type == 'newspaper' || $type == 'skripsi')
                                    <th scope="col">ID</th>
                                    <th scope="col">Judul</th>
                                    @if($type == 'cd')
                                    <th scope="col">Artis</th>
                                    <th scope="col">Genre</th>
                                    @else
                                    <th scope="col">Halaman</th>
                                    <th scope="col">Deskripsi</th>
                                    @endif
                                    <th scope="col">Tahun Terbit</th>
                                    @if($type != 'cd')
                                    <th scope="col">Penulis</th>
                                    @endif
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                @if ($type == '')
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->halaman }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                    <td>{{ $item->penulis }}</td>
                                    <td>{{ $item->artis }}</td>
                                    <td>{{ $item->genre }}</td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->judul }}</td>
                                    @if($type == 'cd')
                                    <td>{{ $item->artis }}</td>
                                    <td>{{ $item->genre }}</td>
                                    @else
                                    <td>{{ $item->halaman }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    @endif
                                    <td>{{ $item->tahun_terbit }}</td>
                                    @if($type != 'cd')
                                    <td>{{ $item->penulis }}</td>
                                    @endif
                                </tr>
                                @endif
                                @empty
                                <div class="alert alert-danger">
                                    Data Products belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex mt-3">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
        @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
        @endif
    </script>

</body>

</html>