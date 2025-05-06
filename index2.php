<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Etiquetas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        textarea {
            width: 100%;
            height: 300px;
            font-family: monospace;
            font-size: 14px;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 16px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Generador de Etiquetas para Códigos Internos</h2>
        <form action="generar_pdf2.php" method="post" target="_blank">
            <label for="codigos">Ingrese los códigos internos, uno por línea:</label><br>
            <textarea name="codigos" id="codigos" placeholder="Ejemplo:\nINT-001\nINT-002\nINT-003"></textarea><br>
            <button type="submit">Generar PDF</button>
        </form>
    </div>
</body>
</html>
