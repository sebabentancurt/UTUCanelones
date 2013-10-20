<?php
    require_once ("includes/configDB.php");
    

    $databaseConnection = mysqli_init();
    if (!$databaseConnection) {
        die('Falló mysqli_init');
    }

    if (!mysqli_options($databaseConnection, MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
        die('Falló la configuración de MYSQLI_INIT_COMMAND');
    }

    if (!mysqli_options($databaseConnection, MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
        die('Falló la configuración de MYSQLI_OPT_CONNECT_TIMEOUT');
    }

    if (!mysqli_real_connect($databaseConnection, DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)) {
        die('Error de conexión (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }

    if (!mysqli_set_charset($databaseConnection, "utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($databaseConnection));
    } else {
        printf("Conjunto de caracteres actual: %s\n", mysqli_character_set_name($databaseConnection));
    }
?>