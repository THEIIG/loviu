<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Te quiero mucho</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 20px;
            background-color: #fbe7e7;
        }

        h1 {
            color: #d85a5a;
        }

        .puzzle-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
            flex-wrap: wrap; /* Permite que el contenido se acomode en pantallas más pequeñas */
        }

        .puzzle {
            display: grid;
            grid-template-columns: repeat(5, 50px);
            grid-template-rows: repeat(5, 50px);
            gap: 5px;
            justify-content: center;
            border: 2px solid #d85a5a;
            padding: 10px;
            background-color: #ffffff;
        }

        .puzzle div {
            width: 50px;
            height: 50px;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ccc;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            color: #d85a5a;
        }

        .puzzle div.selected {
            background-color: #ffcccb;
        }

        .word-list {
            font-size: 18px;
            color: #d85a5a;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .word-list p {
            font-size: 20px;
            font-weight: bold;
        }

        .message {
            margin-top: 20px;
            font-size: 18px;
            color: green;
        }

        .input-box {
            margin-top: 20px;
            font-size: 18px;
        }

        .word-input {
            font-size: 18px;
            padding: 5px;
            margin: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #d85a5a;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #ff6666;
        }

        /* Agregado para mejorar la visualización en pantallas pequeñas */
        @media (max-width: 768px) {
            .puzzle-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<audio autoplay>
        <source src="../zelda.mp3" type="audio/mp3">
        Tu navegador no soporta la etiqueta de audio.
    </audio>         

    <h1>Te quiero mucho</h1>
    <p>Haz clic en las casillas para formar las palabras correctas</p>

    <div class="puzzle-container">
        <div class="puzzle" id="puzzleGrid"></div>

        <div class="word-list">
            <p><strong>Palabras a formar:</strong></p>
            <p>amor</p>
            <p>querer</p>
            <p>futuro</p>
            <p>juntos</p>
        </div>
    </div>

    <div class="input-box">
        <input type="text" id="wordInput" class="word-input" placeholder="Ingresa la palabra correcta" />
        <button onclick="checkWord()">Verificar</button>
    </div>

    <div class="message" id="messageBox"></div>

    <!-- Botón para regresar -->
    <div style="margin-top: 20px;">
        <button onclick="goBack()">Regresar</button>
    </div>

    <script>
        const puzzleGrid = document.getElementById('puzzleGrid');
        const wordInput = document.getElementById('wordInput');
        const messageBox = document.getElementById('messageBox');

        // Palabras a formar y enlaces correspondientes
        const words = {
            "amor": "https://youtu.be/9CfY1xxbgSc?si=_MJZUGWderORawWS",
            "querer": "https://youtu.be/NEXR2VoLgxo?si=1RjDoONlEg4AzuwY",
            "futuro": "https://youtu.be/oy5ouz2x3TA?si=dZzFs6Ox3aC4UDHA",
            "juntos": "https://youtu.be/h10-9k0W3qw?si=p1tBIhsrqnvB1O45"
        };

        let currentWord = '';

        // Función para crear el puzzle
        function createPuzzle() {
            let allLetters = Object.keys(words).join('').split('');
            allLetters = shuffle(allLetters);

            for (let i = 0; i < 25; i++) {
                let div = document.createElement('div');
                div.textContent = allLetters[i] || '';
                div.onclick = () => selectLetter(div);
                puzzleGrid.appendChild(div);
            }
        }

        // Función para seleccionar una letra
        function selectLetter(letterDiv) {
            if (letterDiv.classList.contains('selected')) {
                letterDiv.classList.remove('selected');
                currentWord = currentWord.replace(letterDiv.textContent, '');
            } else {
                letterDiv.classList.add('selected');
                currentWord += letterDiv.textContent;
            }
            wordInput.value = currentWord;
        }

        // Función para verificar si la palabra es correcta
        function checkWord() {
            if (words[currentWord]) {
                messageBox.textContent = `¡Correcto! Has completado el puzzle con la palabra: ${currentWord}`;

                // Redirigir a la URL correspondiente
                window.open(words[currentWord], "_blank");

                // Luego, resetea la palabra actual
                currentWord = '';  // Resetea la palabra actual
                wordInput.value = '';  // Resetea el campo de texto
            } else {
                messageBox.textContent = 'La palabra no es correcta, intenta de nuevo.';
            }
        }

        // Función para barajar las letras
        function shuffle(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        // Función para redirigir a la ruta deseada
        function goBack() {
            window.location.href = '../uno.php'; // Puedes cambiar 'inicio.html' por cualquier ruta
        }

        createPuzzle();
    </script>
</body>
</html>
