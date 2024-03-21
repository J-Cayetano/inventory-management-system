<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li
                        class="nav-item dropdown {{ Route::is('brands.*') || Route::is('categories.*') || Route::is('subcategories.*') || Route::is('units.*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 11l3 3l8 -8" />
                                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Setups Management
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ Route::is('brands.*') || Route::is('categories.*') || Route::is('subcategories.*') || Route::is('units.*') ? 'active' : '' }}"
                                            href="#sidebar-authentication" data-bs-toggle="dropdown"
                                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                                            Items
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('brands.index') }}"
                                                class="dropdown-item {{ Route::is('brands.*') ? 'active' : '' }}">
                                                Brands
                                            </a>
                                            <a href="{{ route('categories.index') }}"
                                                class="dropdown-item {{ Route::is('categories.*') ? 'active' : '' }}">
                                                Categories
                                            </a>
                                            <a href="{{ route('subcategories.index') }}"
                                                class="dropdown-item {{ Route::is('subcategories.*') ? 'active' : '' }}">
                                                Subcategories
                                            </a>
                                            <a href="{{ route('units.index') }}"
                                                class="dropdown-item {{ Route::is('units.*') ? 'active' : '' }}">
                                                Units
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                            aria-expanded="false">
                                            Item Variations
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="./sign-in.html" class="dropdown-item">
                                                Colors
                                            </a>
                                            <a href="./sign-in-link.html" class="dropdown-item">
                                                Sizes
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item {{ Route::is('inventory.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('inventory.gallery') }}">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12l0 9" />
                                    <path d="M12 12l-8 -4.5" />
                                    <path d="M16 5.25l-8 4.5" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Inventory Management
                            </span>
                        </a>
                    </li>
                    <li
                        class="nav-item dropdown {{ Route::is('vendors.*') || Route::is('purchase_orders.*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                    <path d="M3 9l4 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Purchase Management
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div
                                class="dropdown-menu-columns {{ Route::is('vendors') || Route::is('purchase_orders') ? 'active' : '' }}">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item {{ Route::is('vendors.*') ? 'active' : '' }}"
                                        href="{{ route('vendors.index') }}">
                                        Items / Products
                                    </a>
                                    <a class="dropdown-item {{ Route::is('vendors.*') ? 'active' : '' }}"
                                        href="{{ route('vendors.index') }}">
                                        Vendors
                                    </a>
                                    <a class="dropdown-item {{ Route::is('purchase_orders.*') ? 'active' : '' }}"
                                        href="{{ route('purchase_orders.index') }}">
                                        Purchase Orders
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
