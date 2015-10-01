<div id="userSetPassword">

    <a id="closeWizard" class="closeSetPassword">
        <img class="svg" src="<?php print_unescaped(OCP\Util::imagePath('core', 'actions/close.svg')); ?>">
    </a>
    <h1><?php p($l->t('Welcome to %s', array($theme->getTitle()))); ?></h1>

    <form id="passwordform" class="section">
        <h2><?php p($l->t('Local My CoRe password'));?></h2>
        <div>
            <?php p($l->t("You're presently connected via \"Janus\", if you want to use sync soft or mobile app, please set a password (this password will be exclusively used with My CoRe)."));?>
        </div>
        <input type="password" id="pass1" name="personal-password"
            placeholder="<?php p($l->t('New password'));?>"
            data-typetoggle="#personal-show"
            autocomplete="off" autocapitalize="off" autocorrect="off" />
        <input type="checkbox" id="personal-show" name="show" /><label for="personal-show"></label>
        <input type="password" id="pass2" name="personal-password-confirm"
            placeholder="<?php p($l->t('Confirm password'));?>"
            data-typetoggle="#personal-confirm-show"
            autocomplete="off" autocapitalize="off" autocorrect="off" />
        <input type="checkbox" id="personal-confirm-show" name="show" /><label for="personal-confirm-show"></label>
        <input id="passwordbutton" type="submit" value="<?php echo $l->t('Change password');?>" />
        <br/>

        <div class="strengthify-wrapper"></div>
        <div id="passwordchanged"><?php echo $l->t('Your password was changed');?></div>
        <div id="passworderror" class="msg error" style="max-width:40em;text-align:center;line-height: "><?php echo $l->t('Unable to change your password');?></div>
    </form>

    <form id="password_policy" class="section">
        <h2><a name="ppe"></a><?php p($l->t('Local My CoRe password Policy Enforcement')); ?></h2>
        <p><?php p($l->t('The following password restrictions are currently in place:')); ?></p>
        <p><?php p($l->t('All passwords are required to be at least %d characters in length and;', $_['minlength'])); ?></p>
        <ul style="list-style: circle; margin-left: 20px;">
            <?php if($_['mixedCase']) { ?>
            <li> <?php p($l->t('Must contain UPPER and lower case characters')); ?></li>
            <?php } ?>
            <?php if($_['numbers']) { ?>
            <li> <?php p($l->t('Must contain numbers')); ?></li>
            <?php } ?>

            <?php if($_['specialChars']) { ?>
            <li> <?php p($l->t('Must contain special characters: %s', $_['specialcharlist'])); ?></li>
            <?php }?>

        </ul>
    </form>

    <div class="section">
        <button class="closeSetPassword"><?php p($l->t('Skip this step, I will set this local My CoRe password later.')); ?></button>
    </div>

</div>
