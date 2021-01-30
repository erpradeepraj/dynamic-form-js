@extends('layouts.dashboard')
@section('content')
	<link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
	<style>
		textarea.form-control.textdate {
			margin-top: 18px;
		}
		button.btn.btn-default.mt-3:hover{
			background-color:white!important;
		}
		button.btn.btn-default.mt-3 {
			padding: 9px 20px !important;
		}
		button.btn.btn-default.mt-3 {
			color: #27c229!important;
			background-color:white!important;

			border: 1px solid #27C229!important;
		}
		.ui-widget-header .ui-icon {
			background-image: url({{asset('assets/images/left-arrow.png')}});
		}
		a.tax1tab.taxpart {
			padding-left: 24px;
			padding-right: 24px;
		}
		p.totalamountvalue {
			font-size: 14px;
		}
		span.valuename {
			color: #13dafe;
		}
		p.ttl1 {
			color: #a2a2a2;
			font-size:10px;
		}
		p#valclose {
			font-size: 11px!important;
		}
		p#valclose1 {
			font-size: 11px!important;
		}
		p#valclose2{
			font-size: 11px!important;
		}
		textarea {
			resize: none;
		}
		p#valclose {
			margin-top: 5px;
		}
		p#valclose1 {
			margin-top: 5px;
		}
		p#valclose2 {
			margin-top: 5px;
		}
		button.btn.btn-secondary.close_one {
			background-color: #50ce50;
		}
		i.fa.fa-close.valueclosebtn {
			margin-left: 17px;
		}
		p.inline-block {
			background-color: #dff6ff!important;
			padding: 6px;
			margin-left: 9px;
		}
		data.handelDatepickValue {
			background-color: #dff6ff!important;
			padding: 6px;
			margin-left: 9px;
		}
		/*i.fa.fa-close.closeone.clearDatepicker {
        float: right;
        }*/
		i.fa.fa-close.closeone.clearDatepicker {
			margin-left: 16px;

		}
		textarea.form-control.textdate {
			border: 1px solid white!important;
		}
		textarea.form-control.textdate:hover {
			border: 1px solid white!important;
		}
		span.closeicon1 {
			float: right;
		}
		li.active {
			width: 78px;
		}
		.pull-left.s_font.ttl {
			margin-left: 16px;
		}
		i.fa.fa-plus-square.tab2plus {
			margin-left: -23px;
		}
		a.tax1tab.active.show.taxpart {
			padding-left: 24px;
			padding-right: 24px;
		}
		/*a.tax1tab.taxpart {
        padding-left: 24px;
        padding-right: 24px;
        }
        a.tax1tab.ship1 {
        margin-left: 5px;
        }*/
		.nav-pills>li>a, .nav-tabs>li>a {
			padding: 1px 6px;
		}
		a.tax1tab.taxpart {
			color: #080808 !important;
		}
		ul.nav.nav-tabs {
			/*border: 1px solid #d5dee5;*/
			padding: 2px;
		}
		button.btn.btn12 {
			padding: 1px 12px;
		}
		ul.nav.nav-tabs {
			background-color: #dad7d7;
		}
		button.btn.btn12 {
			background-color:#13dafe;
			color: white;
		}
		.nav-pills>li>a, .nav-tabs>li>a {
			background-color: #f8f9fb;
			color: #0a0a0a;
			/* border-radius: 0px; */
			border-top-right-radius: 20px!important;
		}
		button.btn.cancel {
			background-color: #8e8a8a;
			color: white;
		}
		div#myForm {
			box-shadow: 0 0 20px rgb(0 0 0 / 33%);
			width: 300px;
			padding: 10px;
			border: 1px solid #d8d8d8;
			background-color: white;
		}
		div#myForm1 {
			box-shadow: 0 0 20px rgb(0 0 0 / 40%);
			width: 300px;
			padding: 10px;
			border: 1px solid #d8d8d8;
			background-color: white;
		}
		.nav-tabs {
			border-bottom: 1px solid #ffffff;
		}
		.nav-pills>li>a, .nav-tabs>li>a {
			background-color: #f8f9fb;
			color: #0a0a0a;
			border-radius: 0px;
		}
		.form-popup {
			display: none;
			position: absolute;
			border: 3px solid #f1f1f1;
			z-index: 9;
		}
		.form-popup1 {
			display: none;
			position: absolute;
			top: 34px;
			border: 3px solid #f1f1f1;
			z-index: 9;
		}
		a.ui-datepicker-prev.ui-corner-all:hover{
			background-image: url({{asset('assets/images/left-arrow.png')}});
			background-color: black;
			border: 1px solid black;
		}
		a.ui-datepicker-next.ui-corner-all:hover {
			background-image: url({{asset('assets/images/right-arrow.png')}});
			background-color: black;
			border: 1px solid black;
		}
		.ui-widget-header {
			border: 1px solid #1b2a47;
			background-color: #1b2a47
		}
		.nav-tabs>li a.active, .nav-tabs>li a.active:focus, .nav-tabs>li a.active:hover {
			color: #555;
			cursor: auto;
			background-color: #2c4169;
			color: white!important;
		}
		.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
			border: 1px solid #0adbfe !important;
			background: #0adbfe !important;
			color: #ffffff !important;
		}
		.modal-body form {
			width: 100%;
			margin: 20px auto;
		}
		div#popup2 {
			margin-left: -124px;
		}
		div#popup1 {
			display: none;
		}
		div#popup2 {
			display: none;
		}
		.popup {
			width: 362px;
			border: 1px solid #d5dee5;
			padding: 20px;
		}
		input#datepicker {
			border: 1px solid white!important;
		}
		input#datepicker:active {
			border: 1px solid white!important;
		}
		.form_group p{
			font-size: 14px;
			line-height: 1.7;
			color: #919aa3;
			margin: 0px;
			font-size: 14px;
			letter-spacing: .2px;
		}
		.form_address{
			margin-top: 5px;
			margin-bottom: 15px;
			min-height: 109px;
		}
		.form_address p{
			font-size: 13px;
		}
		.space_form{
			width:100%;
		}
		.control-label{
			font-size: 11px;
			text-transform: uppercase;
			letter-spacing: .2px;
			font-weight: 700;
			margin-bottom: 0px;
			color: #1b2a47;
		}
		.panel-heading {
			background: #f2f5fb;
			padding: 10px 0px;
		}
		@media (max-width: 575.98px) {
			.form-popup {
				display: none;
				position: absolute;
				border: 3px solid #f1f1f1;
				z-index: 9;
			}
			.pull-right.topcreate {
				display: none;
			}
			.form-popup1 {
				display: none;
				position: absolute;
				top: 34px;
				border: 3px solid #f1f1f1;
				z-index: 9;
			}
		}
		// Small devices (landscape phones, 576px and up)
		@media (min-width: 576px) and (max-width: 767.98px) {
			.form-popup {
				display: none;
				position: absolute;
				border: 3px solid #f1f1f1;
				z-index: 9;
			}
			.form-popup1 {
				display: none;
				position: absolute;
				top: 34px;
				border: 3px solid #f1f1f1;
				z-index: 9;
			}
		}
		@media (min-width: 768px) and (max-width: 991.98px) {
			.form-popup {
				display: none;
				position: absolute;
				border: 3px solid #f1f1f1;
				z-index: 9;
			}
			.form-popup1 {
				display: none;
				position: absolute;
				top: 34px;
				border: 3px solid #f1f1f1;
				z-index: 9;
			}
		}
	</style>
	<!-- start page content -->
	<div class="page-content-wrapper">
		<div class="page-content mt-30">
			<div class="row">
				<div class="col-lg-12 col-md-12 mt-30">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<a href="{{URL('invoices')}}" class="back_link"><i class="fa fa-angle-left"></i> Invoices</a>
								<div class="page-title">New Invoice</div>
							</div>
							<div class="pull-right topcreate">
								<div class="col">
									<a><button type="submit" class="btn btn-default mt-3">Save as Draft <i class="fa fa-upload"></i></button></a>
									<a><button type="submit" class="btn btn-orange mt-3 handelBtn">Create <i class="fa fa-upload"></i></button></a>

								</div>
							</div>
						</div>
						<div style="clear:both;"></div>
						<hr>
						<div class="mt-4 mb-4">
							<div class="col-md-12" style="padding: 0px;">
								@include('flash-message')
							</div>
							<form method="POST" action="" id="invoice_create" class="space_form" >
								@csrf
								<div class="row" style="margin:0px;">
									<div class="col-lg-8 col-md-8 co-sm-12 col-xs-12" style="padding: 0px;">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="control-label" for="invoice_detail">Invoice
														<superscript class="superscript">*</superscript>
														<span class="font-weight-normal  pull-right text-muted" id="count-invoice_detail">0/150</span>
													</label>
													<input type="text" class="form-control strictValidate" value="" name="invoice_detail" id="invoice_detail" placeholder="Type invoice summary here">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="control-label">From
														<superscript class="superscript"></superscript>
													</label>
													<div class="form_address">
														@if(!empty($biz_info))
															<p>{{@$biz_info->title}}</p>
															<p>{{@$biz_info->address1}}</p>
															<p>{{(strlen($biz_info->address2) > 0)?$biz_info->address2.':':''}} {{@$biz_info->city}} {{@$biz_info->state}} {{@$biz_info->zip}}</p>
															<p>{{@$biz_info->country}}</p>
														@endif
													</div>
												</div>
												<input type="hidden" name="crm_address1" id="crm_address1">
												<input type="hidden" name="crm_address2" id="crm_address2">
												<input type="hidden" name="crm_city" id="crm_city">
												<input type="hidden" name="crm_state" id="crm_state">
												<input type="hidden" name="crm_zip" id="crm_zip">
												<input type="hidden" name="crm_country" id="country">
												<input type="hidden" name="crm_id" id="crm_id">
												<input type="hidden" name="crm_client" id="crm_client">
												<input type="hidden" name="business_id" id="business_id" value="{{$biz_info->business_id}}">
												<div class="form-group">
													<label class="control-label" for="selectOption">To
														<superscript class="superscript">*</superscript>
														<span class="font-weight-normal pull-right  use-lo" id="count-invoice_to" data-toggle="modal" data-target="#crmModal">New Client</span>
													</label>
													<span id="drpStr">
													<select class="selectpicker" id="invoice_to" name="invoice_to" data-live-search="true" data-none-selected-text="Enter Client Name" placeholder="Enter Client Name">
														<option value=""></option>
														@if(!empty($crmData))
															@foreach($crmData as $crmInfo)
																<option data-client_name="{{@$crmInfo->crm_client}}" data-crm_id="{{@$crmInfo->crm_id}}" data-address1="{{@$crmInfo->address1}}" data-address2="{{@$crmInfo->address2}}" data-city="{{@$crmInfo->city}}" data-state="{{@$crmInfo->state}}" data-zip="{{@$crmInfo->zip}}" data-country="{{@$crmInfo->country}}" value="{{$crmInfo->crm_id}}">
															@if(strlen($crmInfo->crm_client) > 50)
																		<data title="{{@$crmInfo->crm_client}}">{{@mb_strimwidth($crmInfo->crm_client,0,50,'..')}}</data>
																	@else
																		<data title="{{@$crmInfo->crm_client}}">{{@$crmInfo->crm_client}}</data>
																	@endif
														</option>
															@endforeach
														@endif
													</select>
												</span>
													<div class="form_address form-control" style="display: none;" id="selectedStr">
													</div>
													{{--                                                    <textarea class="form-control" name="selectOption" id="selectOption" style="height: 118px;" placeholder="Enter Client Name"></textarea>--}}
												</div>
											</div>
											<div class="col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="control-label" for="invoice_date">Date
														<superscript class="superscript"></superscript>
													</label>
													<input type="text" class="form-control strictValidate" value="" name="invoice_date" id="invoice_date" placeholder="Enter Dtae">
												</div>
												<div class="form-group">
													<label class="control-label" for="invoice_number">Invoice Number
														<superscript class="superscript"></superscript>
													</label>
													<input type="text" class="form-control strictValidate" value="" name="invoice_number" id="invoice_number" placeholder="Enter Invoice Number">
												</div>
												<div class="form-group">
													<label class="control-label" for="invoice_due">Invoice Due
														<superscript class="superscript">*</superscript>
													</label>
													<select class="form-control strictValidate" value="" name="invoice_due" id="invoice_due">
														<option vlaue="" Selected disabled="">Due on Receipt</option>
														<option vlaue="due_1">Due 1</option>
														<option vlaue="due_2">Due 2</option>
														<option vlaue="due_3">Due 3</option>
													</select>
												</div>
												<div class="form-group">
													<label class="control-label" for="invoice_purchase_order_number">Purchase Order Number
														<superscript class="superscript"></superscript>
													</label>
													<input type="text" class="form-control strictValidate" value="" name="invoice_purchase_order_number" id="invoice_purchase_order_number" placeholder="Enter Purchase Order Number">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 invoice_logo_area" style="padding: 0px;">
										<div class="text-center">
											<img class="invoice_logo" src="https://ducami.com/dev/rajshri/dukami-site/wp-content/uploads/2020/12/dukami-logo.png">
										</div>
										<div class="usd_div draft">
											<span>Draft</span>
											<p>USD 0.00</p>
										</div>
									</div>
								</div>
								<!------->
								<div class="panel panel-default" id="add-list">
									<div class="panel-heading row" style="margin:0px;">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-xs-12 control-label">Description</div>
										<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Quantity</div>
										<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Rate</div>
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-12 control-label">Amount (USD)</div>
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-12 control-label colm-action">Action</div>

									</div>
									<div class="sorting ui-sortable" id="add_on_block">
										<div class="panell_block row" id="add-row-desc0" style="margin:0px;">
											<span><i class="fa fa-th add-ticket-icon"></i></span>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-xs-12 control-label">
												<div class="form-group">
													<div class="form_address form-control" id="" style="display: block;">
														<p>
														<p style="float: right;" id="removeSelection">

														</p>
														<input readonly="" style="pointer-events: none;" type="text" id="datepicker">
														<data style="display: none;" class="handelDatepickValue"><span id="datepickerValue"></span><data><i class="fa fa-close closeone clearDatepicker" onclick="closeForm2()"></i></data></data>
														</p>
														<textarea class="form-control textdate" name="type_description" id="" placeholder="Type Name & Description"></textarea><div class="inline-block"><p class="inline-block" id="valclose"><span class="valuename">Tax</span> Gst 10%<i class="fa fa-close valueclosebtn" onclick="closeForm5()"></i></p><p class="inline-block" id="valclose1"><span class="valuename">Shipping</span> Gst 15%<i class="fa fa-close valueclosebtn" onclick="closeForm6()"></i></p><p class="inline-block" id="valclose2"><span class="valuename"> Discount</span> Gst 25%<i class="fa fa-close valueclosebtn" onclick="closeForm7()"></i></p></div></div>
													<!-- <textarea class="form-control" name="type_description" id="type_description" placeholder="Type Name & Description"></textarea>
													<p><input type="text" id="datepicker"></p> -->
												</div>
											</div>
											<script type="text/javascript">

											</script>
											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">
												<div class="form-group">
													<input type="text" class="form-control strictValidate" value="" name="quantity" id="quantity" placeholder="Quantity">
												</div>
											</div>
											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">
												<div class="form-group">
													<input type="text" class="form-control strictValidate" value="" name="unit_price" id="unit_price" placeholder="Unit Price">
												</div>
											</div>
											<div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-12 control-label">
												USD 10.00
											</div>
											<div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-12 control-label colm-action">
												<td>
													<!-- <a title="Edit" href="" class="editProfile"> <i class="fa fa-pencil"></i></a> -->
													<a title="Delete" class="delete-row-desc-btn" id="0"> <i style="font-size: 15px; padding-right: 10px; color: red;" class="ficon fa fa-trash-o"></i></a>
												</td>
											</div>
											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label colm-action">

												<i style="font-size: 15px; padding-right: 10px;color:#01b8ff;" id="calaenderIcon" onclick="show_dp();" class="fa fa-calendar-plus-o"></i>
												<i style="font-size: 15px;" class="fa fa-plus-square"  onclick="openForm()"></i>

											</div>

										</div>
									</div>
									<div class="form-popup" id="myForm">
										<div class="page-title">Add<span class="closeicon1"><i class="fa fa-close" style="font-size:16px" onclick="closeForm()"></i></span></div>
										<ul class="nav nav-tabs">
											<li class="active"><a class="tax1tab active show taxpart" data-toggle="tab" href="#tax">Tax</a></li>
											<li class=""><a class="tax1tab ship1" data-toggle="tab" href="#shipping">Shipping</a></li>
											<li class="active"><a class="tax1tab ship1" data-toggle="tab" href="#discount">Discount</a></li>
										</ul>
										<hr>

										<div class="tab-content">
											<div id="tax" class="tab-pane fade in active show">

												<form>
													<div class="form-group">

														<select class="form-control tab1form" id="sel1">
															<option>Gst@18%</option>
															<option>Gst@18%</option>
															<option>Gst@18%</option>
															<option>Gst@18%</option>
														</select>

													</div>

													<button type="submit" class="btn btn12">Save</button>

													<!-- <span id="AppendgstStructure2"></span> -->
													<!-- <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12"> -->
													<!-- <div class="form-group">
																			<span class="use-lo" id="invoice_item_addon3"><i class="fa fa-plus"></i> Add a tax</span>

													</div> -->
													<!-- <hr>
													<button type="submit" class="btn btn12">Save</button>
													<button type="button" class="btn btn12 cancel" onclick="closeForm()">Close</button> -->
													<!-- </div> -->
												</form>
											</div>
											<div id="shipping" class="tab-pane fade">
												<form>
													<div class="form-group">

														<select class="form-control tab1form" id="sel2">
															<option>Gst@12%</option>
															<option>Gst@18%</option>
															<option>Gst@18%</option>
															<option>Gst@18%</option>
														</select>

													</div>

													<button type="submit" class="btn btn12">Save</button>


												</form>
											</div>
											<div id="discount" class="tab-pane fade">
												<form>
													<div class="form-group">

														<select class="form-control tab1form" id="sel2">
															<option>Gst@15%</option>
															<option>Gst@18%</option>
															<option>Gst@18%</option>
															<option>Gst@18%</option>
														</select>

													</div>

													<button type="submit" class="btn btn12">Save</button>


												</form>
											</div>
										</div>
									</div>
								</div>
								<script>
									function openForm() {
										document.getElementById("myForm").style.display = "block";
									}
									function closeForm() {
										document.getElementById("myForm").style.display = "none";
									}
									function closeForm5() {
										document.getElementById("valclose").style.display = "none";
									}
									function closeForm6() {
										document.getElementById("valclose1").style.display = "none";
									}
									function closeForm7() {
										document.getElementById("valclose2").style.display = "none";
									}
								</script>
								<script>
									$(document).ready(function(){
										$("#additem12").click(function(){
											$("#popup1").toggle();
										});

									});
								</script>
								<script>
									$(function() {
										$( "#datepicker" ).datepicker({
											onSelect: function (dateText, inst) {
												$('#datepicker').hide();
												$('#datepickerValue').text(dateText);
												$('.handelDatepickValue').show();
												document.getElementById('calaenderIcon').style.pointerEvents = 'none';
												console.log(dateText);
											}
										});
									});
									function show_dp(){
										$( "#datepicker" ).datepicker('show'); //Show on click of button
									}
								</script>
								<hr class="hr" style="margin-bottom: 5px;"/>
								<div class="row">
									<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<span class="use-lo" id="invoice_item_addon"><i class="fa fa-plus"></i> New Line</span>
										</div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
										<div class="pull-left s_font">
											<p><i style="font-size: 15px; padding-right: 10px;" class="fa fa-plus-square tab2plus" onclick="openForm1()"></i>Subtotal</p>
										</div>
										<script>
											function openForm1() {
												document.getElementById("myForm1").style.display = "block";
											}
											function closeForm1() {
												document.getElementById("myForm1").style.display = "none";
											}
											function closeForm2() {
												//document.getElementById("datepicker").value = "";
												$('#datepicker').val('');
												$('#datepicker').show();
												$('.handelDatepickValue').hide();
												document.getElementById('calaenderIcon').style.pointerEvents = 'auto';
											}
										</script>
										<script>
											$(document).ready(function(){
												$("#additem12").click(function(){
													$("#popup1").toggle();
												});

											});
										</script>
										<script>
											$(document).ready(function(){
												$("#additem123").click(function(){
													$("#popup2").toggle();
												});

											});
										</script>
										<div class="pull-right s_font_2">
											<p>100.00</p>
										</div>
										<div style="clear: both;"></div>
										<hr class="hr" style="margin-bottom: 5px;"/>
										<div class="pull-left s_font ttl">
											<p class="ttl1">tax</p>
										</div>
										<div class="pull-right s_font_2">
											<p class="ttl1">30.00</p>
										</div>
										<div style="clear: both;"></div>
										<hr class="hr" style="margin-bottom: 5px;"/>
										<div class="pull-left s_font ttl">
											<p class="ttl1">Shipping</p>
										</div>
										<div class="pull-right s_font_2">
											<p class="ttl1">50.00</p>
										</div>
										<div style="clear: both;"></div>
										<hr class="hr" style="margin-bottom: 5px;"/>
										<div class="pull-left s_font ttl">
											<p class="ttl1">Discount</p>
										</div>
										<div class="pull-right s_font_2">
											<p class="ttl1">20.00</p>
										</div>
										<div style="clear: both;"></div>
										<hr class="hr" style="margin-bottom: 5px;"/>
										<div class="pull-left s_font">
											<p class="totalamountvalue">Total Due</p>
										</div>
										<div class="pull-right s_font_2">
											<p class="totalamountvalue">160.00</p>
										</div>
										<div style="clear: both;"></div>
										<hr class="hr" style="margin-bottom: 5px;"/>

										<div class="form-popup1" id="myForm1">
											<div class="page-title">Add<span class="closeicon1"><i class="fa fa-close" style="font-size:16px" onclick="closeForm1()"></i></span></div>
											<ul class="nav nav-tabs">
												<li class="active"><a class="tax1tab active show taxpart" data-toggle="tab" href="#tax1">Tax</a></li>
												<li class=""><a class="tax1tab ship1" data-toggle="tab" href="#shipping1">Shipping</a></li>
												<li class="active"><a class="tax1tab ship1" data-toggle="tab" href="#discount1">Discount</a></li>
											</ul>
											<hr>

											<div class="tab-content">
												<div id="tax1" class="tab-pane fade in active show">

													<form>
														<div class="form-group">

															<select class="form-control tab1form" id="sel1">
																<option>Gst@19%</option>
																<option>Gst@18%</option>
																<option>Gst@18%</option>
																<option>Gst@18%</option>
															</select>

														</div>

														<button type="submit" class="btn btn12">Save</button>


													</form>
												</div>
												<div id="shipping1" class="tab-pane fade">
													<form>
														<div class="form-group">

															<select class="form-control tab1form" id="sel2">
																<option>Gst@20%</option>
																<option>Gst@18%</option>
																<option>Gst@18%</option>
																<option>Gst@18%</option>
															</select>

														</div>

														<button type="submit" class="btn btn12">Save</button>


													</form>
												</div>
												<div id="discount1" class="tab-pane fade">
													<form>
														<div class="form-group">

															<select class="form-control tab1form" id="sel2">
																<option>Gst@21%</option>
																<option>Gst@18%</option>
																<option>Gst@18%</option>
																<option>Gst@18%</option>
															</select>

														</div>

														<button type="submit" class="btn btn12">Save</button>


													</form>
												</div>
											</div>
										</div>
									</div>

								</div>
								<!------->
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label class="control-label" for="invoice_notes">Invoice Notes (Modify Default Note)</label>
											<textarea class="form-control" name="invoice_notes" id="invoice_notes" placeholder=""></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<a><button type="submit" class="btn btn-orange mt-3 handelBtn">Create <i class="fa fa-upload"></i></button></a>
										<a><button type="submit" class="btn btn-default mt-3">Save as Draft <i class="fa fa-upload"></i></button></a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="crmModal" tabindex="-1" aria-labelledby="crmModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="crmeModalLabel">Create  New Client</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<span id="crmSuccessMsg"></span>
					<form method="POST" id="crm_contact" class="space_form" >
						@csrf
						<input type="hidden" name="crm_type" id="crm_type" value="0">
						<p>Create an individual or an organization contact</p>
						<p id="individual_contact" onclick="$('#crm_type').val('0')" class="btn btn-1 active_btn">An Individual</p>
						<p id="organization_contact" onclick="$('#crm_type').val('1')" class="btn btn-1">An Organization</p>
						<hr class="form_hr">
						<div class="row ind_div">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_first_name">First Name
										<superscript class="superscript">*</superscript>
										<span class="font-weight-normal  pull-right text-muted" id="count-contact_first_name">0/50</span>
									</label>
									<input type="text" class="form-control strictValidate" value="" name="contact_first_name" id="contact_first_name" placeholder="i.e. Tom">
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_last_name">Last Name
										<superscript class="superscript"></superscript>
										<span class="font-weight-normal  pull-right text-muted" id="count-contact_last_name">0/50</span>
									</label>
									<input type="text" class="form-control strictValidate" value="" name="contact_last_name" id="contact_last_name" placeholder="i.e. Jones">
								</div>
							</div>
						</div>
						<!-- or -->
						<div class="row org_div" style="display:none">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_organization_name">Organization Name
										<superscript class="superscript">*</superscript>
										<span class="font-weight-normal  pull-right text-muted" id="count-contact_organization_name">0/100</span>
									</label>
									<input type="text" class="form-control strictValidate" value="" name="contact_organization_name" id="contact_organization_name" placeholder="i.e. Dukami Enterprises">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_currency">Currency
										<superscript class="superscript">*</superscript>
									</label>
									<select class="form-control strictValidate" name="contact_currency" id="contact_currency">
										<option vlaue="" Selected disabled="">Select Currency</option>
										@if(!empty($currencies))
											@foreach($currencies as $currency)
												<option value="{{@$currency->id}}">{{@strtoupper($currency->code)}} {{@$currency->symbol}}</option>
											@endforeach
										@endif;
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_email">Email
										<superscript class="superscript">*</superscript>
									</label>
									<input type="email" class="form-control strictValidate" value="" name="contact_email" id="contact_email" placeholder="Enter Your Email Address">
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_phone">Phone
										<superscript class="superscript">*</superscript>
										<span class="font-weight-normal  pull-right text-muted" id="count-contact_phone">0/13</span>
									</label>
									<input type="number" min="0" oncopy="return false" oncut="return false" onpaste="return false" onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" class="form-control strictValidate" value="" name="contact_phone" id="contact_phone" placeholder="Enter Your Phone No.">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group ind_div">
									<label class="control-label" for="contact_mobile">Mobile
										<span class="font-weight-normal  pull-right text-muted" id="count-contact_mobile">0/13</span>
									</label>
									<input type="number" min="0" oncopy="return false" oncut="return false" onpaste="return false" onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" class="form-control strictValidate" value="" name="contact_mobile" id="contact_mobile" placeholder="Enter Your Mobile No.">
								</div>
								<div class="form-group org_div" style="display:none">
									<label class="control-label" for="contact_fax">Fax
										<superscript class="superscript"></superscript>
										<span class="font-weight-normal  pull-right text-muted" id="count-contact_fax">0/100</span>
									</label>
									<input type="text" class="form-control strictValidate" value="" name="contact_fax" id="contact_fax" placeholder="Enter Fax">
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_website_url">Website Url
										<superscript class="superscript"></superscript>
									</label>
									<input type="url" class="form-control strictValidate" value="" name="contact_website_url" id="contact_website_url" placeholder="i.e. https://www.url.com">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_address">Address
										<superscript class="superscript">*</superscript>
									</label>
									<small class="emhelp d-block">Legal address is used for validation and verification. We must have a valid physical address on file for each entity to comply with applicable rules and regulations. UPS Store Addresses are not acceptable physical addresses.</small>
									<input type="text" class="form-control strictValidate" value="" name="contact_address" id="contact_address" placeholder="Address">
								</div>
								<div class="form-group">
									<input type="text" class="form-control strictValidate" value="" name="contact_address_2" id="contact_address_2">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_zip_code">Zip Code
										<superscript class="superscript">*</superscript>
									</label>
									<input type="text" class="form-control strictValidate" value="" name="contact_zip_code" id="contact_zip_code" placeholder="Zip Code">
								</div>
							</div>
							<div class="col-lg-3 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_city">City
										<superscript class="superscript">*</superscript>
									</label>
									<input type="text" class="form-control strictValidate" value="" name="contact_city" id="contact_city" placeholder="City">
								</div>
							</div>
							<div class="col-lg-3 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_state">State
										<superscript class="superscript">*</superscript>
									</label>
									<input type="text" class="form-control strictValidate" value="" name="contact_state" id="contact_state" placeholder="State">
								</div>
							</div>
							<div class="col-lg-3 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_country">Country
										<superscript class="superscript">*</superscript>
									</label>
									<input type="text" class="form-control strictValidate" value="" name="contact_country" id="contact_country" placeholder="Country">
								</div>
							</div>
						</div>
						<!-- -->
						<!-- or -->
						<div class="row org_div" style="display:none">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group" style="margin-bottom:5px;">
									<label class="control-label" style="font-size: 12px; letter-spacing: 0.5px;">Primary Point of Contact</label>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_primary_first_name">First Name
										<superscript class="superscript"></superscript>
										<span class="font-weight-normal  pull-right text-muted" id="count-contact_primary_first_name">0/50</span>
									</label>
									<input type="text" class="form-control strictValidate" value="" name="contact_primary_first_name" id="contact_primary_first_name" placeholder="i.e. John">
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_primary_last_name">Last Name
										<superscript class="superscript"></superscript>
										<span class="font-weight-normal  pull-right text-muted" id="count-contact_primary_last_name">0/50</span>
									</label>
									<input type="text" class="form-control strictValidate" value="" name="contact_primary_last_name" id="contact_primary_last_name" placeholder="i.e. Jones">
								</div>
							</div>
							<small class="p-small emhelp d-block" style="margin-bottom: 12px; margin-top: -7px;">This will be used in the greeting of your outgoing emails (E.g.: "Hi John")</small>
						</div>
						<!------->
						<!------->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="control-label" for="contact_notes">Private Notes and Files (Not shown to the contact) <span class="font-weight-normal  pull-right text-muted" id="count-contact_notes">0/250</span></label>
									<textarea class="form-control strictValidate" name="contact_notes" id="contact_notes" placeholder=""></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<a><button type="submit" class="btn btn-orange mt-3 handelBtn">Create <i class="fa fa-upload"></i></button></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Ends -->
	<script type="text/javascript" src="{{asset('assets/js/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/daterangepicker.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/daterangepicker.css')}}"/>
	<script src="https://eventmozo.com/dev/assets/js/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://eventmozo.com/assets/css/bootstrap-select.css">
	<script src="https://eventmozo.com/assets/js/bootstrap-select.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$(document).on("focus","#selectOption", function(){
				//$(this).blur();
				$('select').trigger('change');
			});
		});
	</script>
	<script type="text/javascript">
		$("#invoice_item_addon1").click(function(){
			i++;
			$("#AppendgstStructure").append('<div class="form-group">'+
					'<select class="form-control" id="sel1">'+
					'<option>Gst@18%</option>'+
					'<option>Gst@18%</option>'+
					' <option>Gst@18%</option>'+
					'<option>Gst@18%</option>'+
					'</select>'+
					'</div>');
		});
	</script>
	<script type="text/javascript">
		$("#invoice_item_addon2").click(function(){
			i++;
			$("#AppendgstStructure1").append('<div class="form-group">'+
					'<select class="form-control" id="sel">'+
					'<option>Gst@12%</option>'+
					'<option>Gst@18%</option>'+
					' <option>Gst@18%</option>'+
					'<option>Gst@18%</option>'+
					'</select>'+
					'</div>');
		});
	</script>
	<script type="text/javascript">
		$("#invoice_item_addon3").click(function(){
			i++;
			$("#AppendgstStructure2").append('<div class="form-group">'+
					'<select class="form-control" id="sel">'+
					'<option>Gst@12%</option>'+
					'<option>Gst@18%</option>'+
					' <option>Gst@18%</option>'+
					'<option>Gst@18%</option>'+
					'</select>'+
					'</div>');
		});
	</script>
	<script type="text/javascript">
		$("#invoice_item_addon4").click(function(){
			i++;
			$("#AppendgstStructure3").append('<div class="form-group">'+
					'<select class="form-control" id="sel2">'+
					'<option>Gst@12%</option>'+
					'<option>Gst@18%</option>'+
					' <option>Gst@18%</option>'+
					'<option>Gst@18%</option>'+
					'</select>'+
					'</div>');
		});
	</script>
	<script type="text/javascript">
		$("#invoice_item_addon5").click(function(){
			i++;
			$("#AppendgstStructure4").append('<div class="form-group">'+
					'<select class="form-control" id="sel2">'+
					'<option>Gst@12%</option>'+
					'<option>Gst@18%</option>'+
					' <option>Gst@18%</option>'+
					'<option>Gst@18%</option>'+
					'</select>'+
					'</div>');
		});
	</script>
	<script type="text/javascript">
		var i=0;
		$("#invoice_item_addon").click(function(){
			i++;
			$("#add_on_block").append('<div class="panell_block row" id="add-row-desc'+i+'" style="margin:0px;">'+
					'<span><i class="fa fa-th add-ticket-icon"></i></span>'+
					'<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">'+
					'<div class="form-group">'+
					'<textarea class="form-control" name="type_description'+i+'" id="type_description'+i+'" placeholder="Type Name & Description"></textarea>'+
					'<p><input type="text" id="datepicker"></p>'+
					'</div>'+
					'</div>'+
					'<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">'+
					'<div class="form-group">'+
					'<input type="text" class="form-control strictValidate" value="" name="quantity'+i+'" id="quantity'+i+'" placeholder="Quantity">'+
					'</div>'+
					'</div>'+
					'<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">'+
					'<div class="form-group">'+
					'<input type="text" class="form-control strictValidate" value="" name="unit_price'+i+'" id="unit_price'+i+'" placeholder="Unit Price">'+
					'</div>'+
					'</div>'+
					'<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">'+
					'0.00'+
					'</div>'+
					'<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label colm-action">'+
					'<td>'+
					'<a title="Edit" href="" class="editProfile"> <i class="fa fa-pencil"></i></a>'+
					'<a title="Delete" class="delete-row-desc-btn" id="'+i+'"> <i style="font-size: 15px; padding-right: 10px; color: red;" class="ficon fa fa-trash-o"></i></a>'+
					'</td>'+
					'</div>'+
					'<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label colm-action">'+

					'<i style="font-size: 15px; padding-right: 10px;"  onclick="show_dp();" class="fa fa-calendar-plus-o"></i>'+
					'<a data-toggle="modal" data-target="#exampleModalLong"><i style="font-size: 15px; padding-right: 10px;" class="fa fa-plus-square" data-toggle="modal" href="#myModal12"></i></a>'+

					'</div>'+
					'</div>'
			);
		});
		$(document).on('click', '.delete-row-desc-btn', function(){
			var button_id = $(this).attr("id");
			$("#add-row-desc"+button_id).remove();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$( ".sorting" ).sortable({
				revert: true
			});
			$('#selectOption').selectpicker({
				noneSelectedText : 'Enter Client Name'
			});
			$('#individual_contact').click(function() {
				$('.ind_div').show();
				$('.org_div').hide();
				$('#individual_contact').addClass('active_btn');
				$('#organization_contact').removeClass('active_btn');
			});
			$('#organization_contact').click(function() {
				$('.org_div').show();
				$('.ind_div').hide();
				$('#organization_contact').addClass('active_btn');
				$('#individual_contact').removeClass('active_btn');
			});
		});
	</script>
	<script>
		$('#crmModal').on('hidden.bs.modal', function(e) {
			$(this).find('#crm_contact')[0].reset();
		});
		$( "#crm_contact" ).submit(function (e){
			e.preventDefault();
			var formData = $(this).serialize();
			$.post( "{{route('crm_create_api')}}", formData).done(function(data) {
				// var obj = JSON.parse(data);
				var datamessage = ' <div class="alert alert-info alert-block">'+
						'<button type="button" class="close" data-dismiss="alert">×</button>'+
						data.message;
				'</div>';
				$('#crmSuccessMsg').empty();
				$('#crmSuccessMsg').html(datamessage);
				console.log(data.message);
				$('#crm_contact')[0].reset();
				$('#crmModal').modal('hide');
			});
		});
		$.validator.setDefaults({
			submitHandler: function (form){
				//form.submit();
			}
		});
		$.validator.addMethod("alphanumeric", function(value, element) {
			return this.optional(element) || /^[a-zA-Z0-9&. ]+$/i.test(value);
		}, "name must contain only letters, numbers.");
		$( document ).ready( function () {
			$( "#crm_contact" ).validate( {
				rules: {
					contact_first_name: {
						required: true,
						minlength: 3,
						maxlength:50,
						alphanumeric:true
					},
					contact_last_name: {
						required: true,
						minlength: 3,
						maxlength:50,
						alphanumeric:true
					},
					contact_organization_name: {
						required: true,
						minlength: 5,
						maxlength:100,
						alphanumeric:true
					},
					contact_email: {
						required: true,
						email:true
					},
					contact_phone: {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 13
					},
					contact_mobile: {
						//required: true,
						number: true,
						minlength: 10,
						maxlength: 13
					},
					contact_address: {
						required: true
					},
					contact_zip_code: {
						required: true
					},
					contact_city: {
						required: true
					},
					contact_state: {
						required: true
					},
					contact_country: {
						required: true
					},
					contact_currency: {
						required: true
					},
					contact_language: {
						required: true
					}
				},
				errorElement: "span",
				errorPlacement: function ( error, element ) {
					error.addClass( "help-block" );
					element.parents( ".col-sm-5" ).addClass( "has-feedback" );
					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						//$( "<span></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						//  $( "<span><i class='fa fa-exclamation-circle'></i></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).next( "span" ).removeClass( "glyphicon-ok error" );
					//error.appendTo( element.parent("td").next("td") );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).removeClass( "help-block error" );
				}
			});
		});
	</script>
	<script type="text/javascript" id="baseURL" data-URL="{{url('/')}}" src="{{asset('assets/js/invoice.js')}}"></script>
	<style>
		.bootstrap-select{
			width:100% !important;
			margin-top: 0px;
		}
		.bootstrap-select .dropdown-toggle{
			display: block;
			width: 100%;
			min-height: 118px;
			font-size: 12px;
			background-color: #fff;
			background-image: none;
			font-weight: 400 !important;
			border: 1px solid #d8d8d8 !important;
			-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
			-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
			transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
			outline: 0!important;
			box-shadow: none!important;
			letter-spacing: .5px;
			padding: 8px;
			line-height: 20px;
			border-radius: 5px !important;
			color: #666;
		}
		.btn-light:not(:disabled):not(.disabled).active, .btn-light:not(:disabled):not(.disabled):active, .show>.btn-light.dropdown-toggle {
			color: #666666;
			background-color: #ffffff;
			border-color: #ffffff;
		}
		.bootstrap-select .dropdown-toggle:hover{
			background: #fff !important;
		}
		.bootstrap-select .dropdown-toggle:focus{
			outline:none !important;
		}
		.btn-group>.dropdown-menu, .dropdown-menu{
			background-color: #f4f9ff;
			margin-top: 0px !important;
			margin-bottom: 0px !important;
			padding: 10px 0px;
		}
		.bootstrap-select .filter-option{
			padding:10px 10px !important;
		}
		.bs-searchbox input{
			border: 1px solid #ddd;
			box-shadow: 0px 0px 0px;
		}
		.bs-searchbox input:focus{
			border-color: #ddd;
			outline: 0;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgb(245, 245, 245);
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgb(245, 245, 245);
		}
		.bootstrap-select .dropdown-menu{
			width:100% !important;
			min-width:100px !important;
		}
		.bootstrap-select > .dropdown-toggle.bs-placeholder, .bootstrap-select > .dropdown-toggle.bs-placeholder:hover, .bootstrap-select > .dropdown-toggle.bs-placeholder:focus, .bootstrap-select > .dropdown-toggle.bs-placeholder:active{
			background-color: #fff !important;
		}
		.btn-default{
			background-color: #fff !important;
			background:#fff !important;
		}
	</style>
@endsection
