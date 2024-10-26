    function update_popup(mode){

            if (window.FormData === undefined) {
                alert('В вашем браузере FormData не поддерживается')
            } else {
                var formData = new FormData();
                formData.append('file', $("#formFileMultiple")[0].files[0]);
                $.ajax({
                    type: "POST",
                    url: '../engine/loadfiles.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    dataType : 'json',
                    success: function(msg){
                        if(msg.error == "")
                            $('#result_excel_import_all').html(msg.success);
                        else
                            $('#result_excel_import_all').html(msg.error);

                    }
                });
            };

    }

    function import_programm(){

        $.ajax({
            type: "POST",
            url: '../engine/excel_scripts.php',
            cache: false,
            async: false,
            contentType: false,
            processData: false,
            data: {},
            dataType : 'json',
            success: function(json_data){
            }
        });



    }

    function redirect(url) {
        window.location.replace(url);
    }