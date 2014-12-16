
<ul class="list-group">
 <?php
    if(!empty($data['errors'])){
        foreach($data['errors'] as $error){
            echo "<li class='list-group-item list-group-item-warning'>Warning: {$error}</li>";
        }
    }

  ?>
</ul>