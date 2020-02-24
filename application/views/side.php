<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <?php if ($this->session->userdata('foto') == '') { ?>
          <img src="<?php echo link_siakad().'/user.png'; ?>" class="img-circle" alt="User Image">
        <?php } else { ?>
          <img src="<?php echo link_siakad().'/'.$this->session->userdata('foto') ?>" class="img-circle" alt="User Image">
        <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <?php 
        if ($this->session->userdata('level') == '1') {
         ?>
        
        <li><a href="app"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        
        <li><a href="materi"><i class="fa fa-circle-o"></i> <span>Data Materi</span></a></li>
        <li><a href="tugas"><i class="fa fa-circle-o"></i> <span>Data Tugas</span></a></li>
        <li><a href="Download"><i class="fa fa-cloud-download"></i> <span>Download</span></a></li>
      <?php } elseif ($this->session->userdata('level') == '3') { ?>
         

      
      <?php } elseif ($this->session->userdata('level') == '4') { ?>
               
      

      <?php } ?>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Tentang Aplikasi</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Bantuan</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Restore Database</h4>
              </div>
              <div class="modal-body">
                <form action="app/import_db" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Import File .Sql</label>
                    <input type="file" name="db_upload" class="form-control">
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Restore</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->