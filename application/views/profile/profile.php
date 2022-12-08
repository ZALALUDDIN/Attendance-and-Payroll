<div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="page-title m-0">Profile</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			<div class="row">
				<div class="col-sm-8 offset-sm-2">
					<div class="card">
					<?php if($this->session->flashdata('msg')){
						echo $this->session->flashdata('msg');
					} ?>
						<div class="card-body">
							<?php $attributes = array('class' => 'form-horizontal'); ?>
							<?= form_open_multipart('',$attributes) ?>
								<div class="form-group row">
									<label class="col-sm-3 control-label" for="uname">Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="<?= set_value('name', $userdata->name) ?>" name="name" id="uname">
										<span class="help-block"><small><?= form_error('name'); ?></small></span>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 control-label" for="email_address">Email</label>
									<div class="col-sm-10">
										<input type="email" id="email_address" name="email_address" class="form-control" value="<?= set_value('email_address)', $userdata->email_address) ?>">
										<span class="help-block"><small><?= form_error('email_address'); ?></small></span>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 control-label" for="contact_no">Contact</label>
									<div class="col-sm-10">
										<input type="text" id="contact_no" name="contact_no" class="form-control" value="<?= set_value('contact_no)', $userdata->contact_no) ?>">
										<span class="help-block"><small><?= form_error('contact_no'); ?></small></span>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 control-label" for="username">Username</label>
									<div class="col-sm-10">
										<input type="text" id="username" name="username" class="form-control" value="<?= set_value('username)', $userdata->username) ?>">
										<span class="help-block"><small><?= form_error('username'); ?></small></span>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 control-label" for="photo">Photo</label>
									<div class="col-sm-10">
										<input type="file" id="photo" name="photo" class="form-control" onchange="pview(this)">
										<img src="<?= base_url('upload/profile/demo.jpg') ?>" id="photo_p" class="my-1" width="100px" alt="">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-p-0 control-label"></label>
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
								</div>
							</form>
						</div> <!-- card-body -->
					</div> <!-- card -->
				</div> <!-- col -->
			</div> <!-- End row -->

	</div>
</div>
<!-- end wrapper -->
<script>
	function pview(e){
		document.getElementById('photo_p').src=window.URL.createObjectURL(e.files[0]);
	}
</script>