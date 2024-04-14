<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert session</title>
</head>
<body>
    <form action="/session/new" method="post">
        <label for="">Data da sessão de estudos:</label>
        <input type="date" name="date">
        <select name="id_subject">
            <?php foreach ($subjects as $subject): ?>
                <option value="<?= $subject['idsubject'] ?>"><?= $subject['name'] ?></option>
                <?php endforeach; ?>
            </select>
        <select name="id_content">
        <?php foreach ($contents as $content): ?>
            <option value="<?= $content['idcontent'] ?>"><?= $content['name'] ?></option>
        <?php endforeach; ?>
        </select>
        <button type="submit">Inserir</button>
    </form>
</body>
</html>