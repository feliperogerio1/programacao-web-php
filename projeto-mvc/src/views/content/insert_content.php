<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir conteúdo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Inserir conteúdo</h3>
        </div>
        <form action="/content/new" method="post">
            <div class="row mt-4">
                <div class="col-4">
                    <label for="" class="form-label">Nome:</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Peso na nota:</label>
                    <input type="number" step="0.01" name="weight" class="form-control">
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Matéria:</label>
                    <select name="id_subject" class="form-select">
                    <?php foreach ($subjects as $subject): ?>
                        <option value="<?= $subject['idsubject'] ?>"><?= $subject['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="row mt-3 text-center">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Inserir</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>