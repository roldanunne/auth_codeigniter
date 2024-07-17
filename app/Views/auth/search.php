<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<?php
    $type = session()->get('type')? session()->get('type') : '';
?>

<div class="columns is-mobile is-centered">
    <div class="column is-narrow">
        <form class="box" action="<?= url_to('search') ?>" method="post">

            <h3 class="has-text-centered">Search images</h3>
            <div class="control">
                <label class="radio">
                    <input type="radio" name="type" value="images" <?= ($type=='images')?'checked':'' ?> />
                    Images
                </label>
                <label class="radio">
                    <input type="radio" name="type" value="videos" <?= ($type=='videos')?'checked':'' ?> />
                    Videos
                </label>
            </div>
            <div class="field has-addons">
                <div class="control">
                    <input class="input" type="text" name="search" value="<?= old('search') ?>">
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
     
    
        $n=0;
        $data = session()->get('result')? session()->get('result') : '';
        if($data!='') {
            $row = json_decode($data);
            foreach ($row->hits as $item) {
                if($n==0) {
                    echo '<div class="columns">';
                }
                if($type=='images') {
    ?>
                <div class="column" >
                    <figure class="image is-128x128">
                    <a href="<?=$item->largeImageURL ?>" target="_blank"> <img class="mt-2" src="<?=$item->previewURL ?>" /></a>
                    </figure>
                </div>
    <?php 
                } else {
                    $a1 = $item->videos;
                    $a2 = $a1->medium;
                    $a3 = $a2->thumbnail;
    ?>
                <div class="column" >
                    <figure class="image is-128x128">
                    <a href="<?=$a2->url ?>" target="_blank"> <img class="mt-2" src="<?=$a2->thumbnail ?>" /></a>
                    </figure>
                </div>
    <?php 
                }

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
