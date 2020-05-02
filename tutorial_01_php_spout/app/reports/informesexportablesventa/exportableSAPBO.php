<?php
//Usaremos WriterFactory para crear el archivo en excel (XLSX) y Type para usar los tipos soportados por la libreria (CSV - XLSX - ODS)
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

//Creamos el archivo excel
$writer = WriterFactory::create(Type::XLSX);
//Asignamos el nombre del exportable
$writer->openToBrowser('php:/SAPBusinessOne_' . date("dmY") . '_' . date("H:i:s") . '.xlsx');

//Estas son las cabeceras para la hoja Cabecera de boletas (Son muchas mas, pero por ahora solo usaremos este array detallado)
$arrayHeaderTableBoletaCabecera = [
    "DocNum",                                                           //A
    "CardCode",                                                         //B
    "DocType",                                                          //C
    "DocDate",                                                          //D
    "DocDueDate",                                                       //E
    "TaxDate",                                                          //F
    "NumAtCard",                                                        //G
    "DocCurrency",                                                      //H
    "DocRate",                                                          //I
    "JournalMemo",                                                      //J
    "Indicator",                                                        //K
    "DocumentSubType",                                                  //L
    "U_BPP_MDTD",                                                       //M
    "U_BPP_MDSD",                                                       //N
    "U_BPP_MDCD",                                                       //O
    "ControlAccount",                                                   //P
    "Series",                                                           //Q
    "U_SYP_SEDE",                                                       //R
    "DiscountPercent",                                                  //S
    "U_SYP_IMPERC",                                                     //T
    "PaymentGroupCode",                                                 //U
    "SalesPersonCode",                                                  //V
    "IsReserve",                                                        //W
    "U_SYP_STATUS",                                                     //X
    "HORA",                                                             //Y
    "CORRELATIVO",                                                      //Z
];

//Agregamos una fila con el contenido que debe ir por columna
$writer->addRow($arrayHeaderTableBoletaCabecera);

//Cerramos la escritura del archvio y evitamos agregar mas data a las filas
$writer->close();