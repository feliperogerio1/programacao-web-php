<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir matéria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="mt-2 text-center">
            <h3>Excluir matéria</h3>
        </div>
        <form action="/subject/erase" method="post">
            <input type="hidden" name="id" value="<?= $result["idsubject"]?>">
            <div class="row mt-4">
                <div class="col-4">
                    <label for="" class="form-label">Nome:</label>
                    <input type="text" name="name" class="form-control" value="<?= $result["name"]?>" disabled>
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Data da P1:</label>
                    <input type="date" name="datep1" class="form-control" value="<?= $result["datep1"]?>" disabled>
                </div>
                <div class="col-4">
                    <label for="" class="form-label">Data da P2:</label>
                    <input type="date" name="datep2" class="form-control" value="<?= $result["datep2"]?>" disabled>
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