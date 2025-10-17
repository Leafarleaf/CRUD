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

<div class="container mt-4">
  <h2>Nova Viagem</h2>

  <form action="<?= base_url('viagens/store') ?>" method="post">
    <?= csrf_field() ?>

    <label>Motoristas</label>
    <select name="motoristas[]" class="form-control mb-2" multiple required>
      <?php foreach ($motoristas as $m): ?>
        <option value="<?= esc($m['cnh']) ?>">
          <?= esc($m['nome']) ?> (<?= esc($m['cnh']) ?>)
        </option>
      <?php endforeach; ?>
    </select>

    <label>Veículo</label>
    <select name="veiculo_id" class="form-control mb-2" required>
      <option value="">Selecione...</option>
      <?php foreach ($veiculos as $v): ?>
        <option value="<?= esc($v['id']) ?>">
          <?= esc($v['modelo']) ?> - <?= esc($v['placa']) ?>
        </option>
      <?php endforeach; ?>
    </select>

    <input type="number" name="km_inicio" class="form-control mb-2" placeholder="KM Inicial" required>
    <input type="datetime-local" name="data_inicio" class="form-control mb-2" required>

    <button type="submit" class="btn btn-success">Iniciar Viagem</button>
    <a href="<?= base_url('viagens') ?>" class="btn btn-danger">Voltar</a>
  </form>
</div>