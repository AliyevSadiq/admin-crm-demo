<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- links must added from modules like this
                  @include('statistic::partials.menu')
                  @include('ads::partials.menu')
                  @include('shops::partials.menu')
                --}}
                <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{tr('admin','Admin Panel')}}
                        </p>
                    </a>
                </li>
                @include('statistic::admin.partials.menu')
                @include('ad::admin.partials.menu')
                @include('shop::admin.partials.menu')
                @include('user::admin.partials.menu')
                @include('service::admin.partials.menu')
                @include('claim::admin.partials.menu')
                @include('banner::admin.partials.menu')
                @include('dictionary::admin.partials.menu')
                @include('message::admin.partials.menu')
                @include('page::admin.partials.menu')
                @include('payment::admin.partials.menu')
                @include('balance::admin.partials.menu')
                @include('comment::admin.partials.menu')
                @include('seo::admin.partials.menu')
                @include('settings::admin.partials.menu')

{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-copy"></i>--}}
{{--                        <p>--}}
{{--                            Loglar--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <p>Логи объявлений</p>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <p>Логи категории</p>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <p>Логи пользователей</p>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <p>Логи параметров пользователей</p>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <p>Логи магазинов</p>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <p>For Call </p>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <p>Логи Bakcell Ulduzum</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-copy"></i>--}}
{{--                        <p>--}}
{{--                            Hesabatlar--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <p>Отчет по успешным выплатам</p>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <p>Отчет по не произведенным выплатам</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>
        </nav>
    </div>
</aside>
