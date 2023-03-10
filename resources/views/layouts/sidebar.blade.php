@php
    $name = Auth::user()->name ?? Session::get('name');
    $level = Auth::user()->level ?? Session::get('level');
@endphp
<nav class="sidebar">
    <header>
        <div class="image-text">
            <span class="image">
                <i class='bx bxl-graphql'></i>
            </span>
            <div class="text header-text">
                <span class="name">{{ $name }}</span>
            </div>
        </div>
    </header>
    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="{{$level == 'siswa' ? '/dashboard-siswa' : '/dashboard'}}">
                        <i class='bx bxs-grid-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <span class="text nav-text">Manajemen Data</span>
                </li>
                @if (Auth::check())
                    @if ($level == 'admin')
                        <li class="nav-link">
                            <a href="/admin/spp">
                                <i class='bx bxs-building icon'></i>
                                <span class="text nav-text">SPP</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="/admin/kelas">
                                <i class='bx bxs-school icon'></i>
                                <span class="text nav-text">Kelas</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="/admin/petugas">
                                <i class='bx bxs-group icon'></i>
                                <span class="text nav-text">Petugas</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="/admin/siswa">
                                <i class='bx bxs-graduation icon'></i>
                                <span class="text nav-text">Siswa</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-link">
                        <a href="/admin/pembayaran">
                            <i class='bx bxs-wallet icon'></i>
                            <span class="text nav-text">Pembayaran</span>
                        </a>
                    </li>
                    <li class="nav-link">


                        <span class="text nav-text">Pembayaran</span>

                    </li>
                    <li class="nav-link">
                        <a href="/admin/pembayaran/history">
                            <i class='bx bxs-hourglass icon'></i>
                            <span class="text nav-text">History Pembayaran</span>
                        </a>
                    </li>
                @else
                    <li class="nav-link">
                        <a href="/pembayaran/history">
                            <i class='bx bxs-hourglass icon'></i>
                            <span class="text nav-text">History Pembayaran</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="bottom-content">
            <li class="">
                <a href="{{url($level == 'siswa' ? '/logout-siswa' : '/logout')}}">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
        </div>
    </div>
</nav>
