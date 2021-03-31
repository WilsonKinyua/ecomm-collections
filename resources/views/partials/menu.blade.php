<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('order_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-sort c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.order.title') }}
                </a>
            </li>
        @endcan
        @can('review_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reviews") || request()->is("admin/reviews/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-star c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.review.title') }}
                </a>
            </li>
        @endcan
        @can('slide_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.slides.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/slides") || request()->is("admin/slides/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-images c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.slide.title') }}
                </a>
            </li>
        @endcan
        @can('sub_slide_ad_one_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sub-slide-ad-ones.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sub-slide-ad-ones") || request()->is("admin/sub-slide-ad-ones/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-image c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.subSlideAdOne.title') }}
                </a>
            </li>
        @endcan
        @can('sub_slide_ad_two_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sub-slide-ad-twos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sub-slide-ad-twos") || request()->is("admin/sub-slide-ad-twos/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-image c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.subSlideAdTwo.title') }}
                </a>
            </li>
        @endcan
        @can('site_setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.site-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/site-settings") || request()->is("admin/site-settings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.siteSetting.title') }}
                </a>
            </li>
        @endcan
        @can('product_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/product-main-categories*") ? "c-show" : "" }} {{ request()->is("admin/product-sub-categories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-utensils c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.productManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-utensils c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_main_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-main-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-main-categories") || request()->is("admin/product-main-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-pencil-ruler c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productMainCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_sub_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-sub-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-sub-categories") || request()->is("admin/product-sub-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-pencil-ruler c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productSubCategory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>