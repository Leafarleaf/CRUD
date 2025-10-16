<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Detalhes do Veículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Detalhes do Veículo</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td><?= esc($veiculo['id']) ?></td>
            </tr>
            <tr>
                <th>Modelo</th>
                <td><?= esc($veiculo['modelo']) ?></td>
            </tr>
            <tr>
                <th>Ano</th>
                <td><?= esc($veiculo['ano']) ?></td>
            </tr>
            <tr>
                <th>Data de Aquisição</th>
                <td><?= esc($veiculo['data_aquisicao']) ?></td>
            </tr>
            <tr>
                <th>KMs na Aquisição</th>
                <td><?= esc($veiculo['km_aquisicao']) ?></td>
            </tr>
            <tr>
                <th>Renavam</th>
                <td><?= esc($veiculo['renavam']) ?></td>
            </tr>
            <tr>
                <th>Placa</th>
                <td><?= esc($veiculo['placa']) ?></td>
            </tr>
        </table>
        <a href="<?= base_url('veiculos') ?>" class="btn btn-secondary">Voltar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>