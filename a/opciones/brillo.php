<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sofi, Te Amo</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #000; /* Fondo negro */
            height: 100vh;
            position: relative; /* Necesario para posicionar el botón en la parte inferior */
            font-family: 'Courier New', Courier, monospace; /* Fuente estilo máquina de escribir */
        }

        canvas {
            display: block;
        }

        /* Estilo del texto Steampunk con borde arcoíris y relleno impresionante */
        .texto-steampunk {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: 'Courier New', Courier, monospace;
            font-size: 3em; /* Tamaño más pequeño */
            font-weight: bold;
            color: #FF1493; /* Color fucsia impresionante para el relleno */
            text-shadow: 0px 0px 10px rgba(255, 20, 147, 0.7), 0px 0px 20px rgba(255, 20, 147, 0.7), 0px 0px 30px rgba(255, 20, 147, 0.7); /* Brillo fucsia */
            animation: blink 1.5s infinite alternate, glow 2s ease-in-out infinite, rainbow-border 3s linear infinite; /* Animaciones */
            text-align: justify; /* Justificar el texto */
            -webkit-background-clip: text; /* Hacer que el fondo sea solo para las letras */
            background-clip: text; /* Hacer que el fondo sea solo para las letras */
            background: none; /* Eliminar fondo */
            -webkit-text-stroke: 2px rgba(255, 0, 0, 0.8); /* Borde rojo */
            text-stroke: 2px rgba(255, 0, 0, 0.8); /* Borde rojo para navegadores modernos */
            width: 90%; /* Ajusta el ancho para el texto */
            margin: 0 auto; /* Centrar el texto */
            text-align: center; /* Centrar el texto */
        }

        /* Animación de parpadeo del texto */
        @keyframes blink {
            0% {
                opacity: 0.8;
            }
            100% {
                opacity: 1;
            }
        }

        /* Animación de resplandor (Glow) */
        @keyframes glow {
            0% {
                text-shadow: 0px 0px 10px rgba(255, 20, 147, 0.7), 0px 0px 20px rgba(255, 20, 147, 0.7), 0px 0px 30px rgba(255, 20, 147, 0.7); /* Brillo estático */
            }
            50% {
                text-shadow: 0px 0px 30px rgba(255, 20, 147, 1), 0px 0px 40px rgba(255, 20, 147, 1), 0px 0px 50px rgba(255, 20, 147, 1); /* Brillo más fuerte */
            }
            100% {
                text-shadow: 0px 0px 10px rgba(255, 20, 147, 0.7), 0px 0px 20px rgba(255, 20, 147, 0.7), 0px 0px 30px rgba(255, 20, 147, 0.7); /* Brillo suave */
            }
        }

        /* Animación de borde arcoíris cambiante */
        @keyframes rainbow-border {
            0% {
                -webkit-text-stroke: 2px rgba(255, 0, 0, 0.8);
                text-stroke: 2px rgba(255, 0, 0, 0.8);
            }
            14% {
                -webkit-text-stroke: 2px rgba(255, 127, 0, 0.8);
                text-stroke: 2px rgba(255, 127, 0, 0.8);
            }
            28% {
                -webkit-text-stroke: 2px rgba(255, 255, 0, 0.8);
                text-stroke: 2px rgba(255, 255, 0, 0.8);
            }
            42% {
                -webkit-text-stroke: 2px rgba(0, 255, 0, 0.8);
                text-stroke: 2px rgba(0, 255, 0, 0.8);
            }
            57% {
                -webkit-text-stroke: 2px rgba(0, 0, 255, 0.8);
                text-stroke: 2px rgba(0, 0, 255, 0.8);
            }
            71% {
                -webkit-text-stroke: 2px rgba(75, 0, 130, 0.8);
                text-stroke: 2px rgba(75, 0, 130, 0.8);
            }
            85% {
                -webkit-text-stroke: 2px rgba(238, 130, 238, 0.8);
                text-stroke: 2px rgba(238, 130, 238, 0.8);
            }
            100% {
                -webkit-text-stroke: 2px rgba(255, 0, 0, 0.8);
                text-stroke: 2px rgba(255, 0, 0, 0.8);
            }
        }

        /* Estilo del botón */
        .boton {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px 30px;
            background-color: #FF6347; /* Rojo brillante */
            color: white;
            font-size: 1.2em;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .boton:hover {
            background-color: #FF4500;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<audio autoplay loop>
        <source src="../carta.mp3" type="audio/mp3">
        Tu navegador no soporta la etiqueta de audio.
    </audio>

<canvas id="florCanvas"></canvas>

<!-- Texto Steampunk con borde arcoíris y relleno impresionante -->
<div class="texto-steampunk">
No me importa cuánto tiempo pase, siempre estaré esperando por ti porque El amor verdadero no es simplemente un sentimiento. Es un compromiso.
</div>

<button class="boton" onclick="window.history.back();">Volver</button> <!-- Botón de volver -->

<script>
    const canvas = document.getElementById('florCanvas');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    // Clase para crear flores
    class Flor {
        constructor(x, y) {
            this.x = x;
            this.y = y;
            this.size = Math.random() * 20 + 20; // Tamaño de la flor aumentado
            this.color = this.getRandomColor(); // Color aleatorio
            this.speedX = Math.random() * 2 - 1; // Velocidad en el eje X
            this.speedY = Math.random() * 2 - 1; // Velocidad en el eje Y
            this.glowEffect = Math.random() * 1 + 1; // Efecto de resplandor para las flores
        }

        // Método para dibujar la flor
        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fillStyle = this.color;
            ctx.shadowColor = this.color;  // El color del resplandor será el mismo que el de la flor
            ctx.shadowBlur = 20 * this.glowEffect;  // Desenfoque del resplandor
            ctx.fill();
            ctx.shadowBlur = 0; // Eliminar el resplandor al finalizar el dibujo de la flor
        }

        // Método para mover la flor
        move() {
            this.x += this.speedX;
            this.y += this.speedY;

            // Hacer que las flores "rebote" al llegar a los bordes
            if (this.x < 0 || this.x > canvas.width) {
                this.speedX = -this.speedX;
            }
            if (this.y < 0 || this.y > canvas.height) {
                this.speedY = -this.speedY;
            }
        }

        // Función para generar colores brillantes y contrastantes
        getRandomColor() {
            const colors = ['#FF6347', '#FF4500', '#FFD700', '#00FA9A', '#00BFFF', '#FF1493', '#8A2BE2', '#FF69B4'];
            return colors[Math.floor(Math.random() * colors.length)];
        }
    }

    // Arreglo para almacenar las flores
    const flores = [];

    // Función para crear flores
    function crearFlores() {
        for (let i = 0; i < 50; i++) { // Aumentar el número de flores
            let x = Math.random() * canvas.width;
            let y = Math.random() * canvas.height;
            flores.push(new Flor(x, y));
        }
    }

    // Función para animar las flores
    function animar() {
        ctx.clearRect(0, 0, canvas.width, canvas.height); // Limpiar el canvas en cada fotograma
        for (let flor of flores) {
            flor.move();
            flor.draw();
        }
        requestAnimationFrame(animar); // Continuar la animación
    }

    // Inicializar y empezar la animación
    crearFlores();
    animar();
</script>

</body>
</html>
