<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = 'Create Contact';
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-create">
    <div class="main-content">
        <h3 class="thumb-caption">Contact us</h3>

        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

            <div class="alert alert-success">
                Thank you for contacting us. We will respond to you as soon as possible.
            </div>


            <!--<p>
                Note that if you turn on the Yii debugger, you should be able
                to view the mail message on the mail panel of the debugger.
                <?php /*if (Yii::$app->mailer->useFileTransport): */?>
                    Because the application is in development mode, the email is not sent but saved as
                    a file under <code><?/*= Yii::getAlias(Yii::$app->mailer->fileTransportPath) */?></code>.
                                                                                                        Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                    application component to be false to enable email sending.
                <?php /*endif; */?>
            </p>-->

        <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

            <table class="address" border="1">
                <tr>
                    <td>Address</td>
                    <td><?php if($infoCompany->address) echo $infoCompany->address ?></td>
                </tr>
                <tr>
                    <td>Tel</td>
                    <td><?php if($infoCompany->tel) echo $infoCompany->tel ?></td>
                </tr>
                <tr>
                    <td>Fax</td>
                    <td><?php if($infoCompany->fax) echo $infoCompany->fax ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php if($infoCompany->email) echo $infoCompany->email ?></td>
                </tr>
            </table>

            <h3>Our Head Office's Map</h3>

            <?php if($infoCompany->map) echo $infoCompany->map ?>

            <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

        <?php endif; ?>
    </div>
</div>
