$(function() {
    let endless = $('#endless'),
        ended_at = $('#ended_at');

    if(!(endless.prop('checked'))) {
        setDatePicker();
    } else {
        ended_at.prop('disabled', true);
    }

    endless.on('click', function(){
        ended_at.prop('disabled', endless.prop('checked'));

        if(endless.prop('checked')) {
            ended_at.datepicker("destroy");
        } else {
            setDatePicker();
        }
    });

    function setDatePicker()
    {
        let date = new Date();
        date.setDate(date.getDate() + 1);

        ended_at.datepicker({
            minDate: date
        });

        $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: 'Предыдущий',
            nextText: 'Следующий',
            currentText: 'Сегодня',
            monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
            dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
            dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
            dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
            weekHeader: 'Не',
            dateFormat: 'dd.mm.yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['ru']);

        ended_at.datepicker("setDate", date);
    }
});

function copyText(id) {

    let copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999);

    navigator.clipboard.writeText(copyText.value);
}
