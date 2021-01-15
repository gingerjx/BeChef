$('#search-form').css('display', 'none');

$('#rewind-panel').click(() => {
    $('#search-form').toggle('fast');
});

$('#order').change(() => {
    if ($('#order').is(':checked'))
        $('#order-label').html('Order &#8600');
    else
        $('#order-label').html('Order &#8599');
}); 

$('#diff-slider').slider({
    range: true,
    min: 1,
    max: 5,
    values: [1, 5],
    slide: (e, ui) => {
        let min = $('#diff-min');
        let max = $('#diff-max');
        min.html(ui.values[0]);
        max.html(ui.values[1]);
    }
});

$('#avg-cost-slider').slider({
    range: true,
    min: 0.01,
    max: 1000,
    step: 0.01,
    values: [0.01, 1000],
    slide: (e, ui) => {
        let min = $('#avg-cost-min');
        let max = $('#avg-cost-max');
        min.html(ui.values[0]);
        max.html(ui.values[1]);
    }
});

$('#ppl-num-slider').slider({
    range: true,
    min: 1,
    max: 10,
    values: [1, 10],
    slide: (e, ui) => {
        let min = $('#ppl-num-min');
        let max = $('#ppl-num-max');
        min.html(ui.values[0]);
        max.html(ui.values[1]);
    }
});

$('#kcal-slider').slider({
    range: true,
    min: 1,
    max: 8000,
    values: [1, 8000],
    slide: (e, ui) => {
        let min = $('#kcal-min');
        let max = $('#kcal-max');
        min.html(ui.values[0]);
        max.html(ui.values[1]);
    }
});
