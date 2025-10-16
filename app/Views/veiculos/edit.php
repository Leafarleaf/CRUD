<?= $this->extend('motoristas/layout') ?>
<?= $this->section('content') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <h2 class="mb-4 text-center">Editar Veículo</h2>

    <form action="<?= base_url('veiculos/' . $veiculo['id'] . '/update') ?>" method="post">
      <?= csrf_field() ?>
      <input type="text" name="modelo" value="<?= esc($veiculo['modelo']) ?>" class="form-control mb-2">
      <input type="number" name="ano" value="<?= esc($veiculo['ano']) ?>" class="form-control mb-2">
      <input type="date" name="data_aquisicao" value="<?= esc($veiculo['data_aquisicao']) ?>" class="form-control mb-2">
      <input type="number" name="km_aquisicao" value="<?= esc($veiculo['km_aquisicao']) ?>" class="form-control mb-2">
      <input type="text" name="renavam" value="<?= esc($veiculo['renavam']) ?>" class="form-control mb-2">
      <input type="text" name="placa" value="<?= esc($veiculo['placa']) ?>" class="form-control mb-2">

      <div class="d-flex justify-content-between mt-3">
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="<?= base_url('veiculos') ?>" class="btn btn-danger">Voltar</a>
      </div>
    </form>
  </div>
</div>
</div>

<?= $this->endSection() ?>