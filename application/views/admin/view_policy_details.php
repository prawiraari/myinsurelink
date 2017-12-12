<style type="text/css">
  .travel-date {
    padding: 3px;
    margin: 0;
    display: inline-block;
  }
</style>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2></i> Policy Detail (<?= $policy->InsuranceCode ?>)
            </h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#tab_content1" id="policy-tab" role="tab" data-toggle="tab" aria-expanded="true">Policy Holder Details</a>
                </li>
                <li role="presentation" class="">
                  <a href="#tab_content2" role="tab" id="document-tab" data-toggle="tab" aria-expanded="false">Policy Nominee Details</a>
                </li>
                <li role="presentation" class="">
                  <a href="#tab_content3" role="tab" id="product-tab2" data-toggle="tab" aria-expanded="false">Document Details</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="policy-tab">
                  <div class="project_detail row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label>Basic Details</label><hr>
                      <p class="title">Name</p>
                      <p><?= $policy->Name ?></p>
                      <p class="title">ID Number</p>
                      <p><?= $policy->IDNumber ?></p>
                      <p class="title">Phone Number</p>
                      <p>+<?= $policy->PhoneCode.' '.$policy->PhoneNumber ?></p>
                      <p class="title">Email Address</p>
                      <p><?= $policy->EmailAddress ?></p>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label>Address Details</label><hr>
                      <p class="title">Address 1</p>
                      <p><?= $policy->Address1 ?></p>
                      <p class="title">Address 2</p>
                      <p><?= $policy->Address2 ?></p>
                      <p class="title">Postal Code</p>
                      <p><?= $policy->PostalCode ?></p>
                      <p class="title">City</p>
                      <p><?= $policy->City ?></p>
                      <p class="title">State Province</p>
                      <p><?= $policy->StateProvince ?></p>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label>Passport Details</label><hr>
                      <p class="title">Expiry</p>
                      <p><?= date('d M Y', strtotime($policy->ExpiryDate)) ?></p>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label>Product Details</label><hr>
                      <p class="title">Product</p>
                      <p><?= $policy->ProductID == 1 ? "Platinum Plan" : "Standard Plan" ?></p>
                      <p class="title">Approval Date</p>
                      <p><?= date('d M Y', strtotime($policy->ApprovalDate)) ?></p>
                      <p class="title">Valid Period</p>
                      <p><?= $policy->ValidPeriod ?></p>
                      <p class="title">Amount</p>
                      <p><?= 'RM '.number_format($policy->Amount, 2) ?></p>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="document-tab">
                  <div class="project_detail row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label>Basic Details</label><hr>
                      <p class="title">Name</p>
                      <p><?= $policy->NomineeName ?></p>
                      <p class="title">Phone Number</p>
                      <p>+<?= $policy->NomineePhoneCode.' '.$policy->NomineePhoneNumber ?></p>
                      <p class="title">Relationship</p>
                      <p><?= $policy->Relationship ?></p>
                      <p class="title">Name</p>
                      <p><?= number_format($policy->SharePercentage, 2, '.', '')." %" ?></p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label>Address Details</label><hr>
                      <p class="title">Address 1</p>
                      <p><?= $policy->NomineeAddress1 ?></p>
                      <p class="title">Address 2</p>
                      <p><?= $policy->NomineeAddress2 ?></p>
                      <p class="title">Postal Code</p>
                      <p><?= $policy->NomineePostalCode ?></p>
                      <p class="title">City</p>
                      <p><?= $policy->NomineeCity ?></p>
                      <p class="title">State Province</p>
                      <p><?= $policy->NomineeStateProvince ?></p>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="product-tab">
                  <a href="<?= $policy_link ?>" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Download </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- /page content -->