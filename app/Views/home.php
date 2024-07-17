<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<?php if ($authorised): ?>
    <p class="pl-5">Home->Dashboard</p>

<?php endif ?>

<div class="has-text-centered">
    <?php if ($authorised): ?>

    <h3>
        Wellcome <?= esc($fname) ?>
    </h3>

    <?php else : ?>

    <div class="heroe">

    <h1>Welcome to CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h1>

    </div>

    <?php endif ?>

    <h2>The small framework with powerful features</h2>

    <h1>About this page</h1>

    <p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

    <p>If you would like to edit this page you will find it located at:</p>

    <pre><code>app/Views/welcome_message.php</code></pre>

    <p>The corresponding controller for this page can be found at:</p>

    <pre><code>app/Controllers/Home.php</code></pre>



</div>

<?= $this->endSection() ?>