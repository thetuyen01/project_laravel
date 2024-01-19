<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
            <a href="#">Thegioisua</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="{{ route('admin.list_user') }}" class="sidebar-link">
                <i class="lni lni-user"></i>
                <span>User</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('formBrand') }}" class="sidebar-link">
                <i class="fa-solid fa-copyright"></i>
                <span>Brand</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="{{ route('admin.category.formCategory') }}" class="sidebar-link">
                <i class="fa-solid fa-list"></i>
                <span>Category</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin.product.list') }}" class="sidebar-link">
                <i class="fa-brands fa-product-hunt"></i>
                <span>Prodcut</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin.invoice.getListOrder') }}" class="sidebar-link">
                <i class="fa-solid fa-file-invoice"></i>
                <span>Invoice</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('showformbogimage') }}" class="sidebar-link">
                <i class="fa-solid fa-image"></i>
                <span>Images Carousel</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="#" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>
