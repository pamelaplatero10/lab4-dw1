$(function () {

    $("#btn_procesar").click(function () {

        let nombre = $("#nombre").val().trim();
        let edad = $("#edad").val();
        let sueldo = $("#sueldo").val();

        // Validación
        if (nombre === "" || edad === "" || sueldo === "") {
            Swal.fire("Error", "Todos los campos son obligatorios", "error");
            return;
        }

        $.ajax({
            url: "proceso.php",
            type: "POST",
            dataType: "json",
            data: {
                nombre: nombre,
                edad: edad,
                sueldo: sueldo
            },

            success: function (respuesta) {

                // EXACTO como pide el enunciado
                if (respuesta.status === true) {
                    Swal.fire("Éxito", respuesta.mensaje, "success");
                } else {
                    Swal.fire("Error", respuesta.mensaje, "error");
                }

            },

            error: function () {
                Swal.fire("Error", "Error al comunicarse con el servidor", "error");
            }
        });

    });

});