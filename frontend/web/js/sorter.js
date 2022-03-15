let url_params = new URLSearchParams(window.location.search);
$('.sorter').on('click',function (e) {
    $('.sorter').removeClass('badge-dark');
    let sorter_input = $('.sorter-input');
    let sorter = $(this);
    let sorter_val = sorter.text().trim();
    if(sorter_input.val() != sorter_val){
        sorter.removeClass('badge-light');
        $('.sorter-input').val(sorter_val);
    }
    else{
        sorter.removeClass('badge-dark');
        sorter.addClass('badge-light');
        $('.sorter-input').val('');
    }
    $('form').submit();
})


if(url_params.has('sorter')){
   let sorter = url_params.get('sorter')
    if(sorter !=''){
        $(`.sorter:contains(${sorter})`).addClass('badge-dark')
    }
}