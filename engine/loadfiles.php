<?php
    session_start();

    require_once 'connect.php';
    require_once 'libs.php';
    require_once 'ajax_update.php';

    // Название <input type="file">
    $input_name = 'file';

    // Разрешенные расширения файлов.
    $allow = array('xls', 'xlsx');

    // Запрещенные расширения файлов.
    $deny = array(
        'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp',
        'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html',
        'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
    );

    // Директория куда будут загружаться файлы.
    $path =  '../images'; $error = $success = '';



    if(empty($_SESSION)){
        header('Location: login.php');
    }

    $connect = connect(get_config());

    if(CheckSQL($connect,"SELECT * FROM `users` WHERE `id` = ".$_SESSION['id'])){

        if($_SESSION['id_role'] == 1){

            if (!isset($_FILES[$input_name])) {
                $error = 'Файл не загружен.';
            } else {
                $file = $_FILES[$input_name];

                // Проверим на ошибки загрузки.
                if (!empty($file['error']) || empty($file['tmp_name'])) {
                    $error = 'Не удалось загрузить файл.';
                } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
                    $error = 'Не удалось загрузить файл.';
                } else {
                    // Оставляем в имени файла только буквы, цифры и некоторые символы.
                    $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
                    $name = mb_eregi_replace($pattern, '-', $file['name']);
                    $name = mb_ereg_replace('[-]+', '-', $name);
                    $parts = pathinfo($name);

                    if (empty($name) || empty($parts['extension'])) {
                        $error = 'Недопустимый тип файла1';
                    } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                        $error = 'Недопустимый тип файла2';
                    } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                        $error = 'Недопустимый тип файла3';
                    } else {
                        // Перемещаем файл в директорию.
                        if (move_uploaded_file($file['tmp_name'], $path . $name)) {
                            // Далее можно сохранить название файла в БД и т.п.

                            $mode = $_GET['mode'];

                            if($mode == "result_excel_import_all"){


                            }

                            $success = '<p style="color: green">Файл «' . $name . '» успешно загружен.</p>';
                            $file = $name;

                        } else {
                            $error = 'Не удалось загрузить файл.';
                        }
                    }
                }
            }

            // Вывод сообщения о результате загрузки.
            if (!empty($error)) {
                $error = '<p style="color: red">' . $error . '</p>';
            }

            $data = array(
                'file'   => $file,
                'error'   => $error,
                'success' => $success,
                'update' => ajax_update(get_config(),"excel_import_all")
            );
        }
        else{
            $data = array(
                'file'   => "Отсутствует",
                'error'   => "Недостаточно прав",
                'success' => "",
                'update' => ajax_update(get_config(),"excel_import_all")
            );
        }

        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);

        exit();
    }

