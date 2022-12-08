

<table class="table">
    <thead>
        <tr>
            <th>#SL</th>
            <th>Employee Name</th>
            <th>Employee contact</th>
            <th>Attendance</th>
        </tr>
    </thead>
    <tbody>
        <?php if($employee){
            foreach($employee as $i=>$emp){
        ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= $emp->name ?></td>
                <td><?= $emp->contact ?></td>
                <td>
                    <select class="form-control" name="status[<?= $emp->id ?>]" id="status">
                        <option value="1">Present</option>
                        <option value="0">Absent</option>
                        <option value="2">Leave</option>
                    </select>
                </td>
            </tr>
        <?php }} ?>
    </tbody>
</table>