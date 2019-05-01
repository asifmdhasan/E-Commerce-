
 <div id="soft-all-wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('admin.index')}}">Home Panel</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href=""><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li><a href=""><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a></i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Dashboard</a>
                        </li>
                        <li>
                            <a><i class="fa fa-server custom"></i> &nbsp; &nbsp; &nbsp;  Category <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.category')}}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Add Category</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.categorytable')}}"><i class="fa fa-table fa-fw"></i>Category Table</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a><i class="fa fa-server custom"></i> &nbsp; &nbsp; &nbsp;  Product <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.productentry')}}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Product Entry</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.producttable')}}"><i class="fa fa-table fa-fw"></i>Product Table</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a><i class="fa fa-server custom"></i> &nbsp; &nbsp; &nbsp;  Brand <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.brandadd')}}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Brand Add</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.brandtable')}}"><i class="fa fa-table fa-fw"></i>Brand Table</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a><i class="fa fa-server custom"></i> &nbsp; &nbsp; &nbsp;  Slider <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.slideradd')}}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Slider Add</a>
                                </li>
                                 <li>
                                    <a href="{{route('admin.slidertable')}}"><i class="fa fa-table fa-fw"></i>Slider Table </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a><i class="fa fa-server custom"></i> &nbsp; &nbsp; &nbsp;  Manage Order <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('manage_order')}}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Slider Add</a>
                                </li>
                                 <li>
                                    <a href="{{route('manage_order_table')}}"><i class="fa fa-table fa-fw"></i>Order Table </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    </div>
    <!-- /#wrapper -->

