<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert content</title>
</head>
<body>
    <form action="/content/new" method="post">
        <label for="">Nome:</label>
        <input type="text" name="name">
        <label for="">Peso na nota:</label>
        <input type="number" step="0.01" name="weight">
        <select name="id_subject">
        <?php foreach ($subjects as $subject): ?>
            <option value="<?= $subject['idsubject'] ?>"><?= $subject['name'] ?></option>
        <?php endforeach; ?>
        </select>
        <button type="submit">Inserir</button>
    </form>
</body>
</html>