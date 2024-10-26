    function update_popup(mode){

<<<<<<< HEAD
=======

>>>>>>> origin/main
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
<<<<<<< HEAD
=======
    function search(elem){
        if(elem.value.length > 1){
            $.ajax({
                type: "POST",
                url: '../engine/schedule_search.php',
                cache: false,
                async: false,
                contentType: false,
                processData: false,
                data:
                {
                    text: elem.value
                },
                dataType : 'html',
                success: function(json_data){

                }
            });
        }

    }
>>>>>>> origin/main

    function redirect(url) {
        window.location.replace(url);
    }