<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notes</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 10px;
        }
        form {
            margin-bottom: 10px;
        }
        .message {
            padding: 10px;
        }
        .success {
            background-color: rgb(142, 255, 168);
            color: #155724;
        }
        .error {
            background-color: rgb(249, 148, 157);
            color: rgb(255, 0, 25);
        }
    </style>
</head>
<body>
    <h1>submit a note!</h1>

    <?php if (isset($response)): ?>
        <div class="message <?= $response['success'] ? 'success' : 'error' ?>">
            <?= htmlspecialchars($response['message']) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="../public/index.php">
        <label for="title">note title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">note description:</label><br>
        <textarea id="description" name="description" rows="5" required></textarea><br><br>

        <button type="submit">submit your note!</button>
    </form>
</body>
</html>
