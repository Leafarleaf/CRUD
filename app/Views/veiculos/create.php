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

<div class="container mt-5 col-md-6 mx-auto">
  <div class="row">
    <h2 class="mb-4 text-center">Novo Veículo</h2>

    <form action="<?= base_url('veiculos/store') ?>" method="post">
      <?= csrf_field() ?>

      <input type="text" name="modelo" class="form-control mb-2" placeholder="Modelo">

      <input type="number" name="ano" class="form-control mb-2" placeholder="Ano">

      <label for="data_aquisicao" class="form-label">Data de aquisição</label>
      <input type="date" name="data_aquisicao" class="form-control mb-2">

      <input type="number" name="km_aquisicao" class="form-control mb-2" placeholder="KM no momento da aquisição">

      <input type="text" name="renavam" class="form-control mb-2" placeholder="Renavam">

      <input type="text" name="placa" class="form-control mb-2" placeholder="Placa">


      <div class="d-flex justify-content-between mt-3">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="<?= base_url('veiculos') ?>" class="btn btn-danger">Voltar</a>
      </div>

      <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
          <ul class="mb-0">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
              <li><?= esc($error) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

    </form>
  </div>
</div>