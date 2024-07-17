<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simple Signup with PixaBay API</title>
    <meta charset="UTF-8">
    <meta name="description" content="PHP Developer Applicant - Roldan Unne Torralba">
    <meta name="author" content="Roldan Unne Torralba">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link href="/css/app.css" rel="stylesheet">
    <?= $this->renderSection('head') ?>
</head>

<body>

    <section class="section">
        <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://codeigniter.com">
                    <img src="/img/ci4.png">
                </a>
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarBasic">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasic" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="<?= base_url() ?>">
                        Home
                    </a>

                    <?php if (session()->get('isLoggedIn')): ?>
                    <a class="navbar-item" href="/profile">
                        Profile
                    </a>
                    <a class="navbar-item" href="/search">
                        Search
                    </a>
                    <?php endif ?>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <?php if (session()->get('isLoggedIn')): ?>
                                <a class="mr-4 button is-light" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                            
                                <?php if (session()->get('profile')): ?>
                                    <figure class="image is-32x32">
                                        <img class="is-rounded" src="<?php echo base_url('/img/').session()->get('profile');?>" />
                                    </figure>
                                <?php endif ?>

                                <form id="logout-form" action="/logout" method="POST">
                                </form>
                            <?php else : ?>
                                <a class="button is-primary" href="/register">
                                    <strong>Sign up</strong>
                                </a>
                                <a class="button is-light" href="/login">
                                    Sign in
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="/js/app.js"></script>
    <?= $this->renderSection('javascript') ?>

</body>

</html>
