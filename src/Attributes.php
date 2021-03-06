<?php
namespace Elements;

class Attributes implements \ArrayAccess {
	private $attributes;

	public function __construct($attributes = array()) {
		$this->setAttributes($attributes);
	}

	/**
	 * Initializes the internal attribute-array.
	 * Can be used to clear all attributes.
	 */
	public function initializeAttributes() : void {
		$this->attributes = array();
		$this->attributes['class'] = new Classes();
		$this->attributes['style'] = new Styles();
	}

	public function setAttribute($attribute, $value) : void {
		switch ($attribute):
			case 'class':
				$this->attributes['class']->setClasses($value);
			break;
			case 'style':
				$this->attributes['style']->setStyles($value);
			break;
			default:
				$this->attributes[$attribute] = $value;
			break;
		endswitch;
	}

	public function setAttributes(array $attributes) : void {
		$this->initializeAttributes();

		foreach($attributes as $attribute => $value) {
			$this->setAttribute($attribute, $value);
		}
	}

	public function getAttributes() : array {
		return $this->attributes;
	}

	public function __toString() {
		$string = '';

		foreach ($this->attributes as $attribute => $value) {
			if (!empty((string) $value)) {
				$string .= ' ' . $attribute . '="';

				if (is_array($value)) {
					$string .= implode(' ', $value);
				} else {
					$string .= $value;
				}

				$string .= '"';
			}
		}

		return $string;
	}

	/* ArrayAccess Methods */
	public function offsetExists($name) : bool {
		return isset($this->attributes[$name]);
	}

	public function offsetUnset($name) : void {
		unset($this->attributes[$name]);
	}

	public function &offsetGet($name) {
		return $this->attributes[$name];
	}

	public function offsetSet($attribute, $value) : void {
		$this->setAttribute($attribute, $value);
	}
}
