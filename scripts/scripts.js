    function update_popup(mode){

            $.ajax({
                url: '../engine/loadfiles.php',
                method: 'get',
                cache: false,
                dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
                data:
                {
                    mode: mode
                },
                success: function(data)
                {
                    $("#result_excel_import_all").html(data);
                }
            });

    }
    function redirect(url) {
        window.location.replace(url);
    }