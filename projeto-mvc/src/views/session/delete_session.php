<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir sessão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Excluir sessão</h3>
        </div>
        <form action="/session/erase" method="post">
            <input type="hidden" name="id" value="<?= $result["idsession"]?>">
            <div class="row mt-4">
                <div class="col-4">
                    <label for="" class="form-label">Conteúdo:</label>
                    <input type="text" name="id_content" class="form-control" value="<?= $current_content["name"]?>" disabled>
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Matéria:</label>
                    <input type="text" name="id_subject" class="form-control" value="<?= $current_subject["name"]?>" disabled>
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Data:</label>
                    <input type="text" name="date" class="form-control" value="<?= $result["date"]?>" disabled>
                </div>
                <div class="row mt-3 text-center">
                    <p>Você deseja realmente excluir esse registro?</p>
                    <div class="col">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>