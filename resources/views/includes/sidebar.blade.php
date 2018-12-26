<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu"
         class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark m-aside-menu--dropdown "
         data-menu-vertical="true"
         data-menu-dropdown="true" data-menu-scrollable="true" data-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item {{ session('sidebar') === 'home' ? 'm-menu__item--active' : ''}}"
                aria-haspopup="true">
                <a href="{{ route('home') }}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-text">
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="m-menu__item  {{ session('sidebar') === 'categories' ? 'm-menu__item--active' : ''}}"
                aria-haspopup="true">
                <a href="{{ route('listCategories') }}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon la la-sitemap"></i>
                    <span class="m-menu__link-text">
                        Blogs Categories
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->
