<!-- =============== Navigation ================ -->
<div class="navigation">
    <ul>
        <li>
            <a href="{{ url('karyawan/page/index') }}">
                <div class="logo-flex">
                    <span class="icon">
                        <div class="logo-bg">
                            <img src="{{ asset('image/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png') }}">
                        </div>
                    </span>
                    <span class="title">WorkAssigner</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{ url('karyawan/index') }}">
                <span class="icon">
                    <ion-icon name="reader-outline"></ion-icon>
                </span>
                <span class="title">Pekerjaan</span>
            </a>
        </li>

        <li>
            <a href="{{ url('karyawan/laporan') }}">
                <span class="icon">
                    <ion-icon name="checkmark-done-outline"></ion-icon>
                </span>
                <span class="title">Hasil Pekerjaan</span>
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