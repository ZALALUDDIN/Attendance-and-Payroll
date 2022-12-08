<!DOCTYPE html>
<html lang="en">
<head>
  <title>update salary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Update Salary</h2>
  <?php if($this->session->flashdata('msg')){
    echo $this->session->flashdata('msg');
  } ?>
  <?= form_open('') ?>

  <div class="mb-3 mt-3">
      <label for="employee_id">Employee id:</label>
      <input type="text" value="<?= set_value('employee', $salary->employee_id); ?>" class="form-control" id="employee_id" name="employee_id">
      <span class="text-danger"><?= form_error('employee_id'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="salary">Salary:</label>
      <input type="number" value="<?= set_value('salary', $salary->salary); ?>" class="form-control" id="salary" name="salary">
      <span class="text-danger"><?= form_error('salary'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="pf">Provident Found:</label>
      <input type="number" value="<?= set_value('pf', $salary->pf); ?>" class="form-control" id="pf" name="pf">
      <span class="text-danger"><?= form_error('pf'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="hr">House Rant:</label>
      <input type="number" value="<?= set_value('hr', $salary->hr); ?>" class="form-control" id="hr" name="hr">
      <span class="text-danger"><?= form_error('hr'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="deduction">Deduction:</label>
      <input type="number" value="<?= set_value('deduction', $salary->deduction); ?>" class="form-control" id="deduction" name="deduction">
      <span class="text-danger"><?= form_error('deduction'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="payment">Payment:</label>
      <input type="number" value="<?= set_value('payment', $salary->payment); ?>" class="form-control" id="payment" name="payment">
      <span class="text-danger"><?= form_error('payment'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="year">Year:</label>
      <input type="text" value="<?= set_value('year', $salary->year); ?>" class="form-control" id="year" name="year">
      <span class="text-danger"><?= form_error('year'); ?></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="month">Month:</label>
      <input type="text" value="<?= set_value('month', $salary->month); ?>" class="form-control" id="month" name="month">
      <span class="text-danger"><?= form_error('month'); ?></span>
    </div>


    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>

<script>
    function emp_set(n,i,s){

        $('.modal-title').text('update data of '+n);
        $('#upattid').val(i);
    }
</script>