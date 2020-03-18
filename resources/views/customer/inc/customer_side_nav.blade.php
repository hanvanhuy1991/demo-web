<nav id="sidebar">
    <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url({{ asset('customer/images/logo.jpg') }});"></a>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="#homeSubmenu" >Dashboard</a>
            </li>
            <li>
                <a href="{{ route('customer.register') }}">Đăng Ký</a>
            </li>
            <li>
                <a href="{{ route('customer.profile') }}">Thông tin cá nhân</a>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>

        <div class="footer">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>

    </div>
</nav>
