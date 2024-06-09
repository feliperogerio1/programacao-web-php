<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <title>Lista de matérias</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de matérias</h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        <a href="{{ route('subjects.create') }}" class="btn btn-success mb-3">Adicionar matéria</a>
        <table id="tabela" class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Data da prova</th>
                    <th>Nota</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->nome }}</td>
                        <td>{{ $subject->data_prova }}</td>
                        <td>{{ $subject->nota }}</td>
                        <td>
                            <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('subjects.delete', $subject->id) }}" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var table = new DataTable('#tabela', {
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json',
            },
        });
    </script>
</body>
</html>