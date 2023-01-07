<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/') }}" class="sidebar-brand">
            RSU-<span>HI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            @role('administrator')
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item {{ active_class(['/home']) }}">
                    <a href="{{ url('/home') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Master Data</li>
                <li class="nav-item {{ active_class(['users']) }}">
                    <a href="{{ url('/users') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Data User</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['userDetails']) }}">
                    <a href="{{ url('/userDetails') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Data User Details</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['units']) }}">
                    <a href="{{ url('/units') }}" class="nav-link">
                        <i class="link-icon" data-feather="hard-drive"></i>
                        <span class="link-title">Data Unit</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['positions']) }}">
                    <a href="{{ url('/positions') }}" class="nav-link">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Data Posisi</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['jobs']) }}">
                    <a href="{{ url('/jobs') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Lowongan</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['schedules']) }}">
                    <a href="{{ url('/schedules') }}" class="nav-link">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Jadwal Seleksi</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['announcements']) }}">
                    <a href="{{ url('/announcements') }}" class="nav-link">
                        <i class="link-icon" data-feather="framer"></i>
                        <span class="link-title">Pengumuman</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Seleksi Administrasi</li>
                <li class="nav-item {{ active_class(['administration']) }}">
                    <a href="{{ url('/administration') }}" class="nav-link">
                        <i class="link-icon" data-feather="framer"></i>
                        <span class="link-title">Seleksi Administrasi</span>
                    </a>
                </li>
            @endrole
            @role('peserta')
                <li class="nav-item nav-category">Pelamar</li>
                <li class="nav-item {{ active_class(['list-lowongan']) }}">
                    <a href="{{ url('/list-lowongan') }}" class="nav-link">
                        <i class="link-icon" data-feather="list"></i>
                        <span class="link-title">Daftar Lowongan</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['jadwal-seleksi']) }}">
                    <a href="{{ url('/jadwal-seleksi') }}" class="nav-link">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Jadwal Seleksi</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['hasil-seleksi']) }}">
                    <a href="{{ url('/hasil-seleksi') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Hasil Seleksi</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['announcement']) }}">
                    <a href="{{ url('/announcement') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Pengumuman</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['guide']) }}">
                    <a href="{{ url('/guide') }}" class="nav-link">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Panduan</span>
                    </a>
                </li>
            @endrole
            @role('sdm')
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item {{ active_class(['/home']) }}">
                    <a href="{{ url('/home') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['units']) }}">
                    <a href="{{ url('/units') }}" class="nav-link">
                        <i class="link-icon" data-feather="hard-drive"></i>
                        <span class="link-title">Data Unit</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['positions']) }}">
                    <a href="{{ url('/positions') }}" class="nav-link">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Data Posisi</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['jobs']) }}">
                    <a href="{{ url('/jobs') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Data Lowongan</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['schedules']) }}">
                    <a href="{{ url('/schedules') }}" class="nav-link">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Jadwal Seleksi</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['announcements']) }}">
                    <a href="{{ url('/announcements') }}" class="nav-link">
                        <i class="link-icon" data-feather="framer"></i>
                        <span class="link-title">Pengumuman</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Seleksi Administrasi</li>
                <li class="nav-item {{ active_class(['administration']) }}">
                    <a href="{{ url('/administration') }}" class="nav-link">
                        <i class="link-icon" data-feather="framer"></i>
                        <span class="link-title">Seleksi Administrasi</span>
                    </a>
                </li>
            @endrole
        </ul>
    </div>
</nav>
