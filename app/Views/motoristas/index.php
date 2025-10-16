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

</html>
<div class="mb-4 text-center">
    <h2>Lista de motoristas</h2>
    <a href="<?= base_url('motoristas/create') ?>" class="btn btn-success">Novo Motorista</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>CNH</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($motoristas as $m): ?>
            <tr>
                <td><?= esc($m['cnh']) ?></td>
                <td><?= esc($m['nome']) ?></td>
                <td><?= esc($m['data_nascimento']) ?></td>
                <td>
                    <a href="<?= base_url("motoristas/{$m['cnh']}/edit") ?>" class="btn btn-primary">Editar</a>
                    <form action="<?= base_url("motoristas/{$m['cnh']}") ?>" method="post" style="display:inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Deseja excluir este motorista?')">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>