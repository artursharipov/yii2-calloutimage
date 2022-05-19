<?php

\common\modules\calloutImage\models\CalloutAdminAsset::register($this);

?>

<div class="callout-map" style="width: <?=$width?>px" data-hash="<?=$hash?>" data-id="<?=$id?>">

    <img class="callout-img" src="<?=$src?>">

    <svg class="callout-svg" viewBox="<?=$viewbox?>">

        <?php //foreach($circles as $circle):?>

        <!-- <circle 
            cx="<?//= $circle->cx ?>"
            cy="<?//= $circle->cy ?>"
            data-id="<?//= $circle->id ?>"
            class="svg-circle"
            data-title="<?//= $circle->word->translate_r ?>"
        ></circle> -->

        <?php //endforeach ?>

    </svg>
    
</div>

<!--MODAL--->
<div id="modal-callout" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <div class="modal-body">

                

            </div>

        </div>
    </div>
</div>