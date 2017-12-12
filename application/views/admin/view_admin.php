<link href="<?= base_url() ?>assets/admin/vendors/pnotify/dist/pnotify.css" rel="stylesheet">

<style type="text/css">
  #custom-datatable > tbody > tr > td:last-child,
  #custom-datatable > thead > tr > th:last-child, {
    width: 100px;
  }
</style>

<script type="text/javascript">
  /* Custom filtering function which will search data in column four between two values */
  // $.fn.dataTable.ext.search.push(
  //   function( settings, data, dataIndex ) {
  //       var company = $("#cbo_filter_company").val();
  //       var product_type = $("#cbo_filter_product").val();
  //       var company_data = data[5];
  //       var product_type_data = data[6];

  //       if ( (company == 0 && product_type == 0) || (company == company_data && product_type == product_type_data) || (company == 0 && product_type == product_type_data) || (company == company_data && product_type == 0) )
  //       {
  //           return true;
  //       }
  //       return false;
  //   }
  // );

  // $(document).ready(function() {
  //   var table = $('#custom-datatable').DataTable({
  //     "dom": "<'row'<'col-sm-3'l><'col-sm-5 dataTable_CustomFilter form-inline'><'col-sm-4'f>>"+"tipr"
  //   });

  //   $("div.dataTable_CustomFilter").html('<div class="form-group"><label class="control-label">Company:</label><select id="cbo_filter_company" class="form-control"><option value="0" selected>All</option><option value="2">AIA</option><option value="3">AIG</option><option value="4">Allianz</option><option value="7">Chubb</option><option value="16">Etiqa</option><option value="14">Kurnia</option><option value="17">Lonpac</option><option value="9">MSIG</option><option value="10">QBE</option><option value="15">Takaful IKHLAS</option><option value="12">Tokio Marine</option><option value="13">Tune Protect</option></select></div><div class="form-group"><label class="control-label">Product:</label><select id="cbo_filter_product" class="form-control"><option value="0" selected>All</option><option value="2">Motor</option><option value="1">Travel</option><option value="3">Personal Accident</option><option value="5">Flight Delay</option><option value="4">Snatch Theft</option></select></div>');

  //   table.draw();

  //   $('.dataTable_CustomFilter select').change(function() {
  //     table.draw();
  //   });

  //   $('#custom-datatable').DataTable().search( this.value ).draw();
  // });
</script>

<?php if ($this->session->flashdata('pError')) { ?>
  <script type="text/javascript">
    $(function() {
      new PNotify({
        title: 'Error!',
        text: '<?= $this->session->flashdata('pError') ?>',
        type: 'error',
        styling: 'bootstrap3',
        delay: 2000
      });
    });
  </script>
<?php } elseif ($this->session->flashdata('pMessage')) { ?>
  <script type="text/javascript">
    $(function() {
      new PNotify({
        title: 'Success!',
        text: '<?= $this->session->flashdata('pMessage') ?>',
        type: 'success',
        styling: 'bootstrap3',
        delay: 2000
      });
    });
  </script>
<?php } ?>

<script type="text/javascript">
  $(function() {
    $('#myform-user').parsley();
    $('#myform-pass').parsley();
    $('input:radio[name="rdb_status"]').iCheck({
      radioClass: 'iradio_flat'
    });
  });

  function clear() {
    $('#txt_email').val("");
    $('#txt_first_name').val("");
    $('#txt_last_name').val("");
    $('#txt_password').val("");
    $('#txt_confirm').val("");
    $('#h_sys_user_id').val("0");
    $('.row-password').removeClass('hidden');
    $('input:radio[name="rdb_status"][value="1"]').iCheck('check');
    $("#modal-user-lbl").html("Add User");
    document.getElementById("txt_email").disabled = false;
    document.getElementById("txt_first_name").disabled = false;
    document.getElementById("txt_last_name").disabled = false;
    $('input:radio[name="rdb_status"]').iCheck('enable');
    $('#myform-user').parsley().reset();
  }

  function add() {
    clear();

    window.Parsley.addAsyncValidator('existEmail', function (xhr) {
      return xhr.responseText != 'true';
    }, "<?= site_url() ?>/admin/manage/check/");

    $('#modal-user-lbl').html("Add User");
    $('#btn-submit').text("Add");
    $('#btn-submit').show();
    $('#btn-reset').show();
    $('#btn-delete').hide();
    $('#modal-user').modal('show');
    document.getElementById('myform-user').action = "<?= site_url() ?>/admin/manage/add";
  }

  function edit(pID) {
    clear();
    jQuery.ajax({
      type: "POST",
      url: "<?= site_url() ?>" + "/admin/manage/get",
      dataType: 'json',
      data: { sys_user_id: pID },
      success: function(res) {
        if (res) {
            $('#myform-user > #h_sys_user_id').val(pID);
            $('#txt_email').val(res.email);
            $('#txt_first_name').val(res.first_name);
            $('#txt_last_name').val(res.last_name);
            $('input:radio[name="rdb_status"][value="' + res.status + '"]').iCheck('check');

            document.getElementById('myform-user').action = "<?= site_url() ?>/admin/manage/update";
            document.getElementById("txt_email").disabled = true;
            $('.row-password').addClass('hidden');
            $('#modal-user-lbl').html("Update User");
            $('#btn-submit').text("Update");
            $('#btn-submit').show();
            $('#btn-delete').hide();
            $('#btn-reset').hide();
            $('#modal-user').modal('show');
        }
      }
    });
  }

  function del(pID) {
    clear();
    jQuery.ajax({
      type: "POST",
      url: "<?= site_url() ?>" + "/admin/manage/get",
      dataType: 'json',
      data: { sys_user_id: pID },
      success: function(res) {
        if (res) {
            $('#h_sys_user_id').val(pID);
            $('#txt_email').val(res.email);
            $('#txt_first_name').val(res.first_name);
            $('#txt_last_name').val(res.last_name);
            $('input:radio[name="rdb_status"][value="' + res.status + '"]').iCheck('check');

            document.getElementById("txt_email").disabled = true;
            document.getElementById("txt_first_name").disabled = true;
            document.getElementById("txt_last_name").disabled = true;
            $('.row-password').addClass('hidden');
            $('input:radio[name="rdb_status"]').iCheck('disable');
            $('#modal-user-lbl').html("Update User");
            $('#btn-submit').hide();
            $('#btn-reset').hide();
            $('#btn-delete').show();
            $('#modal-user').modal('show');
        }
      }
    });
  }

  function pass(pID) {
    $('#txt_password_change').val("");
    $('#txt_confirm_password').val("");
    $('#myform-pass > #h_sys_user_id').val(pID);
    $('#modal-pass').modal('show');
  }
</script>

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Admin List</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="pull-right"><a onclick="add()"><i class="fa fa-user-plus"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="custom-datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Employee ID</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Status</th>
                <th>Log</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($user_list as $row) { ?>
                <tr>
                  <td><?= $row->EmployeeID ?></td>
                  <td><?= $row->EmailAddress ?></td>
                  <td><?= $row->FirstName." ".$row->LastName ?></td>
                  <td><?= $row->Active == 1 ? '<i class="fa fa-check" style="color: green"></i>' : '<i class="fa fa-times" style="color: red"></i>'  ?></td>
                  <td>
                    <i class="fa fa-calendar-o" title="Created Date"></i>: <?= $row->Created ?><br>
                    <i class="fa fa-calendar-plus-o" title="Last Updated Date"></i>: <?= $row->Updated ?>
                  </td>
                  <td>
                    <button class="btn btn-block btn-info btn-xs" onclick="edit(<?= $row->EmployeeID ?>);"><i class="fa fa-pencil"></i> Edit </button>
                    <button class="btn btn-block btn-warning btn-xs" onclick="pass(<?= $row->EmployeeID ?>);"><i class="fa fa-lock"></i> Password </button>
                    <!-- <button class="btn btn-block btn-danger btn-xs" onclick="del(<?= $row->EmployeeID ?>);"><i class="fa fa-trash-o"></i> Delete </button> -->
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<!-- modal update password -->
<div id="modal-pass" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <form id="myform-pass" action="<?= site_url() ?>/admin/manage/update_password" method="post" accept-charset="utf-8" data-parsley-validate class="form-horizontal form-label-left" novalidate>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_password_change">Password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" id="txt_password_change" name="txt_password_change" required="required" maxlength="255" class="form-control" data-parsley-trigger="change"/>
            </div>  
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_confirm_password">Confirm Password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" id="txt_confirm_password" name="txt_confirm_password" required="required" maxlength="255" class="form-control" data-parsley-equalto="#txt_password_change" data-parsley-trigger="change"/>
            </div>    
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-primary">Reset</button>
          <button type="submit" class="btn btn-success">Update Password</button>
        </div>
        <input type="hidden" id="h_sys_user_id" name="h_sys_user_id" value="0">
      </form>
    </div>
  </div>
</div>
<!-- /modal update password -->

<!-- modal update user -->
<div id="modal-user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="modal-user-lbl">Update User</h4>
      </div>
      <form id="myform-user" method="post" accept-charset="utf-8" data-parsley-validate class="form-horizontal form-label-left" novalidate>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_email">Email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="email" id="txt_email" name="txt_email" required="required" maxlength="255" data-parsley-trigger="change" data-parsley-remote data-parsley-remote-options='{ "type": "POST" }' data-parsley-remote-validator='existEmail' data-parsley-remote-message="Email already been used." class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_first_name">First Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="txt_first_name" name="txt_first_name" required="required" data-parsley-trigger="change" minlength="2" maxlength="255" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_last_name">Last Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="txt_last_name" name="txt_last_name" required="required" data-parsley-trigger="change" minlength="2" maxlength="255" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group row-password">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_password_change">Password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" id="txt_password" name="txt_password" required="required" maxlength="255" class="form-control" data-parsley-trigger="change"/>
            </div>  
          </div>
          <div class="form-group row-password">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_confirm_password">Confirm Password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" id="txt_confirm" name="txt_confirm" required="required" maxlength="255" class="form-control" data-parsley-equalto="#txt_password" data-parsley-trigger="change"/>
            </div>    
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status  </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="radio">
                <label>
                    <input type="radio" class="flat" name="rdb_status" value="1"> Active
                </label>
                <label>
                    <input type="radio" class="flat" name="rdb_status" value="0"> Inactive
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btn-reset" class="btn btn-primary" type="reset">Reset</button>
          <button id="btn-submit" type="submit" class="btn btn-success" value="validate">Add</button>
          <button id="btn-delete" type="submit" class="btn btn-warning hidden">Delete</button>
        </div>
        <input type="hidden" id="h_sys_user_id" name="h_sys_user_id" value="0">
      </form>
    </div>
  </div>
</div>
<!-- /modal update user -->

<!-- Parsley -->
<script src="<?= base_url() ?>assets/admin/vendors/parsleyjs/dist/parsley.min.js" type="text/javascript"></script>

<!-- PNotify -->
<script src="<?= base_url() ?>assets/admin/vendors/pnotify/dist/pnotify.js" type="text/javascript"></script>