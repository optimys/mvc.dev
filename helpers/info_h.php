<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 05.12.2014
 * Time: 0:34
 */

class Info_h {

    static  function getDiv($message, $type='info'){
      return "<div class='alert alert-{$type}' role='alert'>".strtoupper($message)."</div>";
    }

    public static function getParagraph($message, $type='info'){
        return "<p class='text-{$type}'>".strtoupper($message)."</p>";
    }

    public static function getBeckGroundParagraph($message, $type='info'){
        return "<p class='bg-{$type}'>".strtoupper($message)."</p>";
    }

    public static function getLabel($message, $type='info'){
        return "<span class='label label-{$type}'>".strtoupper($message)."</span>";
    }
} 