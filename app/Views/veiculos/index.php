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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

<div class="mb-4 text-center">
  <h2>Lista de Veículos</h2>
  <a href="<?= base_url('veiculos/create') ?>" class="btn btn-success mb-3">Novo Veículo</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th>Modelo</th>
      <th>Ano</th>
      <th>Data Aquisição</th>
      <th>KM</th>
      <th>Renavam</th>
      <th>Placa</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($veiculos as $v): ?>
      <tr>
        <td><?= esc($v['modelo']) ?></td>
        <td><?= esc($v['ano']) ?></td>
        <td><?= esc($v['data_aquisicao']) ?></td>
        <td><?= esc($v['km_aquisicao']) ?></td>
        <td><?= esc($v['renavam']) ?></td>
        <td><?= esc($v['placa']) ?></td>
        <td>
          <a href="<?= base_url('veiculos/' . $v['id'] . '/edit') ?>" class="btn btn-primary btn-sm">Editar</a>
          <form action="<?= base_url('veiculos/' . $v['id']) ?>" method="post" style="display:inline;">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir este veículo?')">Excluir</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>