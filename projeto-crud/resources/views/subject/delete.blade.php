<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Excluir matéria</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Excluir matéria</h1>
        <div class="alert alert-warning" role="alert">
            Você tem certeza que deseja excluir essa matéria?
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Id:</strong></label>
            <p>{{ $subject->id }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Nome:</strong></label>
            <p>{{ $subject->nome }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Data da prova:</strong></label>
            <p>{{ $subject->data_prova }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Nota:</strong></label>
            <p>{{ $subject->nota }}</p>
        </div>
        <form action="{{ route('subjects.destroy', $subject->id )}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>