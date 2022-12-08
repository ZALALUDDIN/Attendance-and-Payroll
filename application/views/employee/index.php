
    <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables</span></h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Employee List</h5>
                <div class="table-responsive text-nowrap">
                  <a href="<?= base_url() ?>employee/add" class="btn btn-primary float-end">Add New</a>
                    <?php if($this->session->flashdata('msg')){
                      echo $this->session->flashdata('msg');
                    } ?>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Title</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>National ID</th>
                                <th>Salary</th>
                                <th>PF</th>
                                <th>HR</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                              if($employee){
                                foreach($employee as $e){
                            ?>
                                  <tr>
                                      <td><?= $e->id ?></td>
                                      <td><?= $e->name ?></td>
                                      <td><?= $e->designation ?></td>
                                      <td><?= $e->contact ?></td>
                                      <td><?= $e->email ?></td>
                                      <td><?= $e->nid ?></td>
                                      <td><?= $e->salary ?></td>
                                      <td><?= $e->pf ?></td>
                                      <td><?= $e->hr ?></td>
                                      <td>
                                          <a href="<?= base_url() ?>employee/edit/<?= $e->id ?>" class="btn btn-info">Edit</a>
                                          <a onclick="return confirm('Are you sure?')" href="<?= base_url() ?>employee/delete/<?= $e->id ?>" class="btn btn-danger">Delete</a>
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