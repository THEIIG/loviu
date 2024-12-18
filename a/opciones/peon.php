<?php
// Este es un archivo PHP que servirá como base para tu página de amor con fondo oscuro.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Te Amo!</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-color: #2f2f2f; /* Fondo oscuro gris */
            color: #ff69b4; /* Texto en rosa brillante */
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            overflow: hidden;
            position: relative;
            transition: background-color 0.3s ease;
        }

        /* Animación del mensaje especial */
        .mensaje {
            font-size: 3em;
            font-weight: bold;
            animation: showMessage 4s ease-in-out forwards;
            opacity: 0;
            text-align: center;
            margin-bottom: 20px;
        }

        @keyframes showMessage {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            50% {
                opacity: 1;
                transform: translateY(0);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Estilo del botón */
        .boton {
            background-color: #ff1493; /* Rosa brillante */
            color: white;
            padding: 15px 30px;
            font-size: 1.5em;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .boton:hover {
            background-color: #ff69b4; /* Cambio de color al pasar el ratón */
            transform: scale(1.1);
        }

    </style>
</head>
<body>
<audio autoplay loop>
        <source src="../centaleon.mp3" type="audio/mp3">
        Tu navegador no soporta la etiqueta de audio.
    </audio>
    <div class="mensaje">¡Te Amo! ❤️</div>

    <button class="boton" onclick="location.href='peon2.php'">?</button>

    <!-- Interacción para cambiar el fondo con el movimiento del ratón -->
    <script>
        // Agregar interacción para cambiar el fondo cuando el ratón se mueve
        document.body.addEventListener('mousemove', (e) => {
            const red = Math.floor((e.clientX / window.innerWidth) * 100); // Color rojo según la posición horizontal
            const blue = Math.floor((e.clientY / window.innerHeight) * 100); // Color azul según la posición vertical
            document.body.style.backgroundColor = `rgb(${red}, ${blue}, 50)`; // Cambio de color de fondo
        });
    </script>

</body>
</html>
