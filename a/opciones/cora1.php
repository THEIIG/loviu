<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visor de PDF - Hola</title>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
    <style>
        /* Estilos generales */
        body {
            font-family: 'Poiret One', sans-serif;
            background-color: #000; /* Fondo negro */
            color: white;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            overflow: hidden;
        }

        /* Estilo del visor de PDF */
        #pdf-container {
            width: 80%;
            height: 80%;
            overflow: hidden;
            border: 2px solid #ff6b81; /* Bordes interactivos */
            border-radius: 10px;
            position: relative;
            box-shadow: 0px 0px 20px rgba(255, 107, 129, 0.7); /* Sombra de color interactivo */
        }

        #pdf-frame {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Botón de regreso */
        .btn-volver {
            background-color: #ff6b81;
            color: white;
            padding: 14px 28px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-volver:hover {
            background-color: #ff4757;
            transform: scale(1.05);
        }

        /* Animación de interactividad */
        .interactive:hover {
            transform: scale(1.05);
            box-shadow: 0px 0px 10px rgba(255, 107, 129, 0.9);
        }
    </style>
</head>
<body>
<audio autoplay loop>
        <source src="../revali.mp3" type="audio/mp3">
        Tu navegador no soporta la etiqueta de audio.
    </audio>
    <!-- Contenedor del visor de PDF -->
    <div id="pdf-container" class="interactive">
        <!-- Cargar el archivo PDF en el visor -->
        <iframe id="pdf-frame" src="../sofi.pdf" frameborder="0"></iframe>
    </div>

    <!-- Botón Volver -->
    <a href="#" class="btn-volver interactive" id="btnVolver">Volver</a>

    <script>
        // Función para asignar el enlace del botón de regresar
        document.getElementById("btnVolver").addEventListener("click", function() {
            window.location.href = "../uno.php"; // Cambia a la URL que desees para regresar
        });
    </script>
</body>
</html>
