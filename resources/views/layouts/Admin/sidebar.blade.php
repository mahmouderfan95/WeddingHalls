<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li>
                <a class="menu-item" href="{{ route('admin.dashboard') }}">
                    <i class="la la-home"></i>
                    <span data-i18n="Classic Menu">الصفحة الرئيسية</span>
                </a>
            </li>
            <li>
                <a class="menu-item" href="{{ route('users.index') }}">
                    <i class="icon-user"></i>
                    <span data-i18n="Classic Menu">العملاء</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\User::Customer()->count() }}</span>
                </a>
                <a class="menu-item" href="{{ route('wedding-halls-categories.index') }}">
                    <i class="icon-user"></i>
                    <span data-i18n="Classic Menu">اقسام قاعات الافراح</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\WeddingHallCategory::count() }}</span>
                </a>
                <a class="menu-item" href="{{ route('wedding-halls.index') }}">
                    <i class="icon-user"></i>
                    <span data-i18n="Classic Menu">قاعات الافراح</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\WeddingHall::count() }}</span>
                </a>
                <a class="menu-item" href="{{ route('wedding-halls-booking.index') }}">
                    <i class="icon-user"></i>
                    <span data-i18n="Classic Menu">الحجوزات</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\WeddingHallBooking::count() }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
