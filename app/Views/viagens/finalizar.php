<h2>Finalizar Viagem</h2>

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
