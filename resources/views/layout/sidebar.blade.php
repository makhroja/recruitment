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
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/home']) }}">
                <a href="{{ url('/home') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            {{-- @role('administrator|sdm') --}}
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
            <li class="nav-item {{ active_class(['applications']) }}">
                <a href="{{ url('/applications') }}" class="nav-link">
                    <i class="link-icon" data-feather="framer"></i>
                    <span class="link-title">Data Lamaran</span>
                </a>
            </li>

            <li class="nav-item nav-category">Tahapan Seleksi</li>
            <li class="nav-item {{ active_class(['administration']) }}">
                <a href="{{ url('/administration') }}" class="nav-link">
                    <i class="link-icon" data-feather="git-commit"></i>
                    <span class="link-title">Seleksi Administrasi</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['phase2']) }}">
                <a href="{{ url('/phase2') }}" class="nav-link">
                    <i class="link-icon" data-feather="git-commit"></i>
                    <span class="link-title">Tes Tertulis</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['phase3']) }}">
                <a href="{{ url('/phase3') }}" class="nav-link">
                    <i class="link-icon" data-feather="git-commit"></i>
                    <span class="link-title">Wawancara Unit</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['phase4']) }}">
                <a href="{{ url('/phase4') }}" class="nav-link">
                    <i class="link-icon" data-feather="git-commit"></i>
                    <span class="link-title">Praktek</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['phase5']) }}">
                <a href="{{ url('/phase5') }}" class="nav-link">
                    <i class="link-icon" data-feather="git-commit"></i>
                    <span class="link-title">Wawancara HRD</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['phase6']) }}">
                <a href="{{ url('/phase6') }}" class="nav-link">
                    <i class="link-icon" data-feather="git-commit"></i>
                    <span class="link-title">Tes Psikotes</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['phase7']) }}">
                <a href="{{ url('/phase7') }}" class="nav-link">
                    <i class="link-icon" data-feather="git-commit"></i>
                    <span class="link-title">Wawancara Performance</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['phase8']) }}">
                <a href="{{ url('/phase8') }}" class="nav-link">
                    <i class="link-icon" data-feather="git-commit"></i>
                    <span class="link-title">Tes Kesehatan</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['phase9']) }}">
                <a href="{{ url('/phase9') }}" class="nav-link">
                    <i class="link-icon" data-feather="git-commit"></i>
                    <span class="link-title">Tahap Akhir</span>
                </a>
            </li>
            {{-- @endrole --}}

            {{-- @role('peserta') --}}
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
            {{-- @endrole
            @role('karu') --}}
            <li class="nav-item nav-category">Ka. Ruang/Koordinator</li>
            <li class="nav-item {{ active_class(['input-nilai']) }}">
                <a href="{{ url('/input-nilai') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Input Nilai</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['index-users']) }}">
                <a href="{{ url('/index-users') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Data Peserta</span>
                </a>
            </li>
            {{-- @endrole --}}
            {{-- @role('karu') --}}
            <li class="nav-item nav-category">HRD</li>
            <li class="nav-item {{ active_class(['input-nilai']) }}">
                <a href="{{ url('/input-nilai') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Input Nilai</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['index-users']) }}">
                <a href="{{ url('/index-users') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Data Peserta</span>
                </a>
            </li>
            {{-- @endrole --}}
        </ul>
    </div>
</nav>
