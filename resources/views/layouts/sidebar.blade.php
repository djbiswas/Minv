<!-- Wrapper -->
<div class="wrapper">

    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header" class="shadow-sm">
            <h3 class="text-title text-center">
                {{-- {{ config('app.name') }} --}}
                Modhumoti Agency
                {{-- <img src="/assets/img/logo.jpg" alt=""> --}}
            </h3>
        </div>
        <hr class="m-0">
        <ul class="list-unstyled components">
            <li class="accordion" id="sstradeAccordion">
                <a href="/"><i class="material-icons-outlined">home</i>Dashboard</a>

                <a href="#account_typeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">credit_card</i>Account Types</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'account_types' || Request::path() === 'account_types/create' ? 'show ' : ''}}" data-parent="#account_typeSubmenu" id="account_typeSubmenu">
                    <li>
                        <a href="/account_types">Account Type List</a>
                    </li>
                    <li>
                        <a href="/account_types/create">New Account Type</a>
                    </li>
                </ul>

                <a href="#accountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">credit_card</i>Account</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'accounts' || Request::path() === 'accounts/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="accountSubmenu">
                    <li>
                        <a href="/accounts">Debit/Credit List</a>
                    </li>
                    <li>
                        <a href="/accounts/create">New Transaction</a>
                    </li>
                </ul>

                <a href="#supplierSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">people</i>Supplier</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'suppliers' || Request::path() === 'suppliers/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="supplierSubmenu">
                    <li>
                        <a href="/suppliers/create">Add Supplier</a>
                    </li>
                    <li>
                        <a href="/suppliers">View Supplier</a>
                    </li>
                </ul>

                <a href="#customerSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons">people</i>Customer</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'customers' || Request::path() === 'customers/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="customerSubmenu">
                    <li>
                        <a href="/customers/create">Add Customer</a>
                    </li>
                    <li>
                        <a href="/customers">View Customer</a>
                    </li>
                </ul>

                <a href="#brandsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">archive</i>Product Brand</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'brands' || Request::path() === 'brands/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="brandsSubmenu">
                    <li>
                        <a href="/brands/create">Add Product Brands</a>
                    </li>
                    <li>
                        <a href="/brands">Product Brands List</a>
                    </li>
                    
                </ul>

                <a href="#groupsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">archive</i>Product Groups</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'groups' || Request::path() === 'groups/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="groupsSubmenu">
                    <li>
                        <a href="/groups/create">Add Product Groups</a>
                    </li>
                    <li>
                        <a href="/groups">Product Groups List</a>
                    </li>
                </ul>
                
                <a href="#product_typesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">archive</i>Product Types</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'product_types' || Request::path() === 'product_types/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="product_typesSubmenu">
                    <li>
                        <a href="/product_types/create">Add Product Type</a>
                    </li>
                    <li>
                        <a href="/product_types">Product Type List</a>
                    </li>
                </ul>

                <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">archive</i>Products</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'products' || Request::path() === 'products/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="productSubmenu">
                    <li>
                        <a href="/products/create">Add Product</a>
                    </li>
                    <li>
                        <a href="/products">View Product</a>
                    </li>
                    <li>
                        <a href="/product_bulk_update">Product Bulk Update</a>
                    </li>
                </ul>

                <a href="#purchasesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">archive</i>Purchases</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'purchases' || Request::path() === 'purchases/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="purchasesSubmenu">
                    <li>
                        <a href="/purchases/create">New Purchases</a>
                    </li>
                    <li>
                        <a href="/purchases">View Purchases</a>
                    </li>
                </ul>

                <a href="#salesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">bar_chart</i>Sales</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'sales' || Request::path() === 'sales/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="salesSubmenu">
                    <li>
                        <a href="/sales/create">Add Sales</a>
                    </li>
                    <li>
                        <a href="/sales">View Sales</a>
                    </li>
                </ul>

                <a href="#returnSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">bar_chart</i>Sale Returns</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'sales_returns' || Request::path() === 'sales_returns/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="returnSubmenu">
                    <li>
                        <a href="/sales_returns">Sale Return List</a>
                    </li>
                    <li>
                        <a href="/sales_returns/create">New Return</a>
                    </li>
                </ul>

                <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">notes</i>Report</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'sales_report' || Request::path() === 'purchases_report' || Request::path() === 'stock_report'|| Request::path() === 'debit_credit'|| Request::path() === 'account_month' }}" data-parent="#sstradeAccordion" id="reportSubmenu">

                    <li>
                        <a href="/sales_report">Sales Report</a>
                    </li>
                    <li>
                        <a href="/account_month">Total Transaction</a>
                    </li>
                    <li>
                        <a href="/debit_credit">Transaction Report</a>
                    </li>
                    <li>
                        <a href="/purchases_report">Purchase</a>
                    </li>
                    <li>
                        <a href="/customer_reports">Customers Report</a>
                    </li><li>
                        <a href="/stock_report">Stock Report</a>
                    </li>
                </ul>

                <a href="#settingsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons-outlined">settings</i>Settings</a>
                <ul class="collapse list-unstyled {{ Request::path() === 'productTypes' || Request::path() === 'productTypes/create' ? 'show ' : ''}}" data-parent="#sstradeAccordion" id="settingsSubmenu">
                    <li>
                        <a href="/settings">Profile Setting</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar  -->
