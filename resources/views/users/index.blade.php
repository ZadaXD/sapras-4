@extends('layouts.adminlte')

@section('title', 'Kelola Pengguna')

@section('content_header')
    <h1>Kelola Pengguna & Role</h1>
@endsection

@section('content')

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Card Pengguna --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0"><i class="fas fa-users-cog"></i> Daftar Pengguna</h3>
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#userModal" onclick="createUser()">
                <i class="fas fa-user-plus"></i> Tambah Pengguna
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel-user" class="table table-bordered table-hover datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @php
                                        $roleColor = match ($user->role) {
                                            'kabag' => 'primary',
                                            'wadir_ii' => 'success',
                                            'calon_pengguna' => 'warning',
                                            'pj_lab' => 'info',
                                            default => 'secondary',
                                        };
                                    @endphp
                                    <span class="badge badge-{{ $roleColor }} text-uppercase">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning"
                                        onclick="editUser({{ $user->id }}, `{{ $user->name }}`, `{{ $user->email }}`, `{{ $user->role }}`)">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Tambah/Edit --}}
    @include('users.modal')

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#tabel-user')) {
                $('#tabel-user').DataTable({
                    responsive: true,
                    autoWidth: false,
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ data",
                        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                        paginate: {
                            previous: "Sebelumnya",
                            next: "Berikutnya"
                        },
                        zeroRecords: "Tidak ditemukan data yang cocok",
                    }
                });
            }
        });

        function createUser() {
            const form = document.getElementById('userForm');
            form.action = "{{ route('users.store') }}";
            document.getElementById('methodUser').value = 'POST';
            form.reset();
            document.getElementById('userModalLabel').innerText = 'Tambah Pengguna';
        }

        function editUser(id, name, email, role) {
            const form = document.getElementById('userForm');
            form.action = `/users/${id}`;
            document.getElementById('methodUser').value = 'PUT';
            document.getElementById('name').value = name;
            document.getElementById('email').value = email;
            document.getElementById('role').value = role;
            document.getElementById('userModalLabel').innerText = 'Edit Pengguna';
            $('#userModal').modal('show');
        }
    </script>
@endpush
