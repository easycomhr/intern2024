function initDaterangepicker() {
    $('.input-datetime').daterangepicker({
        autoUpdateInput: true,
        //            autoApply: true,
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: true,
        autoApply: true,
        timePicker24Hour: true,
        timePickerIncrement: 1,
        timePickerSeconds: false,
        minYear: 1950,
        locale: {
            format: 'YYYY/MM/DD HH:mm:ss',
            'separator': ' - ',
            'applyLabel': '適用',
            'cancelLabel': 'キャンセル',
            'daysOfWeek': ['日', '月', '火', '水', '木', '金', '土'],
            'monthNames': ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            'firstDay': 0
        }
    }).on('apply.daterangepicker', function (e, picker) {
        picker.element.val(picker.startDate.format(picker.locale.format));
        picker.element.valid();
    }).on('show.daterangepicker', function(ev, picker) {
        picker.container.find('.calendar-time').addClass('readonly')
    }).on('hide.daterangepicker', function(ev, picker) {
        picker.container.find('.calendar-time').addClass('readonly')
    })

}
