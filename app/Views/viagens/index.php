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

    <div class="container col-md-8 mx-auto text-center">
        <h2 class="mb-4 text-center">Lista de Viagens</h2>
        <a href="<?= base_url('viagens/create') ?>" class="btn btn-primary text-center">Nova Viagem</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Motorista (CNH)</th>
                <th>Veículo (ID)</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>KM Início</th>
                <th>Data Início</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($viagens) && is_array($viagens)): ?>
                <?php foreach ($viagens as $viagem): ?>
                    <?php if (empty($viagem['km_fim'])): ?>
                        <tr>
                            <td><?= esc($viagem['id']) ?></td>
                            <td><?= esc($viagem['motorista_cnh']) ?></td>
                            <td><?= esc($viagem['veiculo_id']) ?></td>
                            <td><?= esc($viagem['modelo']) ?></td>
                            <td><?= esc($viagem['placa']) ?></td>
                            <td><?= esc($viagem['km_inicio']) ?></td>
                            <td><?= esc($viagem['data_inicio']) ?></td>
                            <td>
                                <a href="<?= base_url('viagens/edit/' . $viagem['id']) ?>" class="btn btn-warning btn-sm">Finalizar</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Nenhuma viagem encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


    <div class="container col-md-8 mx-auto text-center">
        <h2 class="mb-4 text-center">Viagens Finalizadas</h2>
    </div>