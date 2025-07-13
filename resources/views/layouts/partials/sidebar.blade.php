<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ asset('img/Logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SAPRAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/Profile.jpeg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Calon Pengguna -->
                @if (auth()->user()->role === 'calon_pengguna')
                    <li class="nav-header">PENGAJUAN</li>
                    <li class="nav-item">
                        <a href="{{ route('pengajuan.index') }}"
                            class="nav-link {{ request()->is('pengajuan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Pengajuan</p>
                        </a>
                    </li>
                @endif

                <!-- Wadir II -->
                @if (auth()->user()->role === 'wadir_ii')
                    <li class="nav-header">VERIFIKASI</li>
                    <li class="nav-item">
                        <a href="{{ route('verifikasi.index') }}"
                            class="nav-link {{ request()->is('verifikasi*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>Verifikasi Pengajuan</p>
                        </a>
                    </li>
                @endif

                <!-- Kabag -->
                @if (auth()->user()->role === 'kabag')
                    <li class="nav-header">USER</li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>Kelola User</p>
                        </a>
                    </li>
                @endif

                <!-- Penanggung Jawab Lab atau Role yang punya akses pengawasan -->
                @if (in_array(auth()->user()->role, ['penanggung_jawab_lab', 'calon_pengguna']))
                    <!-- Label Pengawasan -->
                    <li class="nav-header">Pengawasan SAPRAS</li>

                    <!-- Per Lokasi -->
                    <li class="nav-item">
                        <a href="{{ route('pengawasan.sapras_lokasi', ['lokasi' => 'LabKom1']) }}"
                            class="nav-link {{ request()->is('sapras/lokasi/LabKom1') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>LabKom 1</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pengawasan.sapras_lokasi', ['lokasi' => 'LabKom2']) }}"
                            class="nav-link {{ request()->is('sapras/lokasi/LabKom2') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>LabKom 2</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pengawasan.sapras_lokasi', ['lokasi' => 'LabKom3']) }}"
                            class="nav-link {{ request()->is('sapras/lokasi/LabKom3') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>LabKom 3</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pengawasan.sapras_lokasi', ['lokasi' => 'LabKom4']) }}"
                            class="nav-link {{ request()->is('sapras/lokasi/LabKom4') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>LabKom 4</p>
                        </a>
                    </li>
                @endif

                <!-- Semua role boleh lihat SAPRAS -->
                <li class="nav-header">SAPRAS</li>
                <li class="nav-item">
                    <a href="{{ route('sapras.index') }}"
                        class="nav-link {{ request()->is('sapras') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Data SAPRAS</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
