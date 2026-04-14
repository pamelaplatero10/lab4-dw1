<?php

header('Content-Type: application/json');

// Recibir datos
$nombre = $_POST["nombre"];
$edad = intval($_POST["edad"]);
$sueldo = floatval($_POST["sueldo"]);

// 1. Cálculo de renta (10%)
$sueldo_neto = $sueldo * 0.90;

// Formatear sueldo
$sueldo_formateado = number_format($sueldo_neto, 2);

// 2. Evaluación
if ($edad >= 18 && $sueldo_neto > 450) {

    $respuesta = [
        "status" => true,
        "mensaje" => "Felicidades $nombre, su perfil es apto. Su sueldo neto tras impuestos será de $$sueldo_formateado."
    ];

} else {

    $respuesta = [
        "status" => false,
        "mensaje" => "Solicitud rechazada. El perfil no cumple con los criterios mínimos de edad o ingresos (Ingreso calculado: $$sueldo_formateado)."
    ];

}

// 3. Devolver JSON
echo json_encode($respuesta);

?>