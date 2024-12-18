<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Te adoro</title>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&family=Poiret+One&display=swap" rel="stylesheet"> 
    <style>
        /* Estilos generales */
        body {
            font-family: 'Poiret One', sans-serif;
            background: linear-gradient(135deg, #2e003e, #6c2b8a); /* Fondo oscuro y romántico */
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.4s ease-in-out;
        }

        body:hover {
            background: linear-gradient(135deg, #ff67a3, #ffedb3);
        }

        .quiz-container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 40px 30px;
            border-radius: 25px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
            width: 400px;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .question {
            font-size: 26px;
            color: #ffeb3b; /* Color dorado */
            margin-bottom: 25px;
            font-family: 'Parisienne', cursive;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        }

        .options {
            margin-bottom: 20px;
        }

        .option {
            background-color: #ff67a3;
            color: white;
            padding: 15px;
            margin: 12px 0;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 20px;
            transition: transform 0.2s ease, background-color 0.3s ease;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4);
        }

        .option:hover {
            background-color: #ff4757;
            transform: scale(1.1);
        }

        .btn-next {
            background-color: #ff6b81;
            color: white;
            padding: 14px 28px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
            opacity: 0;
            visibility: hidden;
            pointer-events: none; /* Evitar hacer clic mientras esté oculto */
        }

        .btn-next.show {
            opacity: 1;
            visibility: visible;
            pointer-events: auto; /* Hacerlo interactuable cuando esté visible */
            animation: fadeIn 0.5s ease-in-out;
        }

        .hidden {
            display: none;
        }

        .heart {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 50px;
            color: #ff6b81;
            animation: bounceHeart 1.5s infinite;
        }

        @keyframes bounceHeart {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }

        /* Estilo para el botón de regresar */
        .btn-regresar {
            background-color: #6c2b8a;
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-regresar:hover {
            background-color: #ff67a3;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<audio autoplay loop>
        <source src="../mipha.mp3" type="audio/mp3">
        Tu navegador no soporta la etiqueta de audio.
    </audio>

<div class="quiz-container">
    <div id="heart" class="heart">❤️</div>
    <div id="question-container">
        <div class="question" id="question"></div>
        <div class="options">
            <button class="option" id="option1" onclick="checkAnswer(1)"></button>
            <button class="option" id="option2" onclick="checkAnswer(2)"></button>
            <button class="option" id="option3" onclick="checkAnswer(3)"></button>
        </div>
        <button class="btn-next" id="nextButton" onclick="nextQuestion()">Siguiente</button>
    </div>

    <!-- Botón para regresar -->
    <br><br>
    <a href="#" class="btn-regresar" id="regresarButton">Regresar</a>
</div>

<script>
    // Array con las preguntas y respuestas
    const questions = [
        {
            question: "Cual es mi apellido?",
            options: ["Lopez", "Guerrero", "Garcia"],
            correct: 2 // Respuesta correcta: "Garcia"
        },
        {
            question: "¿Qué es el amor para mi?",
            options: ["Un sentimiento", "Una sugerencia", "Un mito"],
            correct: 1 // Respuesta correcta: "Un sentimiento"
        },
        {
            question: "¿Cuál es el color de una rosa roja?",
            options: ["Blanco", "Rojo", "Amarillo"],
            correct: 2 // Respuesta correcta: "Rojo"
        },
        {
            question: "¿Cuántos años tengo?",
            options: ["17", "19", "22"],
            correct: 2 // Respuesta correcta: "22"
        },
        {
            question: "¿Cuándo es nuestro aniversario?",
            options: ["18 de diciembre", "25 de diciembre", "1 de enero"],
            correct: 1 // Respuesta correcta: "14 de diciembre"
        },
        {
            question: "¿Cuánto crees que te amo?",
            options: ["Demasiado", "Mucho", "Bastante"],
            correct: 1 // Respuesta correcta: "Demasiado"
        },
        {
            question: "¿Quieres saber qué siento por ti?",
            options: ["Sí", "No", "Desaparece de una buena vez maldito desgraciado"],
            correct: 1 // Respuesta correcta: "Sí"
        }
    ];

    let currentQuestionIndex = 0;

    function loadQuestion() {
        const currentQuestion = questions[currentQuestionIndex];
        document.getElementById('question').textContent = currentQuestion.question;
        document.getElementById('option1').textContent = currentQuestion.options[0];
        document.getElementById('option2').textContent = currentQuestion.options[1];
        document.getElementById('option3').textContent = currentQuestion.options[2];

        // Ocultar el botón Siguiente inicialmente
        document.getElementById('nextButton').classList.remove('show');
    }

    function checkAnswer(selectedOption) {
        const currentQuestion = questions[currentQuestionIndex];

        // Verificar si la respuesta seleccionada es correcta
        if (selectedOption === currentQuestion.correct) {
            alert("¡Respuesta correcta! ❤️");
        } else {
            alert("Respuesta incorrecta. La respuesta correcta era: " + currentQuestion.options[currentQuestion.correct - 1]);
        }

        // Mostrar el botón siguiente
        document.getElementById('nextButton').classList.add('show');
    }

    function nextQuestion() {
        currentQuestionIndex++; // Avanzamos al siguiente índice

        if (currentQuestionIndex < questions.length) {
            loadQuestion(); // Cargar la siguiente pregunta
        } else {
            alert("Te amo sofi, enserio espero que leas todo esto, te amo que nunca se te olvide 💖");
            window.location.href = "cora1.php"; // Redirigir a la página PHP de tu elección
        }
    }

    // Función para personalizar el enlace del botón "Regresar"
    document.getElementById("regresarButton").addEventListener("click", function() {
        window.location.href = "../uno.php"; // Reemplaza con tu enlace deseado
    });

    // Cargar la primera pregunta al iniciar
    loadQuestion();
</script>

</body>
</html>
