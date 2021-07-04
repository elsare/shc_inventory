<div class="page-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start ">
                <a href="{{ route('home') }}" class="nav-link nav-toggle">
                    <i class="fa fa-home"></i>
                    <span class="title">Home</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-database"></i>
                    <span class="title {{\Request::segment(1) === 'Master' ? 'menu-item-active' : ''}}">Menu Master</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  {{\Request::segment(2) === 'Departemen' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Master.Departemen.index') }}">
                            <span class="title">Departemen</span>
                        </a>
                    </li>
                    <li class="nav-item  {{\Request::segment(2) === 'Model' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Master.Model.index') }}">
                            <span class="title">Model</span>
                        </a>
                    </li>
                    <li class="nav-item  {{\Request::segment(2) === 'PartNumber' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Master.PartNumber.index') }}" class="nav-link nav-toggle">
                            <span class="title">Part Number</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_1.html" class="nav-link "> Flash </a>
                            </li>
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_2.html" class="nav-link "> Big Counter </a>
                            </li>
                        </ul> -->
                    </li>
                    <!-- <li class="nav-item  {{\Request::segment(2) === 'Rak' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Master.Rak.index') }}">
                            <span class="title">Rak</span>
                        </a>
                    </li> -->
                    <li class="nav-item  {{\Request::segment(2) === 'Stock' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Master.Stock.index') }}">
                            <span class="title">Stock</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-folder-open"></i>
                    <span class="title {{\Request::segment(1) === 'Transaksi' ? 'menu-item-active' : ''}}">Menu Transaksi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  {{\Request::segment(2) === 'Input' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Transaksi.Input.index') }}">
                            <span class="title">Input</span>
                        </a>
                    </li>
                    <li class="nav-item  {{\Request::segment(2) === 'Output' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Transaksi.Output.index') }}" class="nav-link nav-toggle">
                            <span class="title">Output</span>
                            <span class="arrow"></span>
                        </a>
                    </li>
                    <li class="nav-item  {{\Request::segment(2) === 'Gap' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Transaksi.Gap.index') }}" class="nav-link nav-toggle">
                            <span class="title">Gap</span>
                            <span class="arrow"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start {{\Request::segment(1) === 'Management' ? 'nav-item-active' : ''}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">User Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <!-- <li class="nav-item {{\Request::segment(2) === 'User' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Management.User.index') }}" class="nav-link ">
                            <i class="fa fa-user"></i>
                            <span class="title">User</span>
                        </a>
                    </li> -->
                    <li class="nav-item {{\Request::segment(2) === 'Profile' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Management.Profile.index') }}" class="nav-link ">
                            <i class="fa fa-user"></i>
                            <span class="title">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item {{\Request::segment(2) === 'User' ? 'nav-item-active' : ''}}">
                        <a href="{{ route('Management.User.index') }}" class="nav-link ">
                            <i class="fa fa-user"></i>
                            <span class="title">User</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>