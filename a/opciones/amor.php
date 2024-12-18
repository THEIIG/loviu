<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Amor para Ti</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #000;
            cursor: pointer;
            position: relative;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #ff4081, #3f51b5, #00e676);
            background-size: 400% 400%;
            animation: gradientAnimation 6s ease infinite;
            transform-origin: center center;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .distortion {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url('https://source.unsplash.com/random/1920x1080?love');
            background-size: cover;
            filter: blur(8px);
            transition: transform 0.1s ease-out;
        }

        /* Partículas de Amor */
        .particle {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #ff4081;
            border-radius: 50%;
            opacity: 0;
            animation: particleAnimation 1s ease-out forwards;
            pointer-events: none;
        }

        @keyframes particleAnimation {
            0% {
                transform: scale(0) translate(0, 0);
                opacity: 1;
            }
            100% {
                transform: scale(1) translate(0, 0);
                opacity: 0;
            }
        }

        /* Luces Brillantes al hacer clic */
        .shine {
            position: absolute;
            width: 30px;
            height: 30px;
            background-color: #fff;
            border-radius: 50%;
            opacity: 0;
            animation: shineEffect 1s forwards;
            pointer-events: none;
        }

        @keyframes shineEffect {
            0% {
                width: 30px;
                height: 30px;
                opacity: 1;
            }
            100% {
                width: 150px;
                height: 150px;
                opacity: 0;
            }
        }

        /* Mensajes de amor flotantes */
        .love-message {
            position: absolute;
            color: white;
            font-size: 20px;
            font-weight: bold;
            opacity: 0;
            animation: fadeInOut 2s ease-out forwards;
            pointer-events: none;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            50% {
                opacity: 1;
                transform: translateY(0);
            }
            100% {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        /* Estilo para el texto "SOFÍA" */
        .sofia-text {
            position: relative;
            font-size: 120px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 10px;
            z-index: 10;
            animation: textAnimation 3s ease-in-out infinite;
        }

        @keyframes textAnimation {
            0% { color: #ff4081; }
            50% { color: #3f51b5; }
            100% { color: #00e676; }
        }

        /* Botón de Regresar */
        .back-button {
            position: absolute;
            bottom: 20px;
            left: 20px;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #ff4081;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            z-index: 20;
        }

        .back-button:hover {
            background-color: #f50057;
        }

    </style>
</head>
<body>

<audio autoplay loop>
        <source src="../mipha.mp3" type="audio/mp3">
        Tu navegador no soporta la etiqueta de audio.
    </audio>


<div class="background"></div>
<div class="distortion" id="distortion"></div>

<!-- Texto con el nombre "SOFÍA" -->
<div class="sofia-text">SOFÍA</div>

<!-- Botón de regresar -->
<button class="back-button" onclick="goBack()">Regresar</button>

<script>
    const distortion = document.getElementById('distortion');

    // Función para redirigir a una página
    function goBack() {
        // Aquí puedes poner la URL a la que deseas que el usuario regrese
        window.location.href = "../uno.php";  // Cambia esta URL con la de tu elección
    }

    // Mostrar partículas de amor al mover el cursor
    document.addEventListener('mousemove', (event) => {
        const x = event.clientX;
        const y = event.clientY;

        // Cambiar el color de fondo dinámicamente con el ratón
        const r = Math.floor((x / window.innerWidth) * 255);
        const g = Math.floor((y / window.innerHeight) * 255);
        const b = 255 - r;
        document.querySelector('.background').style.background = `rgb(${r}, ${g}, ${b})`;

        // Efecto de distorsión en el fondo
        distortion.style.transform = `scale(1.1) translate(${(x - window.innerWidth / 2) / 15}px, ${(y - window.innerHeight / 2) / 15}px)`;

        // Crear partículas de amor
        createParticle(x, y);

        // Crear un mensaje de amor flotante
        const message = document.createElement('div');
        message.classList.add('love-message');
        message.textContent = "Te amo 💖";
        document.body.appendChild(message);

        // Posicionar el mensaje en el lugar del cursor
        message.style.left = `${x - message.offsetWidth / 2}px`;
        message.style.top = `${y - message.offsetHeight / 2}px`;

        // Eliminar el mensaje después de que termine la animación
        setTimeout(() => {
            message.remove();
        }, 2000);
    });

    // Crear una partícula de amor
    function createParticle(x, y) {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        document.body.appendChild(particle);
        
        // Colocar la partícula en la posición del cursor
        particle.style.left = `${x - particle.offsetWidth / 2}px`;
        particle.style.top = `${y - particle.offsetHeight / 2}px`;

        // Desaparecer la partícula después de su animación
        setTimeout(() => {
            particle.remove();
        }, 1000);
    }

    // Crear un efecto de luz brillante al hacer clic
    document.addEventListener('click', (event) => {
        const x = event.clientX;
        const y = event.clientY;

        const shine = document.createElement('div');
        shine.classList.add('shine');
        document.body.appendChild(shine);

        // Colocar el resplandor en la posición del clic
        shine.style.left = `${x - shine.offsetWidth / 2}px`;
        shine.style.top = `${y - shine.offsetHeight / 2}px`;

        // Eliminar el resplandor después de la animación
        setTimeout(() => {
            shine.remove();
        }, 1000);
    });

</script>

</body>
</html>
