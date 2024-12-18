<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Te Amo</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('../fondo.png') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
            font-family: 'Playfair Display', serif;  /* Fuente romántica */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            overflow-y: auto;
            position: relative;
        }

        .container {
            width: 100%;
            max-width: 960px;
            margin-top: 50px;
        }

        iframe {
            width: 60%;
            max-width: 640px;
            height: 360px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.7);
        }

        .texto-personalizado {
            font-size: 1.5em;
            font-weight: 700;
            margin-top: 30px;
            line-height: 1.6;
            color: white;  /* Color blanco para el texto */
            text-align: justify;
            max-width: 80%;
            margin: 0 auto;
            text-shadow: 
                0 0 5px rgba(255, 0, 0, 1), 
                0 0 10px rgba(255, 0, 0, 1), 
                0 0 15px rgba(255, 0, 0, 1), 
                0 0 20px rgba(255, 0, 0, 1), 
                0 0 25px rgba(255, 0, 0, 1), 
                0 0 30px rgba(255, 0, 0, 1), 
                0 0 35px rgba(255, 0, 0, 1); /* Sombra de texto luminosa roja para el contorno */
            padding: 10px;
            border-radius: 10px;
        }

        .boton {
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 1.2em;
            background-color: #d8a7b1;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .boton:hover {
            background-color: #ff8b94;
            transform: scale(1.1);
        }

        .corazon {
            position: absolute;
            bottom: -50px;
            font-size: 3em;
            color: rgba(255, 77, 136, 0.7);
            animation: subirCorazon 5s infinite;
        }

        @keyframes subirCorazon {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0.8;
            }
            50% {
                transform: translateY(-100vh) scale(1.5);
                opacity: 0.5;
            }
            100% {
                transform: translateY(-200vh) scale(1);
                opacity: 0;
            }
        }

        .corazon:nth-child(odd) {
            animation-duration: 5s;
            animation-delay: 0s;
        }

        .corazon:nth-child(even) {
            animation-duration: 6s;
            animation-delay: 1s;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Video centrado y autoplay activado -->
        <iframe src="https://www.youtube.com/embed/plNdelzFCAY?autoplay=1&si=kfNMFVqCdUFYpUK2" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        
        <!-- Texto personalizado debajo del video -->
        <div class="texto-personalizado">
            Aunque estemos lejos, mi amor por ti no conoce distancias. Siempre te llevo en mi corazón y en mis pensamientos, Sofi. La distancia solo nos hace más fuertes, y sé que nuestro amor puede superar cualquier barrera. Te amo profundamente.
        </div>

        <!-- Botón de llamada a la acción -->
        <button class="boton" onclick="window.location.href='../uno.php'">Volver</button>
    </div>

    <!-- Corazones animados -->
    <div class="corazon" style="left: 10%;">&#10084;</div>
    <div class="corazon" style="left: 30%;">&#10084;</div>
    <div class="corazon" style="left: 50%;">&#10084;</div>
    <div class="corazon" style="left: 70%;">&#10084;</div>
    <div class="corazon" style="left: 90%;">&#10084;</div>

</body>
</html>
