
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    {{--    <li class="nav-header">MULTI LEVEL EXAMPLE</li>--}}

    <li class="nav-item">
        <a href="{{ route('admin.domain.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Domain</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.user.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>User</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.customer.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Customer</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.supplier.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Supplier</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.function_medicinal.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Function_medicinal</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.voucher.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Voucher</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.preparation_type.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Preparation_type</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.category.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Category</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Logout</p>
        </a>
    </li>
</ul>
