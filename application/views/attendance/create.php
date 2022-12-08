<div class="container mt-3">
  <h2>Add New Attendance</h2>
  <?php if($this->session->flashdata('msg')){
    echo $this->session->flashdata('msg');
  } ?>
  <?= form_open() ?>
  <div class="row">
    <div class="col-4">
      <div class="mb-3 mt-3">
        <label for="att_date">Date:</label>
        <input type="date" value="<?= set_value('att_date',date('Y-m-d')); ?>" class="form-control" id="att_date" name="att_date">
        <span class="text-danger"><?= form_error('att_date'); ?></span>
      </div>
    </div>
    <div class="col-4">
      <div class="mt-4 pt-3">
        <button type="button" class="btn btn-primary" onclick="emplist()">Get Employees</button>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12" id="emp_data">

    </div>
  </div>
    
    
   

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<script>
  function emplist(){
    let att_date=$('#att_date').val();
    $.ajax({
      dataType: "json",
      url: '<?= base_url("attendance/get_empdata") ?>',
      data: {att_date:att_date},
      success: function(d){
        $('#emp_data').html(d);
      }
    });
  }
  
</script>