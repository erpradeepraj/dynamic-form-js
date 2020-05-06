
$(document).ready(function(){
	
	$(function () {
        $("#ate").click(function () {
            if ($(this).is(":checked")) {
                $(".attendee_block").show();
            } else {
                $(".attendee_block").hide();
            }
        });
    });

    $( function() {
        $( ".sortable" ).sortable();
        $( ".sortable" ).disableSelection();
        $( ".sortable .disabled_sortable" ).disableSelection();
    });

    var fieldcount = 0;
    $('.field_count').each(function () {
        fieldcount=fieldcount+1;
    });
    if (fieldcount ===0){
        $('#submitHndlerBtn').attr('disabled',true)
    }

    var fieldMax = $('#max_field').val();

    if (fieldMax !=='0'){
        var i=fieldMax;
    }else{
        var i=6;
    }
    $countCheckbox = 0;
    $('input[name="datetime_id[]"]:checked').each(function(index){
        var ischecked = $(this). prop("checked");
        $countCheckbox = $countCheckbox+1;
        if ($countCheckbox === 0){
            $('#submitHndlerBtn').attr('disabled',true)
        }else{
            $('#submitHndlerBtn').attr('disabled',false)
        }
    });

    $('input[name="datetime_id[]"]').change(function () {
        var ischecked = $(this). prop("checked");
        if (!ischecked){
            $countCheckbox = $countCheckbox -1;
            if ($countCheckbox === 0){
                $('#submitHndlerBtn').attr('disabled',true)
            }else{
                $('#submitHndlerBtn').attr('disabled',false)
            }
        }else{
            $countCheckbox = $countCheckbox+1;
            if ($countCheckbox === 0){
                $('#submitHndlerBtn').attr('disabled',true)
            }else{
                $('#submitHndlerBtn').attr('disabled',false)
            }
        }
    });
    $(".append_field_div_structure").click(function () {

    });
    
    $(".add_btn").click(function(){
        alert(fieldcount);
        fieldcount ++;
        i++;
        if (fieldcount === 0){
            $('#submitHndlerBtn').attr('disabled',true)
        }else{
            $('#submitHndlerBtn').attr('disabled',false)
        }
        ___fieldStructure(".append_block_div",i,'buyer_field');
        addValidation();
    });

    $(".add_attendees_btn").click(function(){
        //alert(fieldcount);
        fieldcount ++;
        i++;
        if (fieldcount === 0){
            $('#submitHndlerBtn').attr('disabled',true)
        }else{
            $('#submitHndlerBtn').attr('disabled',false)
        }
        ___fieldStructure(".append_field_div_structure",i,'inputtextrow');



        addValidation();
    });

    function ___fieldStructure(element,index,elementSeparator){
        $(element).append('<div id="add-row-custom'+index+'"  class="sort2 row '+elementSeparator+'" data-id="'+index+'"  style="margin:0px; cursor:all-scroll;">'+
            '<div class="col-sm-12 col-lg-12 col-md-12 append_div">'+
            '<div class="row" style="margin: 10px 0px 10px 0px ;">'+
            '<div class="col-sm-5">'+
            '<input type="text" name="field'+i+'"  data-field_name="field'+index+'" id="field'+index+'" placeholder="Field '+index+'" class="form-control field_input">'+
            '</div>'+
            '<div class="col-sm-4">'+
            '<select name="field'+index+'_type" data-identity="'+index+'" id="field'+index+'_type" class="select_div form-control dropdown_change field_type_valid">'+
            '<option value=""> Select Type</option>'+
            '<option value="text"> text field </option>'+
            '<option value="email"> Email </option>'+
            '<option value="number"> number </option>'+
            '<option value="dropdown"> dropdown </option>'+
            '<option value="radio"> radio </option>'+
            '<option value="checkbox" class="vcenter"> checkbox </option>'+
            '<option value="textarea"> Textarea </option>'+
            // '<option value="file"> File </option>'+
            '<option value="date"> Date </option>'+
            '</select>'+
            '</div>'+
            '<div class="col-sm-1">'+
            '<div class="checkbox ad-toggle">'+
            '<div class="form-check">'+
            '<center>'+
            '<input type="checkbox" class="form-check-input requiredCheckbox" id="field'+index+'_reduired" name="field'+index+'_reduired" value="0">'+
            '<label class="form-check-label" for="field'+index+'_reduired"></label>'+
            '</center>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div class="col-sm-2">'+
            '<center>'+
            '<span class="set_icon" id="appenSettingIconNeed'+index+'"></span>'+
            '<span><i class="fa fa-trash action-delete delete-row-custom-btn" data-identity="'+index+'" id="delete'+index+'"></i></span>'+
            '<span><i class="fa fa-arrows add-ticket-icon"></i></span>'+
            '</center>'+
            '</div>'+
            '</div> <span id="addOptStructure'+index+'"></span>'+
            '</div>'+
            '</div>');
    }

    //alert(fieldcount);
    $(document).on('click', '.delete-row-custom-btn', function(){

        var button_id = $(this).attr("id");
        var identity = $(this).data("identity");
        var chars = button_id.split('');
       // $("#add-row-custom"+chars[6]).remove();
        $("#add-row-custom"+identity).remove();
    });

    $(document).on('click', '.deleteOption', function(){
        var btn_id = $(this).data("identity");
        var opt_id = $(this).data("option_id");
        //var chars = button_id.split('');
        $(".removeRowOption"+btn_id+opt_id).remove();
    });

    function optGenerator(i){
        return '<a id="add_option'+i+'" data-identity="'+i+'" data-iid="field'+i+'_type" class="add_option_value generate_default_option'+i+'" style="cursor:pointer; color: #00c2ff; font-size: 12px; line-height: 35px;"><i class="fa fa-plus"></i>&nbsp; Add Option Value</a>';
    }

    $(document).on('click', '.setting_icon', function(){
        var button_id = $(this).attr("id");
        var identity = $(this).data("identity");
        //alert(identity);
        var chars = button_id.split('');
        //$('.setting_identity'+identity).toggle();
        var select_div_val = $(this).data('iid');
        var my_field= $('#'+select_div_val).val();

        if(my_field==="dropdown"){
            $("#append_setting"+identity).toggle();
        }
        else if(my_field==="checkbox"){
            $("#append_setting"+identity).toggle();
        }
        else if(my_field==="radio"){
            $("#append_setting"+identity).toggle();
        }
        else{
            $("#append_setting"+identity).hide();
        }
    });


    var j=0;
    $(document).on('click', '.add_option_value', function(){
        j++;
        var button_id = $(this).attr("id");
        var chars = button_id.split('');
        var select_div_val = $(this).data('iid');
       // alert(select_div_val);
        var $identity = $(this).data('identity');
        var my_field= $('#'+select_div_val).val();
        if(my_field==="dropdown"){
                var ct = 1;
                $('.getFieldCount' + $identity).each(function () {
                    ct++;
                });
                if (ct != 0) {
                    j = ct;
                }

            $("#MultipleOptionValues"+$identity).append('<div id="add-row-option'+j+'"  class="sort removeRowOption'+$identity+j+'">'+
                '<div class="row dropdown_div">'+
                '<div class="col-sm-6 input_field_row form-group">'+
                '<input class="form-control getFieldCount'+$identity+' getChoices'+$identity+' setOptionValue'+$identity+j+'" data-identity="'+$identity+'" name="option_value'+j+'" id="option_value'+j+'" type="text">'+
                '</div>'+
                '<div class="col-sm-6 form-group">'+
                '<span><i class="fa fa-remove action-delete deleteOption" data-identity="'+$identity+'" data-option_id="'+j+'" id="row_delete'+j+'"></i></span>'+
                '</div>'+
                '</div>'+
                '</div>');
        }
        else if(my_field==="checkbox"){
            var ct = 1;
            $('.getFieldCount'+$identity).each(function () {
                ct++;
            });
            if (ct != 0){
                j = ct;
            }
            $("#MultipleOptionValues"+$identity).append('<div id="add-row-option'+j+'"  class="sort removeRowOption'+$identity+j+'">'+
                '<div class="row check_div">'+
                '<div class="col-sm-1">'+
                '<div class="checkbox ad-toggle">'+
                '<div class="form-check">'+
                '<input type="checkbox" data-identity="'+$identity+'" class="form-check-input " id="checkbox'+j+'" name="checkbox'+j+'" value="0">'+
                '<label class="form-check-label" for="checkbox'+j+'"></label>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 input_field_row form-group">'+
                '<input class="form-control setOptionValue'+$identity+j+' getChoices'+$identity+' getFieldCount'+$identity+'" data-identity="'+$identity+'" name="option_value'+j+'" id="option_value'+j+'" type="text">'+
                '</div>'+
                '<div class="col-sm-5 form-group">'+
                '<span><i class="fa fa-remove action-delete deleteOption" data-identity="'+$identity+'" data-option_id="'+j+'"  id="row_delete'+j+'"></i></span>'+
                '</div>'+
                '</div>'+
                '</div>');
        }
        else if(my_field==="radio"){
            var ct = 1;
            $('.getFieldCount'+$identity).each(function () {
                ct++;
            });
            if (ct != 0){
                j = ct;
            }
            $("#MultipleOptionValues"+$identity).append('<div id="add-row-option'+j+'"  class="sort removeRowOption'+$identity+j+'">'+
                '<div class="row radio_div">'+
                '<div class="col-sm-1">'+
                '<div class="radio_form">'+
                '<label>'+
                '<input type="radio"  name="radio'+j+'" id="radio'+j+'" value="1" class="with-gap">'+
                '<span></span>'+
                '</label>'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-5 input_field_row form-group">'+
                '<input class="form-control setOptionValue'+$identity+j+' getChoices'+$identity+' getFieldCount'+$identity+'" data-identity="'+$identity+'" name="option_value'+j+'" id="option_value'+j+'" type="text">'+
                '</div>'+
                '<div class="col-sm-2 form-group">'+
                '<span><i class="fa fa-remove action-delete deleteOption" data-identity="'+$identity+'" data-option_id="'+j+'" id="row_delete'+j+'"></i></span>'+
                '</div>'+
                '</div>'+
                '</div>');
        }
        else{
        }
    });
     var radiocount = $('#radio_count').val();
    $(document).on('click', '.add_radio_option_value', function(){
        radiocount++;
        var button_id = $(this).attr("id");
        var chars = button_id.split('');
        var select_div_val = $(this).data('iid');
        var $identity = $(this).data('identity');
        var my_field= $('#'+select_div_val).val();
        $("#MultipleOptionValues"+$identity).append('<div id="add-row-option'+radiocount+'"  class="sort removeRowOption'+$identity+radiocount+'">'+
            '<div class="row radio_div">'+
            '<div class="col-sm-1">'+
            '<div class="radio_form">'+
            '<label>'+
            '<input type="radio"  name="radio'+radiocount+'" id="radio'+radiocount+'" value="1" class="with-gap">'+
            '<span></span>'+
            '</label>'+
            '</div>'+
            '</div>'+
            '<div class="col-sm-5 input_field_row form-group">'+
            '<input class="form-control setOptionValue'+$identity+radiocount+' getChoices'+$identity+' getFieldCount'+$identity+'" data-identity="'+$identity+'" name="option_value'+radiocount+'" id="option_value'+radiocount+'" type="text">'+
            '</div>'+
            '<div class="col-sm-2 form-group">'+
            '<span><i class="fa fa-remove action-delete deleteOption" data-identity="'+$identity+'" data-option_id="'+radiocount+'" id="row_delete'+radiocount+'"></i></span>'+
            '</div>'+
            '</div>'+
            '</div>');
    });
    var dropdown_count = $('#dropdown_count').val();
    $(document).on('click', '.add_dropdown_option_value', function(){
        dropdown_count++;
        var button_id = $(this).attr("id");
        var chars = button_id.split('');
        var select_div_val = $(this).data('iid');
        var $identity = $(this).data('identity');
        var my_field= $('#'+select_div_val).val();
        $("#MultipleOptionValues"+$identity).append('<div id="add-row-option'+dropdown_count+'"  class="sort removeRowOption'+$identity+dropdown_count+'">'+
            '<div class="row dropdown_div">'+
            '<div class="col-sm-6 input_field_row form-group">'+
            '<input class="form-control getFieldCount'+$identity+' getChoices'+$identity+' setOptionValue'+$identity+dropdown_count+'" data-identity="'+$identity+'" name="option_value'+dropdown_count+'" id="option_value'+dropdown_count+'" type="text">'+
            '</div>'+
            '<div class="col-sm-6 form-group">'+
            '<span><i class="fa fa-remove action-delete deleteOption" data-identity="'+$identity+'" data-option_id="'+dropdown_count+'" id="row_delete'+dropdown_count+'"></i></span>'+
            '</div>'+
            '</div>'+
            '</div>');
    });
    var checkbox_count = $('#dropdown_count').val();
    $(document).on('click', '.add_checkbox_option_value', function(){
        checkbox_count++;
        var button_id = $(this).attr("id");
        var chars = button_id.split('');
        var select_div_val = $(this).data('iid');
        var $identity = $(this).data('identity');
        var my_field= $('#'+select_div_val).val();
        $("#MultipleOptionValues"+chars[10]).append('<div id="add-row-option'+checkbox_count+'"  class="sort removeRowOption'+$identity+checkbox_count+'">'+
            '<div class="row check_div">'+
            '<div class="col-sm-1">'+
            '<div class="checkbox ad-toggle">'+
            '<div class="form-check">'+
            '<input type="checkbox" data-identity="'+$identity+'" class="form-check-input " id="checkbox'+checkbox_count+'" name="checkbox'+checkbox_count+'" value="0">'+
            '<label class="form-check-label" for="checkbox'+checkbox_count+'"></label>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div class="col-sm-6 input_field_row form-group">'+
            '<input class="form-control setOptionValue'+$identity+checkbox_count+' getChoices'+$identity+' getFieldCount'+$identity+'" data-identity="'+$identity+'" name="option_value'+checkbox_count+'" id="option_value'+checkbox_count+'" type="text">'+
            '</div>'+
            '<div class="col-sm-5 form-group">'+
            '<span><i class="fa fa-remove action-delete deleteOption" data-identity="'+$identity+'" data-option_id="'+j+'"  id="row_delete'+j+'"></i></span>'+
            '</div>'+
            '</div>'+
            '</div>');
    });

    $(document).on('click', '.delete-row-option-btn', function(){
        var button_id = $(this).attr("id");
        var chars = button_id.split('');
        $("#add-row-option"+chars[10]).remove();
    });

    $(document).on('change','.dropdown_change',function () {
        var selected_val = $(this).val();
       // alert(selected_val);
        var identity = $(this).data('identity');
        __handelOnchange(selected_val,identity)

    });


    function __handelOnchange(selected_val,identity) {
        switch(selected_val)
        {
            case 'text':
                $('#appenSettingIconNeed'+identity).empty();
                $('#addOptStructure'+identity).empty();
                $('#MultipleOptionValues'+identity).empty();
                $('#setting'+identity).hide();
                $('#append_setting'+identity).hide();
                break;
            case 'email':
                $('#appenSettingIconNeed'+identity).empty();
                $('#addOptStructure'+identity).empty();
                $('#MultipleOptionValues'+identity).empty();
                $('#setting'+identity).hide();
                $('#append_setting'+identity).hide();
                break;
            case 'number':
                $('#appenSettingIconNeed'+identity).empty();
                $('#addOptStructure'+identity).empty();
                $('#MultipleOptionValues'+identity).empty();
                $('#setting'+identity).hide();
                $('#append_setting'+identity).hide();
                break;
            case 'dropdown':
                $('#setting'+identity).show();
                $('#appenSettingIconNeed'+identity).empty();
                $('#addOptStructure'+identity).empty();
                $('#addOptStructure'+identity).append(optionStructure(identity));
                $('#appenSettingIconNeed'+identity).empty();
                $('#appenSettingIconNeed'+identity).append('<i id="setting'+identity+'" data-iid="field'+identity+'_type"  data-value="add_option'+identity+'" data-identity="'+identity+'" class="fa fa-cog action-setting setting_icon setting_identity'+identity+'"></i>');
                $('.optionGeneratorBtn'+identity).empty();
                $('.optionGeneratorBtn'+identity).append(optGenerator(identity));
                $('#MultipleOptionValues'+identity).empty();
                $('#append_setting'+identity).show();
                $('.setting_identity'+identity).trigger('toggle');
                var myArray = ["option 1", "option 2", "option 3"];
                anth = 1;
                for(var i = 0; i < myArray.length; i++){
                    $('.generate_default_option'+identity).trigger('click');
                    $('.setOptionValue'+identity+anth).val(myArray[i]);
                    anth++;
                }
                j=0
                break;
            case 'radio':
                $('#setting'+identity).show();
                $('#appenSettingIconNeed'+identity).empty();
                $('#appenSettingIconNeed'+identity).append('<i id="setting'+identity+'" data-iid="field'+identity+'_type"  data-value="add_option'+identity+'" data-identity="'+identity+'" class="fa fa-cog action-setting setting_icon setting_identity'+identity+'"></i>');
                $('#addOptStructure'+identity).empty();
                $('#addOptStructure'+identity).append(optionStructure(identity));
                $('.optionGeneratorBtn'+identity).empty();
                $('.optionGeneratorBtn'+identity).append(optGenerator(identity));
                $('#MultipleOptionValues'+identity).empty();
                $('.setting_identity'+identity).trigger('click');
                var myArray = ["option 1", "option 2", "option 3"];
                anth = 1;
                for(var i = 0; i < myArray.length; i++){

                    $('.generate_default_option'+identity).trigger('click');
                    $('.setOptionValue'+identity+anth).val(myArray[i]);
                    anth++;
                }
                j=0
                break;
            case 'checkbox':
                $('#setting'+identity).show();
                $('#appenSettingIconNeed'+identity).empty();
                $('#appenSettingIconNeed'+identity).append('<i id="setting'+identity+'" data-iid="field'+identity+'_type"  data-value="add_option'+identity+'" data-identity="'+identity+'" class="fa fa-cog action-setting setting_icon setting_identity'+identity+'"></i>');
                $('#addOptStructure'+identity).empty();
                $('#addOptStructure'+identity).append(optionStructure(identity));
                $('.optionGeneratorBtn'+identity).empty();
                $('.optionGeneratorBtn'+identity).append(optGenerator(identity));
                $('#MultipleOptionValues'+identity).empty();
                $('.setting_identity'+identity).trigger('click');
                var myArray = ["option 1", "option 2", "option 3"];
                anth = 1;
                for(var i = 0; i < myArray.length; i++){

                    $('.generate_default_option'+identity).trigger('click');
                    $('.setOptionValue'+identity+anth).val(myArray[i]);
                    anth++;
                }
                j=0
                break;
            case 'textarea':
                $('#appenSettingIconNeed'+identity).empty();
                $('#addOptStructure'+identity).empty();
                $('#MultipleOptionValues'+identity).empty();
                $('#setting'+identity).hide();
                $('#append_setting'+identity).hide();
                break;
            case 'file':
                $('#appenSettingIconNeed'+identity).empty();
                $('#addOptStructure'+identity).empty();
                $('#MultipleOptionValues'+identity).empty();
                $('#setting'+identity).hide();
                $('#append_setting'+identity).hide();
                break;
            case 'date':
                $('#appenSettingIconNeed'+identity).empty();
                $('#addOptStructure'+identity).empty();
                $('#MultipleOptionValues'+identity).empty();
                $('#setting'+identity).hide();
                $('#append_setting'+identity).hide();
                break;

        }
    }

    function addValidation() {

        $('.field_input').each(function() {
            $(this).rules("add",
                {
                    required: true,
                    minlength: 2,
                    maxlength: 148,
                    messages: {
                        required: "Field Label is required",
                    }
                });
        });

        $('.field_type_valid').each(function() {
            $(this).rules("add",
                {
                    required: true,
                    messages: {
                        required: "Field Type is required",
                    }
                });
        });
    }


    function optionStructure(identity) {
       return  '<div id="append_setting'+identity+'" class="append_setting" style="display:none">'+
        '<div class="row" style="margin: 0px;">'+
        '<div class="settings_info">'+
        '<div class="col-sm-12">'+
        '<div class="events_header_info">'+
        '<div class="col-md-5 colm"><h4>Settings</h4></div>'+
        '<div class="col-md-7 colm optionGeneratorBtn'+identity+'" style="text-align: right"></div>'+
        '</div>'+
        '</div>'+
        '<div class="col-sm-12">'+
        '<span id="MultipleOptionValues'+identity+'">'+
        '</span>'+
        '<div style="height: 10px;"></div>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';
    }


});

