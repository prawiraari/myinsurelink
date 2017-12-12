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

<style type="text/css">
	#tbl-policy-holder,
	#tbl-travel-info,
	#tbl-plan-info {
		width: 100%;
	}

	#tbl-policy-holder td:first-child,
	#tbl-travel-info td:first-child,
	#tbl-plan-info td:first-child {
		width: 25px;
	}

	#tbl-policy-holder td,
	#tbl-travel-info td,
	#tbl-plan-info td {
		padding: 2px 5px;
	}

	#tbl-policy-holder tr:not(:last-child) td,
	#tbl-travel-info tr:not(:last-child) td,
	#tbl-plan-info tr:not(:last-child) td {
		border-bottom: 1px solid #ddd;
	}

	#custom-datatable > tbody > tr > td:last-child,
	#custom-datatable > thead > tr > th:last-child, {
		width: 100px;
	}
</style>

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Policy List</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="custom-datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Policy Number</th>
                <th>Policy Holder</th>
                <th>Travel</th>
                <th>Premium</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($policy_list as $row) { ?>
                <tr>
                  <td><?= $row->InsuranceCode ?></td>
                  <td>
                  	<table id="tbl-policy-holder">
                  		<tr>
                  			<td><i title="Name" class="fa fa-user"></i></td>
                  			<td><?= $row->Name ?></td>
                  		</tr>
                  		<tr>
                  			<td><i title="Email" class="fa fa-envelope"></i></td>
                  			<td><?= $row->EmailAddress ?></td>
                  		</tr>
                  		<tr>
                  			<td><i title="Phone" class="fa fa-phone"></i></td>
                  			<td><?= $row->PhoneCode.' '.$row->PhoneNumber ?></td>
                  		</tr>
                  		<tr>
                  			<td><i title="Address" class="fa fa-home"></i></td>
                  			<td><?= $row->Address1.', '.$row->Address2 ?><br><?= $row->PostalCode.', '.$row->City ?><br><?= $row->StateProvince ?></td>
                  		</tr>
                  	</table>
                  </td>
                  <td>
                  	<table id="tbl-travel-info">
                  		<tr>
                  			<td><i title="Approval Date" class="fa fa-calendar"></i></td>
                  			<td><?= date('d/m/y', strtotime($row->ApprovalDate)) ?></td>
                  		</tr>
                  		<tr>
                  			<td><i title="Valid Period" class="fa fa-question"></i></td>
                  			<td><?= $row->ValidPeriod ?></td>
                  		</tr>
                  	</table>
                  </td>
                  <td>
                  	<table id="tbl-plan-info">
                  		<tr>
                  			<td><i title="Type" class="fa fa-plane"></i></td>
                  			<td><?= $row->ProductID == 1 ? "Standard Plan" : "Premium Plan" ?></td>
                  		</tr>
                  		<tr>
                  			<td><i title="Amount" class="fa fa-money"></i></td>
                  			<td><?= "RM ".number_format($row->Amount, 2) ?></td>
                  		</tr>
                  	</table>
              	</td>
                  <td>
                    <a href="<?= site_url() ?>/policy/details/<?= $row->InsuranceID ?>" class="btn btn-block btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                    <!-- <a href="#" class="btn btn-block btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                    <a href="#" class="btn btn-block btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> -->
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