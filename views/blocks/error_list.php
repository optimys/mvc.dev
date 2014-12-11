
<ul class="list-group">
    <? foreach ($data['errors'] as $error): ?>
    <li class="list-group-item list-group-item-warning">Warning <?=$error;?></li>
    <? endforeach ?>
</ul>