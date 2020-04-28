jQuery(document).ready(function ($) {

// Контейнер с контентом Ajax
// Контейнер с контентом Ajax
// Контейнер с контентом Ajax

    var $mainBox = $('.site-main');
    let $filter_inputs_obj = {};
    // Отправка ajax запроса при клике по ссылке на рубрику в виджете "Рубрики"
    $('.filter_input').change(function (e) {
        var input_name = $(this).attr('name');
        var input_value = $(this).val();

        if(input_value != ""){
            changed_inp = { 
                [input_name] : input_value
            };

        Object.assign($filter_inputs_obj, changed_inp); 

        }else{   
            delete $filter_inputs_obj[input_name];
        }

        console.log($filter_inputs_obj);
       
        if(Object.keys($filter_inputs_obj).length == 0){
            def_inp={'помещение':''};
            Object.assign($filter_inputs_obj, def_inp);
        }

        jQuery.post(
            myPlugin.ajaxurl,
            {
                action: 'get_input_data',
                input_obj: $filter_inputs_obj
            },
            function (response) {
                $mainBox
                    .html(response)
                    
            });     
    });
  
});