<? if(Session_h::exist('info')):?>
<div class="col-md-6">
    <ul class="list-group">
        <? foreach (Session_h::get('info') as $error): ?>
            <li class='list-group-item list-group-item-warning'>Warning: <?=$error;?></li>
        <? endforeach ?>
    </ul>
</div>

<? endif?>
