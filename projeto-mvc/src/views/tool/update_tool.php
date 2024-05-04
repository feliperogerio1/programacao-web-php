<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar ferramenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Alterar ferramenta</h3>
        </div>
        <form action="/tool/edit" method="post">
            <input type="hidden" name="id" value="<?= $result["idtool"]?>">
            <div class="row mt-4">
                <div class="col-4">
                    <label for="" class="form-label">Nome:</label>
                    <input type="text" name="name" class="form-control" value="<?= $result["name"]?>">
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Descrição:</label>
                    <input type="text" name="description" class="form-control" value="<?= $result["description"]?>">
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Matéria:</label>
                    <select name="id_subject" class="form-select">
                    <?php foreach ($subjects as $subject): ?>
                        <option 
                            value="<?= $subject['idsubject'] ?>"
                            <?php 
                                echo ($result['subject_idsubject'] == $subject['idsubject']) ? 'selected' : "";
                            ?>
                        >
                            <?= $subject['name'] ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="row mt-3 text-center">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Alterar</button>
                    </div>
                </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>