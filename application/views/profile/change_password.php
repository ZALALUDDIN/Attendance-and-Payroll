<div class="wrapper">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="row align-items-center">
						<div class="col-md-8">
							<h4 class="page-title m-0">Change Password</h4>
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
						<?= form_open('',$attributes) ?>

							<div class="form-group row">
								<label class="col-sm-3 control-label" for="opassword">Old Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="opassword" id="opassword">
									<span class="help-block"><small><?= form_error('opassword'); ?></small></span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 control-label" for="password">New Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="password" id="password">
									<span class="help-block"><small><?= form_error('password'); ?></small></span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 control-label" for="cpassword">Confirm New Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="cpassword" id="cpassword">
									<span class="help-block"><small><?= form_error('password'); ?></small></span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
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