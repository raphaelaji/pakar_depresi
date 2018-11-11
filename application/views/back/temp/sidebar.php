<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
    <?php 
    $id_user= $this->session->userdata('id_user');
    $level= $this->session->userdata('level'); 
        if($level=='admin'){?>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>back/user/lihat_profile/<?php echo $id_user?>" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>back/faktor/" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Data Faktor</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>back/kategori" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Data Kategori</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>back/gejala" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Data Gejala</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>back/pakar" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Data Aturan Pakar</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>back/user" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Data User</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>back/pemeriksaan" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Pemeriksaan</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="<?php echo site_url('home/logout'); ?>" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
            <!-- End Bottom points-->
        </aside>

        <?php } 
        else { ?>
            <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>back/user/lihat_profile/<?php echo $id_user?>" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>back/pemeriksaan" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Pemeriksaan</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="<?php echo site_url('home/logout'); ?>" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php } ?>