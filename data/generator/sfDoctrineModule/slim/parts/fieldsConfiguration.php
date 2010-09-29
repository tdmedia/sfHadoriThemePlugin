  public function getListParams()
  {
    return <?php echo $this->asPhp(isset($this->config['list']['params']) ? $this->config['list']['params'] : '%%'.implode('%% - %%', isset($this->config['list']['display']) ? $this->config['list']['display'] : $this->getAllFieldNames(false)).'%%') ?>;
<?php unset($this->config['list']['params']) ?>
  }

  public function getListLayout()
  {
    return '<?php echo isset($this->config['list']['layout']) ? $this->config['list']['layout'] : 'tabular' ?>';
<?php unset($this->config['list']['layout']) ?>
  }

  public function getListTitle()
  {
    return '<?php echo $this->escapeString(isset($this->config['list']['title']) ? $this->config['list']['title'] : sfInflector::humanize($this->getModuleName()).' List') ?>';
<?php unset($this->config['list']['title']) ?>
  }

  public function getEditTitle()
  {
    return '<?php echo $this->escapeString(isset($this->config['edit']['title']) ? $this->config['edit']['title'] : 'Edit '.sfInflector::humanize($this->getModuleName())) ?>';
<?php unset($this->config['edit']['title']) ?>
  }

  public function getNewTitle()
  {
    return '<?php echo $this->escapeString(isset($this->config['new']['title']) ? $this->config['new']['title'] : 'New '.sfInflector::humanize($this->getModuleName())) ?>';
<?php unset($this->config['new']['title']) ?>
  }

  public function getExportTitle()
  {
    return '<?php echo $this->escapeString(isset($this->config['export']['title']) ? $this->config['export']['title'] : 'Export '.sfInflector::humanize($this->getModuleName())) ?>';
<?php unset($this->config['export']['title']) ?>
  }

  public function getShowTitle()
  {
    return '<?php echo $this->escapeString(isset($this->config['show']['title']) ? $this->config['show']['title'] : sfInflector::humanize($this->getModuleName()).' Summary') ?>';
<?php unset($this->config['show']['title']) ?>
  }

  public function getFilterDisplay()
  {
    return <?php echo $this->asPhp(isset($this->config['filter']['display']) ? $this->config['filter']['display'] : array()) ?>;
<?php unset($this->config['filter']['display']) ?>
  }

  public function getExportFilterDisplay()
  {
    return <?php echo $this->asPhp(isset($this->config['export']['filter']['display']) ? $this->config['export']['filter']['display'] : array()) ?>;
<?php unset($this->config['export']['filter']['display']) ?>
  }

  public function getFormDisplay()
  {
    return <?php echo $this->asPhp(isset($this->config['form']['display']) ? $this->config['form']['display'] : array()) ?>;
<?php unset($this->config['form']['display']) ?>
  }

  public function getEditDisplay()
  {
    return <?php echo $this->asPhp(isset($this->config['edit']['display']) ? $this->config['edit']['display'] : array()) ?>;
<?php unset($this->config['edit']['display']) ?>
  }

  public function getNewDisplay()
  {
    return <?php echo $this->asPhp(isset($this->config['new']['display']) ? $this->config['new']['display'] : array()) ?>;
<?php unset($this->config['new']['display']) ?>
  }
  
  public function getShowDisplay()
  {
    <?php if (isset($this->config['show']['display'])): ?>
    return <?php echo $this->asPhp($this->config['show']['display']) ?>;
<?php elseif (isset($this->config['show']['hide'])): ?>
    return <?php echo $this->asPhp(array_diff($this->getAllFieldNames(false), $this->config['show']['hide'])) ?>;
<?php else: ?>
    return <?php echo $this->asPhp($this->getAllFieldNames(false)) ?>;
<?php endif; ?>
<?php unset($this->config['show']['display'], $this->config['show']['hide']) ?>
  }

  public function getListDisplay()
  {
<?php if ($list_fields = $this->get('list_display')): // use fields in generator.yml ?>
    return <?php echo $this->asPhp($list_fields) ?>;
<?php elseif ($list_hide = $this->get('list_hide')): // hide fields in generator.yml ?>
    return <?php echo $this->asPhp(array_diff($this->getAllFieldNames(false), $list_hide)) ?>;
<?php else:                                          // show first 5 fields ?>
    return <?php echo $this->asPhp(array_slice($this->getAllFieldNames(false), 0, 5)) ?>;
<?php endif; ?>
<?php unset($this->config['list']['display'], $this->config['list']['hide']) ?>
  }
  
  public function getExportDisplay()
  {
<?php if (isset($this->config['export']['display'])): ?>
    return <?php echo $this->asPhp($this->config['export']['display']) ?>;
<?php elseif (isset($this->config['export']['hide'])): ?>
    return <?php echo $this->asPhp(array_diff($this->getAllFieldNames(false), $this->config['export']['hide'])) ?>;
<?php else: ?>
    return <?php echo $this->asPhp($this->getAllFieldNames(false)) ?>;
<?php endif; ?>
<?php unset($this->config['export']['display'], $this->config['export']['hide']) ?>
  }

  public function getFieldsDefault()
  {
    return array(
<?php foreach ($this->getDefaultFieldsConfiguration() as $name => $params): ?>
      '<?php echo $name ?>' => <?php echo $this->asPhp($params) ?>,
<?php endforeach; ?>
    );
  }

<?php foreach (array('list', 'filter', 'form', 'edit', 'new', 'export', 'show') as $context): ?>
  public function getFields<?php echo ucfirst($context) ?>()
  {
    return array(
<?php foreach ($this->getFieldsConfiguration($context) as $name => $params): ?>
      '<?php echo $name ?>' => <?php echo $this->asPhp($params) ?>,
<?php endforeach; ?>
    );
  }

<?php endforeach; ?>
