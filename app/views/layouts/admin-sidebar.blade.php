<!-- Menus laterais -->

<ul class="nav" id="side-menu">
    <li>
        <a href=" {{ URL::to('admin/dashboard') }} "><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
    </li>
    <li>
        <a href=" {{ URL::to('admin/users') }} "><i class="fa fa-user fa-fw"></i> {{ Lang::get('admin.users') }}</a>
    </li>
    <li>
        <a href=" {{ URL::to('admin/companies') }} "><i class="fa fa-building-o fa-fw"></i> {{ Lang::get('admin.companies') }}</a>
    </li>
</ul>
<!-- /#side-menu -->



