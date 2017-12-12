<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
		#main {
			margin: 2em;
			font-size: 12px;
		}

		#header {
			text-align: center;
		}

		#policy-holder > table {
			width: 100%;
			table-layout: fixed;
		}

		#important-notice > ol {
			padding-left: 10px;
		}

		#important-notice > ol > li {
			text-align: justify;
			margin: 2px;
		}

		#summary-coverage {
			/*page-break-after: always;*/
		}

		#summary-coverage > table {
			width: 100%;
			border-spacing: 0;
			border-top: 1px solid black;
			border-left: 1px solid black;
			border-bottom: 1px solid black;
		}

		#summary-coverage > table th {
			text-align: center;
		}

		#summary-coverage > table > thead > tr > th, 
		#summary-coverage > table tr:nth-child(2) td, 
		#summary-coverage > table tr:nth-child(3) td, 
		#summary-coverage > table tr:nth-child(4) td, 
		#summary-coverage > table tr:nth-child(5) td, 
		#summary-coverage > table tr:nth-child(11) td,
		#summary-coverage > table tr:nth-child(18) td {
			border-bottom: 1px solid black;
		}

		#summary-coverage > table th, 
		#summary-coverage > table td {
			border-right: 1px solid black;
		}

		#summary-coverage > table td:nth-child(3),
		#summary-coverage > table td:last-child {
			text-align: center;
		}

		#summary-coverage > table tr:nth-child(1) td:first-child, 
		#summary-coverage > table tr:nth-child(5) td:first-child, 
		#summary-coverage > table tr:nth-child(6) td:first-child, 
		#summary-coverage > table tr:nth-child(7) td:first-child {
			text-align: right;
		}

		#signature > table tr:first-child > td {
			border-bottom: 1px solid black;
		}
	</style>
</head>

<body>
	<div id="container">
		<br>
		<div id="main" role="main">
			<div id="header">
				<h3>
					TUNE INBOUND PA PROTECTOR
					<br>
					CERTIFICATE OF INSURANCE
				</h3>
			</div>
			<div id="policy-holder">
				<table>
					<tr>
						<td>Master Policyholder Name</td>
						<td><?= $policy->Name ?></td>
						<td>Certificate No.</td>
						<td><?= $policy->InsuranceCode ?></td>
					</tr>
					<tr>
						<td>Master Policy No.</td>
						<td><?= $masterPolicyCode ?></td>
						<td>Premium</td>
						<td>RM <?= number_format($policy->Amount, 2) ?></td>
					</tr>
					<tr>
						<td>Insured Name</td>
						<td><?= $policy->Name ?></td>
						<td>Goods & Service Tax</td>
						<td><?= $goodsServiceTax ?>%</td>
					</tr>
					<tr>
						<td>Valid ID/Passport No.</td>
						<td><?= $policy->IDNumber ?></td>
						<td>Plan Type</td>
						<td><?= $policy->ProductID == 1 ? "Platinum Plan" : "Standard Plan" ?></td>
					</tr>
					<tr>
						<td>Issue Date</td>
						<td><?= date('d M Y', strtotime($policy->ApprovalDate)) ?></td>
						<td>Travel Period</td>
						<td>The departure date shall be not later than 90 days from the date of approval of visa in line with the 90 days validity of the visa.<br>And the number of days covered shall be according to the plan selected i.e. STD15/PRE15 for 15 days and STD30/PRE30 days for 30 days.</td>
					</tr>
					<tr>
						<td>Territorial Limit</td>
						<td>Within Malaysia</td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			<br>
			<div id="important-notice">
				IMPORTANT NOTICE
				<ol>
					<li>
						This certificate together with proof of purchase/bills/documentary evidence mjust be produced in the event of claim.
					</li>
					<li>
						Please notify TUNE Insurance Malaysia Berhad, Level 9, Wisma Tune No.19 Lorong Dungun Damansara Heights, 50490 Kuala Lumpur (Attn: Travel Claims Tel No. 603-2087 9000 Fax No.603-2094 1366) immediately in writing in event of a claim. Any claims notification should be notified not later than 30 days from the date of the claims occurrence.
					</li>
					<li>
						Any extension of cover is not allowed during the trip on or after coverage is enforced.
					</li>
				</ol>
			</div>
			<br>
			<div id="summary-coverage">
				SUMMARY OF COVERAGE
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th><b><u>Benefits</u></b></th>
							<th>Standard</th>
							<!-- <th>Platinum</th> -->
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Accidental Death & Permanent Disablement (Adult)</td>
							<td>75,000</td>
							<!-- <td>200,000</td> -->
						</tr>
						<tr>
							<td></td>
							<td>Accidental Death & Permanent Disablement (Child)</td>
							<td>15,000</td>
							<!-- <td>30,000</td> -->
						</tr>
						<tr>
							<td>3(a)</td>
							<td><b>Medical Expenses due to Accident</b><br>(Reimbursement basic as per receipts)</td>
							<td>10,000</td>
							<!-- <td>20,000</td> -->
						</tr>
						<tr>
							<td>3(b)</td>
							<td>Compassionate Visit</td>
							<td>NOT COVERED</td>
							<!-- <td>1,500</td> -->
						</tr>
						<tr>
							<td>4</td>
							<td><u><b>Liability</b></u><br>Indemnities you against liability to third party bodily injury or property damage caused by your negligence whilst oversea.</td>
							<td>50,000</td>
							<!-- <td>50,000</td> -->
						</tr>
						<tr>
							<td>5</td>
							<td><u><b>Inconveniences</b></u></td>
							<td></td>
							<!-- <td></td> -->
						</tr>
						<tr>
							<td></td>
							<td>Trip Cancellation</td>
							<td>1,000</td>
							<!-- <td>2,500</td> -->
						</tr>
						<tr>
							<td></td>
							<td>Trip Curtailment</td>
							<td>NOT COVERED</td>
							<!-- <td>5,000</td> -->
						</tr>
						<tr>
							<td></td>
							<td>Missed Departure</td>
							<td>NOT COVERED</td>
							<!-- <td>Up to 600<br>(RM200 every 6 hours)</td> -->
						</tr>
						<tr>
							<td></td>
							<td>Travel Delay</td>
							<td>400</td>
							<!-- <td>800</td> -->
						</tr>
						<tr>
							<td></td>
							<td>Travel Reroute</td>
							<td>150</td>
							<!-- <td>300</td> -->
						</tr>
						<tr>
							<td></td>
							<td><u><b>LOSSES</b></u></td>
							<td></td>
							<!-- <td></td> -->
						</tr>
						<tr>
							<td></td>
							<td>Damage to Luggage During Air common Carrier Travel</td>
							<td>500</td>
							<!-- <td>1,000</td> -->
						</tr>
						<tr>
							<td></td>
							<td>Luggage Delay</td>
							<td>Up to 300</td>
							<!-- <td>Up to 500</td> -->
						</tr>
						<tr>
							<td></td>
							<td>Snatch Theft ( Ground Only ) for the following :</td>
							<td>500</td>
							<!-- <td>1,000</td> -->
						</tr>
						<tr>
							<td></td>
							<td>1) Loss of Personal Money</td>
							<td></td>
							<!-- <td></td> -->
						</tr>
						<tr>
							<td></td>
							<td>2) Loss of Travel Document</td>
							<td></td>
							<!-- <td></td> -->
						</tr>
						<tr>
							<td></td>
							<td>3) Loss of Personal Effects</td>
							<td></td>
							<!-- <td></td> -->
						</tr>
						<tr>
							<td></td>
							<td><u><b>Emergency Services</b></u><br>24 Hours Worldwide travel Assitance Hotline</td>
							<td>Included</td>
							<!-- <td>Included</td> -->
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<div id="declaration">
				DECLARATION
				<br>
				<p>
					In consideration of payment of the premium, TUNE Insurance Malaysia Berhad agrees to provide insurance for the Insured Person(s) according to the terms, conditions and exceptions as stated in the Master Policy No. <?= $masterPolicyCode ?> attached.
				</p>
			</div>
			<br>
			<br>
			<br>
			<br>
			<div id="signature">
				<table>
					<tr>
						<td style='text-align: center;'><img src='<?=base_url()?>assets/images/prettyphoto/default/sprite_x.png'></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td>Authorised Signatory</td>
					</tr>
					<tr>
						<td>CEO, Tune Insurance Malaysia Berhad</td>
					</tr>
				</table>
			</div>
			<div>
				<p>Account Code : <?= $accountCode ?></p>
			</div>
		</div>
	</div>
</body>
</html>