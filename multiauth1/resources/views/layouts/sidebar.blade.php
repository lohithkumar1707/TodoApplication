<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="position: fixed;">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <!--  -->

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search"/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('./home') }}"><i class='fa fa-home'></i> <span>Home</span></a></li>
            <li><a href="{{ url('./addcontact') }}"><i class='fa fa-phone'></i> <span>Add Contact</span></a></li>
            <li><a href="{{ url('./contactlist') }}"><i class='fa fa-address-book'></i> <span>Contact List</span></a></li>
            <li><a href="{{ url('./profile') }}"><i class='fa fa-user-o'></i> <span>Profile</span></a></li>
            <li><a href="{{ url('./users/logout') }}"><i class='fa fa-sign-out'></i> <span>Logout</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
