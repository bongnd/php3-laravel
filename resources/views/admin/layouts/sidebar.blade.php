<ul class="nav flex-column p-3">
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('admin.categories.index') }}">Quản lý danh mục</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('admin.products.list') }}">Quản lý sản phẩm</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-red" href="{{ route('logout') }}">Logout</a>
    </li></ul>
