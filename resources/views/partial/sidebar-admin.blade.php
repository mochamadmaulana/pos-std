<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-header">MENU</li>

        <!-- Data Master -->
        <li class="nav-item {{ Request::is('admin/data-master*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('admin/data-master*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-server"></i>
                <p>
                    Data Master
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.data-master.kategori-produk.index') }}" class="nav-link {{ Request::is('admin/data-master/kategori-produk*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kategori Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.data-master.satuan-produk.index') }}" class="nav-link {{ Request::is('admin/data-master/satuan-produk*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Satuan Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.data-master.jenis-pembayaran.index') }}" class="nav-link {{ Request::is('admin/data-master/jenis-pembayaran*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jenis Pembayaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.data-master.termin-pembayaran.index') }}" class="nav-link {{ Request::is('admin/data-master/termin-pembayaran*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Termin Pembayaran</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Pemasok -->
        <li class="nav-item">
            <a href="{{ route('admin.pemasok.index') }}" class="nav-link {{ Request::is('admin/pemasok*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                    Pemasok
                </p>
            </a>
        </li>

        <!-- Produk -->
        <li class="nav-item">
            <a href="{{ route('admin.produk.index') }}" class="nav-link {{ Request::is('admin/produk*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-boxes"></i>
                <p>
                    Produk
                </p>
            </a>
        </li>

        <!-- Pelanggan -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Pelanggan
                </p>
            </a>
        </li>

        <!-- Rekening Bank/E-Wallet -->
        <li class="nav-item">
            <a href="{{ route('admin.bank-wallet.index') }}" class="nav-link {{ Request::is('admin/bank-wallet*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>
                    Bank/E-Wallet
                </p>
            </a>
        </li>

        <!-- Penjualan -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>
                    Penjualan
                </p>
            </a>
        </li>

        <!-- Pembelian -->
        <li class="nav-item">
            <a href="{{ route('admin.pembelian.index') }}" class="nav-link {{ Request::is('admin/pembelian*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-shopping-bag"></i>
                <p>
                    Pembelian
                </p>
            </a>
        </li>

        <!-- Laporan -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                    Laporan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Penjualan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembelian</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-header">PENGATURAN</li>

        <!-- Profile -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Profile
                </p>
            </a>
        </li>

        <!-- Karyawan -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                    Karyawan
                </p>
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item mb-5">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>
