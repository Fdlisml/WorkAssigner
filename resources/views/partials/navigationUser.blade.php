<!-- =============== Navigation ================ -->
<div class="navigation">
    <ul>
        <li>
            <a href="{{ url("user/page/index") }}">
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
            <a href="{{ url("user/index") }}">
                <span class="icon">
                    <ion-icon name="reader-outline"></ion-icon>
                </span>
                <span class="title">Work</span>
            </a>
        </li>

        <li>
            <a href="{{ url("user/laporan") }}">
                <span class="icon">
                    <ion-icon name="checkmark-done-outline"></ion-icon>
                </span>
                <span class="title">Working Result</span>
            </a>
        </li>

        <li>
            <a href="{{ url("/logout") }}">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Sign Out</span>
            </a>
        </li>
    </ul>
</div>
