<?php
//Incluyo mi manejador
include_once('../handler.php');

//Validamos si se envia el paremetro donde especificamos la carpeta y el formato que se solicita
if (!isset($_GET['exportable'])) {
    exit('Debes indicar el formato a exportar');
}

//Capturamos por GET la carpeta y el exportable a generar (micarpeta_exportable)
$exportable = $_GET['exportable'];

//Divido en strings el parametro enviado (debe ser en este caso un array con 2 string's)
$carpeta_exportable = explode('_', $exportable);

//Si no encuentro una lista con string para procesar el formato carpeta - exportable termino el proceso
if (sizeof($carpeta_exportable) <= 0) {
    exit('No se ha enviado la carpeta o el directoria del formato a exportar');
} else {
    //En caso de encontrar los dos parametros solicitados procedo a armar mi ruta de exportación
    if (sizeof($carpeta_exportable) > 1) {
        //Respetando los parametros enviados obtendremos en la posicion [0] el exportable como tal, y en la posicion[1] la carpeta contenedora
        //Por poner un ejemplo podiamos tener n carpetas:
        //  => informesexportablesventa
        //  => informesexportablescompra
        //  => informesexportablesinventario y demás
        $exportable = $carpeta_exportable[0];
        $carpeta = $carpeta_exportable[1];

        //Separaremos segun sea el caso la distribucion de carpetas, pero de momento queda asi
        switch ($carpeta) {
            //Carpeta donde se crearan los formatos exportables de venta
            case 'informesexportablesventa':
                if (file_exists(dirname(__FILE__) . '/' . $carpeta . '/' . $exportable . '.php')) {
                    include(dirname(__FILE__) . '/' . $carpeta . '/' . $exportable . '.php');
                }
                break;
        }
    }

}
?>