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

$('#filter-submit').click((e) => {
    e.preventDefault();
    let data = retrieveFormData();

    $('#recipe-cards').html('');
    $('#search-form').toggle('fast');

    let params = '';
    data.forEach(e => {
        params += '&'+e.name+'='+e.value;
    });
    params += '&action=filter';
    window.location.href = 'search.php?' + params;
});

$('#order-submit').click((e) => {
    e.preventDefault();
    let data = retrieveFormData();

    $('#recipe-cards').html('');
    $('#search-form').toggle('fast');

    let order;
    let column;
    if (data[0].name === 'order' && data[0].value === 'on') {
        order = 'DESC';
        column = data[1].value;
    }
    else {
        order = 'ASC';
        column = data[0].value;
    }

    let params = '&order=' + order + '&column=' +  column + '&action=order';
    console.log("Params " + params);
    window.location.href = 'search.php?' + params;
});

function retrieveFormData() {
    let min_diff = $('#diff-slider').slider('values')[0];
    let max_diff = $('#diff-slider').slider('values')[1];
    let min_avg_cost = $('#avg-cost-slider').slider('values')[0];
    let max_avg_cost = $('#avg-cost-slider').slider('values')[1];
    let min_ppl_num = $('#ppl-num-slider').slider('values')[0];
    let max_ppl_num = $('#ppl-num-slider').slider('values')[1];
    let min_kcal = $('#kcal-slider').slider('values')[0];
    let max_kcal = $('#kcal-slider').slider('values')[1];

    let data = $("#search-form").serializeArray();
    data.push({name: 'min_diff', value: min_diff});
    data.push({name: 'max_diff', value: max_diff});
    data.push({name: 'min_avg_cost', value: min_avg_cost});
    data.push({name: 'max_avg_cost', value: max_avg_cost});
    data.push({name: 'min_ppl_num', value: min_ppl_num});
    data.push({name: 'max_ppl_num', value: max_ppl_num});
    data.push({name: 'min_kcal', value: min_kcal});
    data.push({name: 'max_kcal', value: max_kcal});

    return data;
}
