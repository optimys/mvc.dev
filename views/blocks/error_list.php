<? if (!empty($data['errors'])): ?>
    <div class="col-md-6">
        <ul class="list-group">
            <?php var_dump(Session_h::get('errors')); ?>
            <? foreach (Session_h::get('errors') as $error): ?>
                <li class='list-group-item list-group-item-warning'>Warning: <?= $error ?></li>
            <? endforeach ?>
        </ul>
    </div>
<? endif ?>

