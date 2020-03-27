<html>
<head>
    <meta name="csrf-token" content="<?= $this->request->getParam('_csrfToken') ?>"/>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('fontawesome.min.css') ?>
    <?= $this->Html->css('datatable.css') ?>
    <?=  $this->Html->css('bootstrap.min.css', ['fullBase' => true]);?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->element('header') ?>
<?= $this->fetch('content') ?>
<?= $this->Html->script('jquery.min.js') ?>
<?= $this->Html->script('popper.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('datatable.js') ?>
<?= $this->Html->script('xlsx.js') ?>
</body>
</html>
