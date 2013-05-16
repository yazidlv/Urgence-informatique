<?php

// fichier a netoyyer des fonctions inutil pour ma part se qui m'ibnteresse surtout et la fonctioon addOption
/**
 * Objet Representant un select HTML
 */
class SelectHtml {

    private $attributes=array();
	private $options = array();
    private $withNull=true;
    private $nullLib='';

	public function __construct($name=null, $id=null)
	{
	    if ($name) $this->setName($name);
	    if ($id) $this->setId($id);
	}

	public function setAttr($attr, $val)
	{
	    $this->attributes[$attr] = $val;
	    return $this;
	}


	public function setName($name)
	{
	    $this->setAttr('name', $name);
	    return $this;
	}

	public function setId($id)
	{
	    $this->setAttr('id', $id);
	    return $this;
	}

	public function setClass($cssClass)
	{
	    $this->setAttr('class', $cssClass);
	    return $this;
	}

	public function setMultiple($size=null)
	{
	    $this->setAttr('multiple', 'multiple');
	    $this->withNull=false;
	    if ($size) $this->setAttr('size', $size);
	    return $this;
	}

	public function setNullValue($withNull=true, $libelle='')
	{
	    $this->withNull = $withNull;
	    $this->nullLib = $libelle;
	    return $this;
	}


	public function submitOnChange($submit=true)
	{
	    if ($submit) $this->setAttr('onchange', 'this.form.submit();');
	    else $this->setAttr('onchange', null);
	    return $this;
	}

	public function addOption($value, $libelle=null)
	{
	    $option=new SelectOptionHtml($value, $libelle);
	    $this->options[$value]=$option;
	    return $option;
	}

	/**
	 * Ajoute des options dans le select
	 *
	 * @param array $options
	 * @param boolean $withKeysAsValues si true, les clefs de $options sont utilisées comme attribut "value" des options
	 * @param integer $truncate nombre de caracteres max du libele, il sera tronqué au dela.
	 *
	 * @return SelectHtml
	 */
	public function addOptions($options, $withKeysAsValues=false, $truncate=false)
	{
	    if ($options and is_array($options)) foreach ($options as $key=>$val) {

	        if ($truncate) $lib = substr($val,0, $truncate);
	        else $lib=$val;

	        if ($withKeysAsValues) $this->addOption($key, $lib);
	        else $this->addOption($val, $lib);
	    }
	    return $this;
	}



	public function setSelected($optionVal)
	{
	    if ($this->options[$optionVal]) {
	        $option=$this->options[$optionVal];
	        $option->setSelected();
	    }
	    return $this;
	}


	public function setSelectedMultiple($options)
	{
	    if ($options) foreach ($options as $optionVal) {
	        $this->setSelected($optionVal);
	    }
	    return $this;
	}


	public function __toString()
	{
		$string = "<select";
		if ($this->attributes) foreach ($this->attributes as $attr=>$val) {
		    $string .= " $attr=\"{$val}\"";
		}
		$string .= ">";

		if ($this->withNull) $string .= "<option value=\"\">{$this->nullLib}</option>";
		if ($this->options) foreach ($this->options as $option) {
		    $string .= $option;
		}
		$string .= "</select>";
		return $string;
	}

}



class SelectOptionHtml {

    private $value=null;
    private $libelle=null;
    private $cssClass=null;
    private $attributes=array();

	public function __construct($value, $libelle=null)
	{
	    if (!$libelle) $libelle=$value;
	    $this->setValue($value);
	    $this->setLibelle($libelle);
	}


	public function setAttr($attr, $value)
	{
	    $this->attributes[$attr]=$value;
	    return $this;
	}

	public function setClass($cssClass)
	{
	    $this->cssClass=$cssClass;
	    return $this;
	}



	public function setValue($value)
	{
	    $this->value=$value;
	    return $this;
	}


	public function setLibelle($libelle)
	{
	    $this->libelle=$libelle;
	    return $this;
	}

	public function getLibelle()
	{
	    return $this->libelle;
	}


	public function setSelected($selected=true)
	{
	    if ($selected) $this->setAttr('selected', 'selected');
	    else $this->setAttr('selected', null);
	    return $this;
	}


	public function __toString()
	{
	    if (!$this->libelle) $this->libelle=$this->value;

		$string = "<option value=\"".htmlentities($this->value)."\" ";
		if ($this->attributes) foreach ($this->attributes as $attr=>$val) {
		    if ($val) $string .= " $attr=\"{$val}\"";
		}
		if ($this->cssClass) $string .= " class=\"{$this->cssClass}\"";
		$string .= ">".htmlentities($this->libelle)."</option>";
		return $string;
	}

}
