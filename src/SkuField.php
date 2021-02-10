<?php

namespace JadeKun\Sku;

use Encore\Admin\Form\Field;

class SkuField extends Field
{
    protected $view = 'sku::sku_field';

    protected static $js = [
        'vendor/jadekun/sku/sku.js'
    ];

    protected static $css = [
        'vendor/jadekun/sku/sku.css'
    ];

    protected $url;
    protected $cn;

    public function options($options = [])
    {
        if (isset($options['url'])) {
            $this->url = $options['url'];
        }
        if (isset($options['cn'])) {
            $this->cn = $options['cn'];
        }
        return $this;
    }

    public function render()
    {
        $this->script = <<< EOF
window.DemoSku = new JadeKunSKU('{$this->getElementClassSelector()}','{$this->url}','{$this->cn}');
EOF;
        return parent::render();
    }

}
