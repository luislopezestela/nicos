<?php
class obj{
	public function __construct($value = array(), $is_assoc = true)
	{
		if ($is_assoc && (is_array($value) || is_object($value))) {
			foreach ($value as $i => $v) {
				if (is_array($v)) {
					if ($this->is_assoc($v))
						$this->{$i} = new obj($v);
					else
						$this->{$i} = $this->create_array($v);
				} else if (is_object($v)) {
					$this->{$i} = new obj($v);
				} else if (is_string($v)) {
					$this->{$i} = trim($v);
				} else {
					$this->{$i} = $v;
				}
			}
		}
	}

	private function create_array($value)
	{
		$response = array();
		if (is_array($value)) {
			foreach ($value as $i => $v) {
				if (is_array($v) || is_object($v))
					$response[$i] = new obj($v);
				else
					$response[$i] = $v;
			}
		}
		return $response;
	}


	private function is_assoc($array)
	{
		return array_keys($array) !== range(0, count($array) - 1);
	}

	public function load_data($obj)
	{
		$obj = (is_array($obj)) ? ((object) $obj) : $obj;

		foreach ($obj as $ind => $val) {
			if ($val !== NULL && $val !== '') {
				$this->{'set_' . $ind}($val);
			}
		}
		return $this;
	}

	public function __call($name, $arguments)
	{
		$part = explode('_', $name);

		if (count($part) >= 2 && isset($part[0]) && $part[0] == 'set' && count($arguments) > 0) {
			unset($part[0]);
			$var_name = implode("_", $part);
			return $this->{$var_name} = current($arguments);
		} else if (count($part) >= 2 && isset($part[0]) && $part[0] == 'get') {
			unset($part[0]);
			$var_name = implode("_", $part);
			return isset($this->{$var_name}) ? $this->{$var_name} : null;
		}
		throw new \ErrorException("function " . $name . " not foud.");
	}

	public function __set($name, $value)
	{
		if (is_string($value) || is_numeric($value)) {
			$this->{$name} = trim($value);
		} else if (is_object($value) || is_array($value)) {
			$this->{$name} = $value;
		} else if ($value === null || $value === "") {
			$this->{$name} = null;
		} else {
			$this->{$name} = $value;
		}
	}

	public function __get($name)
	{
		if (isset($this->{$name})) {
			return $this->{$name};
		}
		return $this->{$name} = new obj();
	}

	/**  Desde PHP 5.1.0  */
	public function __isset($name)
	{
		return isset($this->{$name});
	}

	/**  Desde PHP 5.1.0  */
	public function __unset($name)
	{
		unset($this->{$name});
	}
	public function __toString()
	{
		return json_encode($this);
	}
	/** Desde PHP 5.4.0 **/
	public function json($callback = null, $pretty = false)
	{
		if ($callback != null) {
			return ($pretty) ? $callback . '(' . json_encode($this, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . ');' : $callback . '(' . json_encode($this, JSON_UNESCAPED_UNICODE) . ');';
		}
		return ($pretty) ? json_encode($this, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) : json_encode($this, JSON_UNESCAPED_UNICODE);
	}

	public function save_json($file_path)
	{
		if (file_exists($file_path)) {
			$archivo = fopen($file_path, "a");
			fwrite($archivo, $this->json());
			fclose($archivo);
			return true;
		} else {
			if (is_dir(dirname($file_path))) {
				$archivo = fopen($file_path, "w");
				fwrite($archivo, $this->json());
				fclose($archivo);
				return true;
			} else if (!mkdir(dirname($file_path), 0755, true)) {
				//die("El archivo no puede ser creado en esa ubicacion");
				return false;
			} else {
				$archivo = fopen($file_path, "w");
				fwrite($archivo, $this->json());
				fclose($archivo);
				return true;
			}
		}
	}

	function xmlChild(&$xml, $name, $value)
	{
		if (!is_array($value) && !is_object($value)) {
			$xml->addChild($name, $value);
		} else {
			$node = $xml->addChild($name);
			foreach ($value as $i => $v) {
				$this->xmlChild($node, $i, $v);
			}
		}
		return $xml;
	}

	public function xml($root = 'root')
	{
		$xml = new \SimpleXMLElement('<' . $root . '/>');
		foreach ($this as $i => $v) {
			$this->xmlChild($xml, $i, $v);
		}
		return $xml->asXML();
	}
}
