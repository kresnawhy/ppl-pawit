<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-file-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.auditLog.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('lahan_access')
                <li class="nav-item">
                    <a href="{{ route("admin.lahans.index") }}" class="nav-link {{ request()->is('admin/lahans') || request()->is('admin/lahans/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-th-large nav-icon">

                        </i>
                        {{ trans('cruds.lahan.title') }}
                    </a>
                </li>
            @endcan
            @can('panen_access')
                <li class="nav-item">
                    <a href="{{ route("admin.panens.index") }}" class="nav-link {{ request()->is('admin/panens') || request()->is('admin/panens/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-balance-scale nav-icon">

                        </i>
                        {{ trans('cruds.panen.title') }}
                    </a>
                </li>
            @endcan
            @can('tengkulak_access')
                <li class="nav-item">
                    <a href="{{ route("admin.tengkulaks.index") }}" class="nav-link {{ request()->is('admin/tengkulaks') || request()->is('admin/tengkulaks/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-user-tie nav-icon">

                        </i>
                        {{ trans('cruds.tengkulak.title') }}
                    </a>
                </li>
            @endcan
            @can('penjualan_access')
                <li class="nav-item">
                    <a href="{{ route("admin.penjualans.index") }}" class="nav-link {{ request()->is('admin/penjualans') || request()->is('admin/penjualans/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-hand-holding-usd nav-icon">

                        </i>
                        {{ trans('cruds.penjualan.title') }}
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>