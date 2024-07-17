<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<div class="columns is-mobile is-centered">
    <div class="column is-narrow">
        <form class="box" action="<?= url_to('search') ?>" method="post">

            <h3 class="has-text-centered">Search images</h3>

            <div class="field has-addons">
                <div class="control">
                    <input class="input" type="text" name="search" placeholder="">
                </div>
                <div class="control">
                    <button class="button is-info">
                    Search
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
    
    <?php
        $data = session()->get('result')? session()->get('result') : '';
        $n=0;
        if($data!='') {
       
            $row = json_decode($data);
            foreach ($row->hits as $item) {
                if($n==0) {
                    echo '<div class="columns">';
                }
    ?>
        <div class="column" >
            <figure class="image is-128x128">
                <img class="mt-2" src="<?=$item->previewURL ?>" />
            </figure>
        </div>
    <?php 
            if($n==8) {
                echo '</div>';
                $n=0;
            } else {
                $n++;
            }
        } 
}
    ?>

<?= $this->endSection() ?>
