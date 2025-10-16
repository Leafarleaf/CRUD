<?= $this->extend('motoristas/layout') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-white">
        <div class="container-fluid">
            <div class="collapse navbar-collapse show" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/motoristas">Motoristas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/veiculos">Veículos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/viagens">Viagens</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
<div class="mb-4 text-center">
    <h2>Finalizar Viagem</h2>
</div>


<form action="<?= base_url('viagens/update/' . $viagem['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group mb-2">
        <label for="km_fim">KM Final</label>
        <input type="number" name="km_fim" class="form-control" required>
    </div>

    <div class="form-group mb-2">
        <label for="data_fim">Data de Chegada</label>
        <input type="datetime-local" name="data_fim" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Finalizar</button>
    <a href="<?= base_url('viagens') ?>" class="btn btn-danger">Cancelar</a>
</form>