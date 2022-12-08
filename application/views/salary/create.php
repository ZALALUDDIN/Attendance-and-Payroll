<div class="container mt-3">
  <h2>Add New salary</h2>
  <?php if($this->session->flashdata('msg')){
    echo $this->session->flashdata('msg');
  } ?>
  <div class="row">
    <div class="col-8">
      <?= form_open('salary/store') ?>
        <div class="mb-3">
          <label for="emp_id" class="form-label">Employee Name</label>
          <select onchange="get_sal()"
            type="text" class="form-control" id="emp_id" name="emp_id">
            <option value="">Select Employee</option>
                <?php
                    if($employee){
                        foreach($employee as $e){
                ?>  
                    <option value="<?= $e->id ?>" data-pf="<?= $e->pf ?>" data-hr="<?= $e->hr ?>" data-salary="<?= $e->salary ?>"> <?= $e->name ?> </option>
                <?php }} ?>
          </select>
          <span class="text-danger"><?= form_error('employee'); ?></span>
        </div>
        <div class="mb-3 mt-3">
          <label for="year">Year</label>
          <select
            type="text" onchange="get_sal()" class="form-control" id="year" name="year">
            <option value="">Select Year</option>
            <?php 
              //past 8 years
              for($i=0;$i<8;$i++) {?>
                <option value="<?=date("Y", strtotime("-$i years"))?>"><?=date("Y", strtotime("-$i years"))?></option>
              <?php } ?>
            </select>
            <span class="text-danger"><?= form_error('year'); ?></span>
        </div>

        <div class="mb-3 mt-3">
          <label for="month">Month:</label>
          <select
            type="text" onchange="get_sal()" class="form-control" id="month" name="month">
            <option value="">Select Month</option>
                <?php //All months
                for($i=1;$i<=12;$i++) { ?>
                <option value="<?=$i?>">
                  <?=date("F", strtotime("2022-" . $i . "-25"))?></option>
                <?php } ?>
          </select><span class="text-danger"><?= form_error('month'); ?></span>
        </div>
        <div class="mb-3 mt-3">
          <label for="salary">Basic Salary:</label>
          <input type="number" value="<?= set_value('salary'); ?>" class="form-control" id="salary" name="salary">
          <span class="text-danger"><?= form_error('salary'); ?></span>
        </div>
        <div class="mb-3 mt-3">
          <label for="pf">Provident Found:</label>
          <input type="number" value="<?= set_value('pf'); ?>" class="form-control" id="pf" name="pf">
          <span class="text-danger"><?= form_error('pf'); ?></span>
        </div>
        <div class="mb-3 mt-3">
          <label for="hr">House Rant:</label>
          <input type="number" value="<?= set_value('hr'); ?>" class="form-control" id="hr" name="hr">
          <span class="text-danger"><?= form_error('hr'); ?></span>
        </div>
        <div class="mb-3 mt-3">
          <label for="deduction">Deduction:</label>
          <input type="number" value="<?= set_value('deduction'); ?>" class="form-control" id="deduction" name="deduction">
          <span class="text-danger"><?= form_error('deduction'); ?></span>
        </div>
        <div class="mb-3 mt-3">
          <label for="payment">Payment:</label>
          <input type="number" value="<?= set_value('payment'); ?>" class="form-control" id="payment" name="payment">
          <span class="text-danger"><?= form_error('payment'); ?></span>
        </div>
        

          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="col-4" id="salarydata">
        <table class="table">
          <tr>
            <th>Working Days</th>
            <td class="working_days">0</td>
          </tr>
          <tr>
            <th>Absent</th>
            <td class="absent">0</td>
          </tr>
          <tr>
            <th>Present</th>
            <td class="present">0</td>
          </tr>
          <tr>
            <th>Deduction</th>
            <td class="deduction">0</td>
          </tr>
        </table>
    </div>
  </div>
</div>
<script>
  function get_sal(){
    let emp_id=$('#emp_id').val();
    let year=$('#year').val();
    let month=$('#month').val();
    let pf=$('#emp_id option:selected').data('pf');
    let hr=$('#emp_id option:selected').data('hr');
    let salary=$('#emp_id option:selected').data('salary');
    
    $.ajax({
      dataType: "json",
      url: '<?= base_url("salary/get_salarydata_list") ?>',
      data: {emp_id:emp_id,year:year,month:month,salary:salary},
      success: function(d){
        $('#salarydata .working_days').html(parseInt(d.absent)+parseInt(d.present));
        $('#salarydata .absent').html(d.leave);
        $('#salarydata .absent').html(d.absent);
        $('#salarydata .present').html(d.present);
        $('#salarydata .deduction').html(Math.ceil(d.deduction));
        $('#deduction').val(Math.ceil(d.deduction));
        calsal(pf,hr,salary,d.deduction)
      }
    });
  }

  function calsal(pf,hr,salary,deduction){
    pf= ((pf/100) * salary);
    hr= ((hr/100) * salary);
    $('#pf').val(pf);
    $('#hr').val(hr);
    $('#salary').val(salary);
    let finalsalary= ((salary + hr) - (Math.ceil(pf + deduction)));
    $('#payment').val(finalsalary);
  }
  
</script>