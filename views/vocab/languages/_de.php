<input type="hidden" name="id" value="<?= $params['quiz']['metadata']->id ?>" />
<?php foreach($params['quiz']['content'] as $vocab): ?>
    <div class="form-group row">
        <label class="col-sm-6 col-form-label text-center">
            <?= $vocab->German ?>
        </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="<?= guesses[$vocab->German] ?>" />
        </div>
    </div>
<?php endforeach; ?>
