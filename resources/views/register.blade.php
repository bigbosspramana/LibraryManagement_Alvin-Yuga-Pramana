<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Register</h2>

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Menampilkan pesan error jika ada -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="role" class="form-label">Register Sebagai:</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="pustakawan" {{ old('role') === 'pustakawan' ? 'selected' : '' }}>Pustakawan</option>
                </select>
                @error('role')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
                @error('username')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <div class="mb-3" id="pustakawanType" style="display: none;">
                <label for="type" class="form-label">Jenis Pustakawan:</label>
                <select name="type" id="type" class="form-select">
                    <option value="dosen" {{ old('type') === 'dosen' ? 'selected' : '' }}>Dosen</option>
                    <option value="mahasiswa" {{ old('type') === 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                </select>
                @error('type')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        const roleSelect = document.getElementById('role');
        const pustakawanType = document.getElementById('pustakawanType');

        roleSelect.addEventListener('change', () => {
            if (roleSelect.value === 'pustakawan') {
                pustakawanType.style.display = 'block';
            } else {
                pustakawanType.style.display = 'none';
            }
        });
    </script>
</body>
</html>
