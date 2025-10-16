<h2 class="text-center mb-4">Editar Motorista</h2>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<?php if (session()->getFlashdata('errors')): ?>
    <ul class="text-danger">
        <?php foreach (session()->getFlashdata('errors') as $e): ?>
            <li><?= esc($e) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <form action="/motoristas/update/<?= esc($motorista['cnh']) ?>" method="post" class="w-50">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">CNH:</label>
            <input type="text" name="cnh" value="<?= esc($motorista['cnh']) ?>" readonly class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" value="<?= esc($motorista['nome']) ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" value="<?= esc($motorista['data_nascimento']) ?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="/motoristas" class="btn btn-primary ms-2">Voltar</a>
    </form>
</div>
