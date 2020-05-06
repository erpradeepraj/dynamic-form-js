$( document ).ready( function () {
    // jQuery('.add_validation').each(function() {
    //     console.log(jQuery(this).data('validation'));
    //     jQuery(jQuery(this).data('validation')).rules('add', {
    //         required: true,
    //         messages: {
    //             required: "Field Label is required",
    //         }
    //     });
    // });
    $('.add_validation').keyup(function () {
        var type = $(this).data('type');
       // alert(type);
        switch(type)
        {
            case 'text':
                var fn = $(this).val();
                var name = $(this).attr('name');
                var regex = /^[a-zA-Z\_]+$/;
                //alert(fn.length);
                if(regex.test(fn) === false) {
                    $(this).val('');
                    $('em[name="'+name+'"]').empty();
                    $('em[name="'+name+'"]').text('This field is required');
                }else{
                    if (fn.length > 50){
                        $('em[name="'+name+'"]').text('Maximum 50 Character allowed for this field.');
                    }else{
                       $('em[name="'+name+'"]').empty();
                    }

                }
                break;
            case 'fixed_name':
                var fn = $(this).val();
                var id = $(this).data('validation');
                var field_count = $(this).data('field_count');
                var regex = /^[a-zA-Z\_]+$/;

                if(regex.test(fn) === false) {
                    $(this).val('');
                    $('#'+id+field_count).empty();
                    $('#'+id+field_count).text('This field is required');
                }else{
                    if (fn.length > 50){
                        $('#'+id+field_count).text('Maximum 30 Character allowed for this field.');
                    }else{
                        $('#'+id+field_count).empty();
                    }

                }
                break;
            case 'fixed_address':
                var fn = $(this).val();
                var id = $(this).data('validation');
                var field_id = $(this).data('id');
                var regex = /^[a-zA-Z\_]+$/;
                if(fn === '') {
                    //alert(id);
                    $('#'+id).empty();
                    $('#'+id).text('This field is required');
                }else{
                    $('#'+id).empty();
                }
                break;
            case 'number':
                var fn = $(this).val();
                var id = $(this).data('validation');
                var field_id = $(this).data('id');
                var regex = /^[0-9\_]+$/;
                if(regex.test(fn) === false) {
                    $(this).val();
                }else{

                }
                break;
            case 'fixed_phone':
                var fn = $(this).val();

                var id = $(this).data('validation');
                var field_n = $(this).attr('name');
                var ele = $('em[name="fixed_'+field_n+'"]');
                ele.empty();
                var regex = /^[0-9\_]+$/;
                if(fn === '') {
                    ele.text('This field is required');
                }else{
                    if(regex.test(fn) === false) {
                        ele.text('Enter Valid Phone No.');
                    }else{
                        if (fn.length > 12){
                            ele.text('Maximum 12 numbers allowed.');
                        }else{
                            ele.empty();
                        }
                    }
                }
                break;
            case 'email':
                var fn = $(this).val();
                var id = $(this).data('validation');
                var field_name = $(this).attr('name');
                var emailcheck = $('em[name="email-error-'+field_name+'"]');
                var regex = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

                if(fn === ''){
                    emailcheck.empty();
                    emailcheck.text('This field is required');
                }else {

                    if (regex.test(fn) === false) {
                        //alert(emailcheck);
                        emailcheck.empty();
                        emailcheck.text('Enter Valid email.');
                    } else {
                        emailcheck.empty();
                    }
                }
                break;
            case 'fixed_email':
                var fn = $(this).val();
                var name = $(this).attr('name');
                var field_id = $(this).data('id');
                var regex = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                if(fn === ''){
                    var em = $('em[name="'+name+'"]');
                    em.empty();
                    em.text('This field is required');
                }else {
                    if (regex.test(fn) === false) {
                        var em = $('em[name="'+name+'"]');
                        em.empty();
                        em.text('Enter Valid email.');
                    } else {
                        $('em[name="'+name+'"]').empty();
                    }
                }
                break;
            case 'textarea':
                var fn = $(this).val();
                var name = $(this).attr('name');
                var field_id = $(this).data('id');
                if(fn === ''){
                    var em = $('em[name="'+name+'"]');
                    em.empty();
                    em.text('This field is required');
                }else {
                    if (fn.length > 250){
                        $('em[name="'+name+'"]').text('Maximum 250 characters allowed.');
                    }else{
                        $('em[name="'+name+'"]').empty();
                    }
                }
                break;
        }
    });

    $('.checkbox_validation').change(function () {
        var valid = 0;
        var $field_name = $(this).attr('name');
        $('input[name="'+$field_name+'"]').each(function () {
            var ischecked = $(this). prop("checked");
            if (ischecked){
                valid++;
            }
        });
        var ele =  $('em[name="checkbox_'+$field_name+'"]');
        if (valid == 0){
            ele.empty();
            ele.addClass('help-block');
            ele.text('Please Check atleast one checkbox.');
        }else{
            ele.removeClass('help-block');
            ele.empty();
        }
    });

    $('.dropdown_validation').change(function () {
        var valid = $(this).val();
        //alert(valid);
        var $field_name = $(this).attr('name');

        var ele =  $('em[name="drp_'+$field_name+'"]');
        if (valid == ''){
            ele.empty();
            ele.text('This field is required.');
        }else{
            ele.empty();
        }
    });


});

