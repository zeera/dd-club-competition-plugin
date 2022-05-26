jQuery(document).ready(function ($) {
    if ( $('.datetimepicker').length > 0 ) {
        $('.datetimepicker').datetimepicker();
    }
    if ( $('.colorField').length > 0 ) {
        $('.colorField').wpColorPicker();
    }
    if ( $('.selectpicker').length > 0 ) {
        var selected = $('.selectpicker').data('selected');
        $('.selectpicker').select2({
            placeholder: 'Select Product',
            allowClear: true,
        });
        $(".selectpicker").val(selected);
        $('.selectpicker').trigger('change');
    }
});
