<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo photo();?>" class="img-circle img-profile" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo profile()->first_name." ".profile()->last_name; ?></p>
                <?php if(internetConnected()): ?>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                <?php Else: ?>
                <a href="#"><i class="fa fa-circle text-danger"></i> Offline</a>
                <?php EndIf; ?>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menu Utama</li>
             <?php echo sidebarMenu(); ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>