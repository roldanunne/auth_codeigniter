<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<?php
      $n=1;
      foreach ($user as $row) {
?>
<p><?=$row['id']?>-<?=$row['fname']?>-<?=$row['profile']?></p>
<?php
      }
?>

<div class="columns is-mobile is-centered">
    <div class="column is-narrow">
        <form class="box" action="<?= url_to('update-profile') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?= esc(session()->get('id')) ?>">

            <h3 class="has-text-centered">Update User</h3>

            <div class="field">
                <label class="label">First Name</label>
                <div class="control">
                    <input class="input" type="text" name="fname" placeholder="First Name"
                        value="<?= (old('fname'))?old('fname'):esc(session()->get('fname')) ?>"
                        value="<?= esc(session()->get('fname')) ?>"
                        autofocus> 
                </div>
            </div>
            <div class="field">
                <label class="label">Last Name</label>
                <div class="control">
                    <input class="input" type="text" name="lname" placeholder="Last Name"
                        value="<?= (old('lname'))?old('lname'):esc(session()->get('lname')) ?>"
                        autofocus>
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="text" name="email" placeholder="Email"
                        value="<?= (old('email'))?old('email'):esc(session()->get('email')) ?>">
                </div>
            </div>

            <div class="field">
                <label class="label">Profile</label>
                <div class="control">
                    <input class="input" type="file" name="profile" placeholder="Profile">
                </div>
            </div>
            
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Update</button>
                </div>
            </div>

            <?php if(session()->getFlashdata('msg')):?>
            <div class="notification is-danger">
                <?= session()->getFlashdata('msg') ?>
            </div>
            <?php endif;?>

            <?php if(session()->getFlashdata('success')):?>
            <div class="notification is-success">
                <?= session()->getFlashdata('success') ?>
            </div>
            <?php endif;?>
        </form>
 

    </div>
</div>

<div class="columns is-mobile is-centered mt-5">
    <div class="column is-narrow">
        <form class="box" action="<?= url_to('update-password') ?>" method="post">

            <h3 class="has-text-centered">Update Password</h3>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="Password">
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="confirmpassword" placeholder="Confirm Password">
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Update</button>
                </div>
            </div>

            <?php if(session()->getFlashdata('pass')):?>
            <div class="notification is-success">
                <?= session()->getFlashdata('pass') ?>
            </div>
            <?php endif;?>

            <?php if(isset($validation)):?>
            <div class="notification is-danger">
                <?= $validation->listErrors() ?>
            </div>
            <?php endif;?>

        </form>



    </div>
</div>
<?= $this->endSection() ?>
