<table class="table">
    <thead>
        <tr>
            <th>#SL</th>
            <th>Employee Name</th>
            <th>Employee Designation</th>
            <th>Employee contact</th>
            <th>Attendance</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php if($attendance){
            foreach($attendance as $i=>$emp){
                if($emp->status==1) {
                    $bg="bg-success";
                    $text="text-dark";
                    $status="Present";
                    
                }else if($emp->status==2) {
                    $bg="bg-warning";
                    $text="text-white";
                    $status="Leave";
                }else{
                    $bg="bg-danger";
                    $text="text-white";
                    $status="Absent";
                }
        ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= $emp->name ?></td>
                <td><?= $emp->designation ?></td>
                <td><?= $emp->contact ?></td>
                <td class="<?= $bg ?> bg-gradient <?= $text ?>"><?= $status ?></th>
                <td>
                    <?php if(date('Y-m-d') == $emp->att_date) { ?>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#myModal" onclick="emp_set('<?= $emp->name ?>','<?= $emp->id ?>','<?= $emp->status ?>')" class="btn btn-info"> <i class="tf-icons bx bx-exit"></i></button>
                    <?php } ?>
                </td>
            </tr>
        <?php }} ?>
    </tbody>
</table>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?= form_open('attendance/update') ?>
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="mb-3 mt-3">
            <label for="att_date">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="1">Present</option>
                <option value="0">Absent</option>
                <option value="2">Leave</option>
            </select>
            <input type="hidden" name="att_id" id="upattid">
        </div>
        <div class="mb-3 mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
