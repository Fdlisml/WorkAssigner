<!-- =============== Navigation ================ -->
<div class="navigation">
    <ul>
        <li>
            <a href="{{ url('/admin/index') }}">
                <div class="logo-flex">
                    <span class="icon">
                        <div class="logo-bg">
                            <img
                                src="{{ url('image/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png') }}">
                        </div>
                    </span>
                    <span class="title">WorkAssigner</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{ url('/admin/index') }}">
                <span class="icon">
                    <ion-icon name="document-text-outline"></ion-icon>
                </span>
                <span class="title">Proyek</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/admin/user') }}">
                <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                </span>
                <span class="title">Pengguna</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/admin/pekerjaan') }}">
                <span class="icon">
                    <ion-icon name="reader-outline"></ion-icon>
                </span>
                <span class="title">Pekerjaan</span>
            </a>
        </li>
        
        <li>
            <a href="{{ url('/admin/laporan') }}">
                <span class="icon">
                    <ion-icon name="folder-open-outline"></ion-icon>
                </span>
                <span class="title">Laporan</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/logout') }}">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Keluar</span>
            </a>
        </li>
        {{-- <li class="copyright">
            ©2023 by Fadli Ismail
        </li> --}}
    </ul>
</div>
