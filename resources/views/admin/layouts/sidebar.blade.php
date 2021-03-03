<ul class="sidebar-menu">
    <li><a class="nav-link" href="{{ url('adminguru') }}"><i class="fas fa-pencil-ruler"></i> <span>Data Guru</span></a></li>
    <li><a class="nav-link" href="{{ url('adminmapel') }}"><i class="fas fa-book"></i> <span>Data Mapel</span></a></li>
    <li><a class="nav-link" href="{{ url('adminkelas') }}"><i class="fas fa-university"></i> <span>Data Kelas</span></a></li>
    <li><a class="nav-link" href="{{ url('adminsiswa') }}"><i class="fas fa-graduation-cap"></i> <span>Data Siswa</span></a></li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-balance-scale"></i><span>Ujian Masuk</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ url('adminwaktu') }}">Pelaksanaan Ujian</a></li>
            <li><a class="nav-link" href="{{ url('adminmapelujian') }}">Data Mapel Ujian</a></li>
            <li><a class="nav-link" href="{{ url('adminsoal') }}">Data Soal Ujian</a></li>

        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Peserta Didik Baru</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ url('adminpendaftaran') }}">Data Pendaftaran</a></li>
            <li><a class="nav-link" href="{{ url('admintagihan') }}">Data Tagihan</a></li>
            <li><a class="nav-link" href="{{ url('adminpembagian') }}">Pembagian Kelas</a></li>
        </ul>
    </li>
</ul>