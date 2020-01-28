<?php foreach($params['quiz']['content'] as $vocab): ?>
    <div class="form-group row">
        <label class="col-sm-6 col-form-label text-center">
            <?= $vocab->English ?>
        </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="<?= guesses[$vocab->English] ?>" />
        </div>
    </div>
<?php endforeach; ?>