<div id="userSetPassword">

    <a id="closeWizard" class="closeSetPassword">
        <img class="svg" src="<?php print_unescaped(OCP\Util::imagePath('core', 'actions/close.svg')); ?>">
    </a>
    <h1><?php p($l->t('Welcome to %s', array($theme->getTitle()))); ?></h1>

    <form id="passwordform" class="section">
        <h2><?php p($l->t('Local My CoRe password'));?></h2>
        <div>
            Bon, là t'es connecté avec Janus, mais pour le client lourd, va falloir un mot de passe "local".
            Viens saisir le mot de passe de ton choix dans la bonne humeur !
        </div>
        <div id="passwordchanged"><?php echo $l->t('Your password was changed');?></div>
        <div id="passworderror" class="msg error" style="max-width:40em;text-align:center;"><?php echo $l->t('Unable to change your password');?></div>
        <input type="password" id="pass1" name="oldpassword"
            placeholder="<?php echo $l->t('Current password');?>"
            autocomplete="off" autocapitalize="off" autocorrect="off" />
        <input type="password" id="pass2" name="personal-password"
            placeholder="<?php echo $l->t('New password');?>"
            data-typetoggle="#personal-show"
            autocomplete="off" autocapitalize="off" autocorrect="off" />
        <input type="checkbox" id="personal-show" name="show" /><label for="personal-show"></label>
        <input id="passwordbutton" type="submit" value="<?php echo $l->t('Change password');?>" />
        <br/>

        <div class="strengthify-wrapper"></div>
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
        <p class="closeSetPassword">Ça m'intéresse pas, tout ça, on passe à la suite.
    </div>

</div>
