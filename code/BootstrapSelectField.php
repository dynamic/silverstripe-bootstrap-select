<?php

namespace Dynamic\BootstrapSelect\Field;

use DropdownField;
use Convert;
use Requirements;


/**
 * Class BootstrapDropdownField
 * @package Dynamic\BootstrapSelect\Field
 */
class BootstrapDropdownField extends DropdownField
{

    /**
     * @var bool
     */
    private static $require_css = true;
    /**
     * @var bool
     */
    private static $require_js = true;

    /**
     * @var array
     */
    protected $bootstrap_select_config = array();

    /**
     * @param array $properties
     * @return \HTMLText
     */
    public function Field($properties = array())
    {
        $this->addExtraClass('bootstrap-select-field')
            ->setAttribute('data-bootstrapselectconfig', Convert::array2json($this->bootstrap_select_config));

        //allow for not including default styles
        if ($this->config()->get('require_css') == true) {
            Requirements::css(BOOTSTRAP_DROPDOWN_FIELD_THIRDPARTY . 'bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css');
        }
        if ($this->config()->get('require_js') == true) {
            Requirements::javascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
        }
        Requirements::javascript(BOOTSTRAP_DROPDOWN_FIELD_THIRDPARTY . 'bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js');
        Requirements::javascript(BOOTSTRAP_DROPDOWN_FIELD_JAVASCRIPT . 'bootstrap.select.field.js');

        return parent::Field($properties);
    }

    /**
     * @param null $key
     * @param null $val
     * @return $this
     */
    public function setBootstrapSelectConfig($key = null, $val = null)
    {
        if ($key === null || $val === null) {
            user_error('Both $key and $val need to have non-null values in setBootstrapSelectConfig()', E_USER_ERROR);
        }
        $this->bootstrap_select_config[$key] = $val;
        return $this;
    }

    /**
     * @return array
     */
    public function getBootstrapSelectConfig()
    {
        return $this->bootstrap_select_config;
    }

}