<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box mt-4">
        <a href="{{url('index')}}" class="logo">
            <span class="logo-container d-flex align-items-center" id="logo">
                <img src="assets/images/logo.png" alt="" class="logo-img" height="30">
                 <h5 class="logo-text ms-3 mt-3">Maranatha Store</h5>
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">@lang('translation.Menu')</li>

                <li>
                    <a href="{{url('index')}}">
                        <i class="uil-home-alt"></i>
                        <span>@lang('translation.Dashboard')</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-store"></i>
                        <span>@lang('translation.Ecommerce')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/ecommerce/product-ecommerce">Products</a></li>
                        <li><a href="/ecommerce/orders-ecommerce">Orders</a></li>
                        <li><a href="/ecommerce/create-product-ecommerce">Add product</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-invoice"></i>
                        <span>@lang('translation.Invoices')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/invoices/invoices-list">@lang('translation.Invoice_List')</a></li>
                        <li><a href="/invoices/invoices-detail">@lang('translation.Invoice_Detail')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-user"></i>
                        <span>User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/roles/index-role">Roles User</a></li>
                        <li><a href="/customers/index-customer">Customers User</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<script>

</script>