<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elige</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            overflow: hidden;
            background-color: #111;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            color: white;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 20px;
            cursor: pointer;
            transition: transform 0.5s ease, box-shadow 0.5s ease, filter 0.5s ease, transform 0.5s ease;
            z-index: 1;
        }

        /* Efectos 3D y transformación al pasar el ratón */
        .image:hover {
            transform: scale(1.3) rotate(20deg) translate3d(0, -20px, 10px);
            box-shadow: 0 0 50px 20px rgba(255, 0, 255, 0.8), 0 0 100px 20px rgba(0, 255, 255, 0.8), 0 0 150px 20px rgba(255, 255, 0, 0.8);
            filter: brightness(1.5) saturate(2) hue-rotate(180deg);
        }

        /* Efecto de pulsación al hacer clic */
        .image:active {
            transform: scale(1.1);
            transition: transform 0.1s ease-out;
        }

        /* Fondo de partículas interactivo */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            pointer-events: none;
            opacity: 0;
            animation: particleAnim 5s infinite;
        }

        @keyframes particleAnim {
            0% {
                transform: scale(0) translate(0, 0);
                opacity: 0;
            }
            50% {
                opacity: 1;
                transform: scale(1) translate(var(--x), var(--y));
            }
            100% {
                opacity: 0;
                transform: scale(0) translate(var(--x), var(--y));
            }
        }

        /* Fondo interactivo con partículas */
        body {
            position: relative;
        }

    </style>
</head>
<body>

<audio autoplay loop>
        <source src="../carta.mp3" type="audio/mp3">
        Tu navegador no soporta la etiqueta de audio.
    </audio>
    
<audio autoplay loop>
        <source src="centaleon.mp3" type="audio/mp3">
        Tu navegador no soporta el formato de audio.
    </audio>

    <div class="container">
        <img src="peon.png" alt="Imagen 1" class="image" onclick="window.location.href='opciones/peon.php'">
        <img src="chispas.png" alt="Imagen 2" class="image" onclick="window.location.href='opciones/brillo.php'">
        <img src="kokoro.png" alt="Imagen 3" class="image" onclick="window.location.href='opciones/cora.php'">
        <img src="ai.png" alt="Imagen 4" class="image" onclick="window.location.href='opciones/amor.php'">
        <img src="pantera.png" alt="Imagen 5" class="image" onclick="window.location.href='opciones/puma.php'">
    </div>

    <script>
        // Crear partículas interactivas
        const body = document.body;

        // Función para crear partículas
        function createParticle(x, y) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            body.appendChild(particle);

            // Establecer posiciones aleatorias para las partículas
            const size = Math.random() * 8 + 5; // Tamaño aleatorio de la partícula
            particle.style.width = size + 'px';
            particle.style.height = size + 'px';
            particle.style.left = `${x - size / 2}px`;
            particle.style.top = `${y - size / 2}px`;

            // Establecer los valores de la animación de la partícula
            const randomX = Math.random() * 300 - 150; // Movimiento horizontal aleatorio
            const randomY = Math.random() * 300 - 150; // Movimiento vertical aleatorio
            particle.style.setProperty('--x', `${randomX}px`);
            particle.style.setProperty('--y', `${randomY}px`);

            // Eliminar la partícula después de que la animación haya terminado
            setTimeout(() => {
                body.removeChild(particle);
            }, 5000); // Las partículas duran 5 segundos
        }

        // Detectar movimiento del mouse y crear partículas
        body.addEventListener('mousemove', (e) => {
            createParticle(e.clientX, e.clientY);
        });
    </script>

</body>
</html>
