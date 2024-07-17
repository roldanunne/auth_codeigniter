<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<div class="columns is-mobile is-centered">
    <div class="column is-narrow">
        <form class="box" action="<?= url_to('login') ?>" method="post">

            <h3 class="has-text-centered">Login Form</h3>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="text" name="email" placeholder="Email"
                        value="<?= old('email') ?>">
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="Password"
                        value="<?= old('password') ?>">
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Sign in</button>
                </div>
            </div>

            <?php if(session()->getFlashdata('msg')):?>
            <div class="notification is-danger">
                <?= session()->getFlashdata('msg') ?>
            </div>
            <?php endif;?>

        </form>

    </div>
</div>

<?= $this->endSection() ?>
