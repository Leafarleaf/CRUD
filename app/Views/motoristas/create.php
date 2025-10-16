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
                          <a class="nav-link" href="/veiculos">Veículos
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/viagens">Viagens</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
  </body>

  <h2 class="mb-4 text-center">Cadastrar Motorista</h2>

  <div class="d-flex justify-content-center">
      <form action="/motoristas/store" method="post" class="w-50">

          <?= csrf_field() ?>

          <div class="mb-3">
              <label for="cnh" class="form-label">CNH</label>
              <input type="text" id="cnh" name="cnh" value="<?= old('cnh') ?>" class="form-control">
          </div>

          <div class="mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" id="nome" name="nome" value="<?= old('nome') ?>" class="form-control">
          </div>

          <div class="mb-3">
              <label for="data_nascimento" class="form-label">Data de Nascimento</label>
              <input type="date" id="data_nascimento" name="data_nascimento" value="<?= old('data_nascimento') ?>" class="form-control">
          </div>

          <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href="<?= base_url('motoristas') ?>" class="btn btn-danger">Voltar</a>
          </div>

          <?php if (session()->getFlashdata('errors')): ?>
              <div class="alert alert-danger mt-3">
                  <ul class="mb-0">
                      <?php foreach (session()->getFlashdata('errors') as $error): ?>
                          <li><?= esc($error) ?></li>
                      <?php endforeach; ?>
                  </ul>
              </div>
          <?php endif; ?>

      </form>
  </div>

  <?= $this->endSection() ?>

  </div>