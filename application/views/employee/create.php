<!DOCTYPE html>
<html lang="en">
<head>
  <title>add employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Add New Employee</h2>
  <?php if($this->session->flashdata('msg')){
    echo $this->session->flashdata('msg');
  } ?>
  <?= form_open('employee/store') ?>
    <div class="mb-3 mt-3">
      <label for="name">Full Name:</label>
      <input type="text" value="<?= set_value('name'); ?>" class="form-control" id="name" name="name">
      <span class="text-danger"><?= form_error('name'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="designation">Designation:</label>
      <input type="text" value="<?= set_value('designation'); ?>" class="form-control" id="designation" name="designation">
      <span class="text-danger"><?= form_error('designation'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="contact">Contact Number:</label>
      <input type="text" value="<?= set_value('contact'); ?>" class="form-control" id="contact" name="contact">
      <span class="text-danger"><?= form_error('contact'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" value="<?= set_value('email'); ?>" class="form-control" id="email" name="email">
      <span class="text-danger"><?= form_error('email'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="nid">Nation ID:</label>
      <input type="text" value="<?= set_value('nid'); ?>" class="form-control" id="nid" name="nid">
      <span class="text-danger"><?= form_error('nid'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="salary">Salary:</label>
      <input type="text" value="<?= set_value('salary'); ?>" class="form-control" id="salary" name="salary">
      <span class="text-danger"><?= form_error('salary'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="pf">Provident Fund:</label>
      <input type="text" value="<?= set_value('pf'); ?>" class="form-control" id="pf" name="pf">
      <span class="text-danger"><?= form_error('pf'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="hr">House Rant:</label>
      <input type="text" value="<?= set_value('hr'); ?>" class="form-control" id="hr" name="hr">
      <span class="text-danger"><?= form_error('hr'); ?></span>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
