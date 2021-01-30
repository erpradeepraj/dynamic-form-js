@extends('layouts.dashboard')

@section('content')

    <style>
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
                            <div class="pull-right">
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <hr>

                        <div class="mt-4 mb-4">
                            <div class="col-md-12" style="padding: 0px;">
                                @include('flash-message')
                            </div>
                            <form method="POST" id="invoice_create" class="space_form" >
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
                                                    <input type="text" class="form-control strictValidate" value="" name="invoice_detail" id="invoice_detail" placeholder="Type invoice summary	here">
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
                                                    <span class="drpStr" id="drpStr">
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

                                                    <div class="form_address form-control selectedStr" id="selectedStr" style="display: none;">

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="invoice_date">Date
                                                        <superscript class="superscript"></superscript>
                                                    </label>
                                                    <input type="date" class="form-control strictValidate" value="" name="invoice_date" id="invoice_date" placeholder="Enter Date">
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
                                                    <select class="form-control strictValidate" name="invoice_due" id="invoice_due">
                                                        <option value="1">Due on Receipt</option>
                                                        <option value="2">custom</option>
                                                    </select>
                                                </div>

                                                <div class="form-group customInvoiceBlock"  style="display: none;">
                                                    <label class="control-label" for="invoice_due">Custom Invoice Due Date
                                                        <superscript class="superscript">*</superscript>
                                                    </label>
                                                    <input type="date" class="form-control strictValidate" value="" name="custom_invoice_date" id="custom_invoice_date" placeholder="Enter Date">
                                                </div>

                                                <script type="text/javascript">
                                                    $('#invoice_due').change(function () {
                                                        let invouceType = $(this).val();
                                                        if (invouceType == '2'){
                                                            $('.customInvoiceBlock').show();
                                                        }else{
                                                            $('.customInvoiceBlock').hide();
                                                        }
                                                    });

                                                </script>
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
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Description</div>
                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Quantity</div>
                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Rate</div>
                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Amount (USD)</div>
                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label colm-action">Action</div>
                                    </div>
                                    <div class="sorting ui-sortable" id="add_on_block">
                                        <div class="panell_block row invoiceProperties" data-id="0" id="add-row-desc0" style="margin:0px;">
                                            <span><i class="fa fa-th add-ticket-icon"></i></span>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="type_description0" id="type_description0" placeholder="Type Name & Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">
                                                <div class="form-group">
                                                    <input type="text" class="form-control strictValidate" value="" name="quantity0" id="quantity0" placeholder="Quantity">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">
                                                <div class="form-group">
                                                    <input type="text" class="form-control strictValidate" value="" name="unit_price0" id="unit_price0" placeholder="Unit Price">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">
                                                <span id="amount0">0.00</span>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label colm-action">
                                                <td>
                                                    <a style="display: none;" title="Edit" href="" class="editProfile"> <i class="fa fa-pencil"></i></a>
                                                    <a title="Delete" class="delete-row-desc-btn" id="0"> <i style="font-size: 15px; padding-right: 10px; color: red;" class="ficon fa fa-trash-o"></i></a>
                                                </td>
                                            </div>
                                        </div>
                                        <!--<div id="add_on_block" class="sorting ui-sortable">
                                        </div>-->
                                    </div>
                                </div>
                                <hr class="hr" style="margin-bottom: 5px;"/>
                                <div class="row">
                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <span class="use-lo" id="invoice_item_addon"><i class="fa fa-plus"></i> New Line</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                        <div class="pull-left s_font">
                                            <p>Subtotal</p>
                                        </div>
                                        <div class="pull-right s_font_2">
                                            <p>0.00</p>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <hr class="hr" style="margin-bottom: 5px;"/>
                                        <div class="pull-left s_font">
                                            <p>Total Due</p>
                                        </div>
                                        <div class="pull-right s_font_2">
                                            <p>0.00</p>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <hr class="hr" style="margin-bottom: 5px;"/>
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
        var i=0;
        $("#invoice_item_addon").click(function(){
            i++;
            $("#add_on_block").append('<div class="panell_block row invoiceProperties" data-id="'+i+'" id="add-row-desc'+i+'" style="margin:0px;">'+
                '<span><i class="fa fa-th add-ticket-icon"></i></span>'+
                '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">'+
                '<div class="form-group">'+
                '<textarea class="form-control" name="type_description'+i+'" id="type_description'+i+'" placeholder="Type Name & Description"></textarea>'+
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
                ' <span id="amount'+i+'">0.00</span>'+
                '</div>'+
                '<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label colm-action">'+
                '<td>'+
                '<a style="display: none;" title="Edit" href="" class="editProfile"> <i class="fa fa-pencil"></i></a>'+
                '<a title="Delete" class="delete-row-desc-btn" id="'+i+'"> <i style="font-size: 15px; padding-right: 10px; color: red;" class="ficon fa fa-trash-o"></i></a>'+
                '</td>'+
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
        // $('#crmModal').on('hidden.bs.modal', function(e) {
        //     $(this).find('#crm_contact')[0].reset();
        // });

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
                console.log(data.crm_data);
                var crmData = data.crm_data;
                var eleDrp =  $('#invoice_to');
                eleDrp.empty();
                crmData.forEach(function (crmInfo,index) {
                    console.log(crmInfo.crm_client+'jjjj');
                    eleDrp.append($('<option data-client_name="'+crmInfo.crm_client+'" data-crm_id="'+crmInfo.crm_id+'" data-address1="'+crmInfo.address1+'" data-address2="'+crmInfo.address2+'" data-city="'+crmInfo.city+'" data-state="'+crmInfo.state+'" data-zip="'+crmInfo.zip+'" data-country="'+crmInfo.country+'"></option>').val(crmInfo.crm_id).html(crmInfo.crm_client));
                    //$('select #service').append('<option value="'+service.service_id+'">'+service.service_name+'</option>');
                });
                $('#invoice_to').selectpicker('refresh');
                $("#invoice_to option:first-child").attr("selected", true);
                setSelectedVal();
                $('#selectedStr').show();
                $('#drpStr').hide();
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

    <script type="text/javascript">
        $('#invoice_create').submit(function (e) {
            e.preventDefault();
            if ($(this).valid()) {
                var formData = {};
                formData['invoice_title'] = $('#invoice_detail').val();
                formData['invoice_date'] = $('#invoice_date').val();
                formData['invoice_number'] = $('#invoice_number').val();
                formData['invoice_due'] = $('#invoice_due').val();
                formData['custom_invoice_due_date'] = $('#custom_invoice_date').val();
                formData['crm_address1'] = $('input[name="crm_address1"]').val();
                formData['crm_address2'] = $('input[name="crm_address2"]').val();
                formData['crm_city'] = $('input[name="crm_city"]').val();
                formData['crm_state'] = $('input[name="crm_state"]').val();
                formData['crm_zip'] = $('input[name="crm_zip"]').val();
                formData['crm_country'] = $('input[name="crm_country"]').val();
                formData['crm_client'] = $('input[name="crm_client"]').val();
                formData['crm_id'] = $('input[name="crm_id"]').val();
                formData['business_id'] = $('input[name="business_id"]').val();
                formData['invoice_purchase_order_number'] = $('input[name="invoice_purchase_order_number"]').val();


                formData['fields'] = Array();
                formData['thankyou_setting'] = Array();
                formData['social_urls'] = Array();
                formData['invoice_items'] = Array();

                $('.invoiceProperties').each(function(){
                    let $socialId = $(this).data('id');
                    let descriptionEle= $('#type_description'+$socialId);
                    let quantityEle= $('#quantity'+$socialId);
                    let unitPriceEle= $('#unit_price'+$socialId);
                    let amountEle= $('#amount'+$socialId);
                    let socialSerializedObj = {
                        'description': descriptionEle.val(),
                        'quantity': quantityEle.val(),
                        'unit_price': unitPriceEle.val(),
                        'amount': amountEle.val(),
                    };
                    formData['invoice_items'].push(socialSerializedObj);
                });

                $i = 0;

                /*$('.fieldName').each(function () {
                    var fieldName = $(this).attr('name');
                    var cvbcvb = $('#' + fieldName + '-options').val();
                    if (cvbcvb){
                        var opts = cvbcvb;
                    }else{
                        var opts = '';
                    }

                    var element = {
                        'title': $(this).val(),
                        'name': fieldName,
                        'type': $(this).data('type'),
                        'mandatory': $('#' + fieldName+'-required').is(':checked') ? '1' : '0',
                        'required': $('#' + fieldName+'-checked').is(':checked') ? '1' : '0',
                        'options':opts,
                        'position': $i++,
                    };

                    var typeD = element['type'];
                    if (typeD == 'rating') {
                        var choices = [];
                        var rating_label = [];
                        var rating_label_required = [];
                        $('input[name="rating_label[]"]').each(function () {
                            rating_label.push($(this).val());
                            let requiredLabelEle = $(this).attr('id');
                            let getVAl = $('#'+requiredLabelEle+'-required').is(':checked') ? '1' : '0';
                            rating_label_required.push(getVAl);
                        });
                        var choice = {
                            'rating_label': rating_label,
                            'label_required': rating_label_required,
                        };
                        choices.push(choice);
                        element['choices'] = choices;
                    }
                    formData['fields'].push(element);
                }); */

                var fd = new FormData();
                fd.append('form_data',JSON.stringify(formData));
                fd.append('_token',"{{ csrf_token() }}");
                //fd.append('apk_files',$('#apk_banner')[0].files[0]);
                //fd.append('apk_logo_x_axis',$('input[name="apk_logo_x_axis"]').val());
                //fd.append('apk_logo_y_axis',$('input[name="apk_logo_y_axis"]').val());
                //fd.append('apk_logo_width', $('input[name="apk_logo_width"]').val());
                //fd.append('apk_logo_height',$('input[name="apk_logo_height"]').val());
                console.log(formData);

                 $.ajax({
                     url: "{{route('invoice_insert')}}",
                     type: 'post',
                     contentType: false,
                     processData: false,
                     data: fd,
                     dataType:'JSON',
                     success: function (data) {
                        console.log(data);
                     },
                     error: function (error) {
                         console.log(error);
                     }
                 });
            }else{
                return false;
            }
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
