$(function () {
    $('.date-picker').datepicker({
        rtl: Metronic.isRTL(),
        format: 'dd/mm/yyyy',
        orientation: "left",
        autoclose: true,

    });

    $('#defaultrange_modal').daterangepicker({
            opens: (Metronic.isRTL() ? 'left' : 'right'),
            format: 'DD/MM/YYYY',
            separator: ' to ',
            startDate: moment(),
            endDate: moment().add('days', 29),
            minDate: '01/01/2012',
            maxDate: '12/31/2018',
        },
        function (start, end) {
            $('#defaultrange_modal input').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        }
    );

    $('#AddAdsForm_bundle_id').blur(function(){
        var bundle_id = $(this).val();
        if(bundle_id.length > 0) {
            $.ajax({
                type: 'GET',
                url: '/advertiser/ads/appinfo?bundle_id=' + bundle_id,
                success: function(data) {
                    var json = $.parseJSON(data);
                    if(json.status == 1) {
                        $('#AddAdsForm_bundle_id').val(json.bundle_id);
                        $('#AddAdsForm_apple_id').val(json.apple_id);
                        $('#AddAdsForm_app_name').val(json.app_name);
                        $('#AddAdsForm_image').val(json.image);
                        $('#app_image').attr('src', json.image);

                    }
                }
            });
        }
    });

    $('#AddAdsForm_campaign_type').change(function(){
        var value = $(this).val();
        if(value == 1) {
            $('.start_time').show();
            $('.range_time').hide();
        } else {
            $('.range_time').show();
            $('.start_time').hide();
        }
    });


});