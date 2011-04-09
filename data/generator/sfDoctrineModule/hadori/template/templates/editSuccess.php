<?php echo $this->get('i18n') ? "[?php use_helper('I18n') ?]\n" : ''?><div>
<?php if (sfConfig::get('app_hadori_include_flashes')): ?>
  [?php include_partial('global/flashes') ?]  
<?php endif ?>
  
  <h1><?php echo $this->renderHtmlText($this->get('edit_title')) ?></h1>

  <div class="form-container">
    [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'helper' => $helper)) ?]
  </div>
</div>
