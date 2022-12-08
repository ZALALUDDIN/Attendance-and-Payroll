

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Admin Data 
                <a href="<?= base_url() ?>register" class="btn btn-primary float-end">Add New</a>
                </h6>
            </div>
            <?php if($this->session->flashdata('msg')){
              echo $this->session->flashdata('msg');
            } ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>UserName</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          if($auth){
                            foreach($auth as $a){
                        ?>
                              <tr>
                                  <td><?= $a->id ?></td>
                                  <td><?= $a->name ?></td>
                                  <td><?= $a->email_address ?></td>
                                  <td><?= $a->contact_no ?></td>
                                  <td><?= $a->username ?></td>
                                  <td>
                                      <!-- <a href="<?= base_url() ?>users/edit/<?= $a->id ?>" class="btn btn-info">Edit</a>-->
                                      <a onclick="return confirm('Are you sure?')" href="<?= base_url() ?>auth/delete/<?= $a->id ?>" class="btn btn-danger">Delete</a> 
                                  </td>
                              </tr>
                        <?php } } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>