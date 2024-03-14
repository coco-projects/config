<?php

    namespace Coco\config;

    use ArrayAccess;

class Config implements ArrayAccess
{

    protected array $data = [];

    public function __construct(array $array)
    {
        $this->initData($array);
    }

    protected function initData(array $array): static
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->data[$key] = new static($value);
            } else {
                $this->data[$key] = $value;
            }
        }

        return $this;
    }

    public function get(string $name, $default = null)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        return $default;
    }


    public function __get($name)
    {
        return $this->get($name);
    }


    public function __set($name, $value)
    {
        if (is_array($value)) {
            $value = new static($value, true);
        }

        if (null === $name) {
            $this->data[] = $value;
        } else {
            $this->data[$name] = $value;
        }
    }


    public function __clone()
    {
        $array = [];

        foreach ($this->data as $key => $value) {
            if ($value instanceof self) {
                $array[$key] = clone $value;
            } else {
                $array[$key] = $value;
            }
        }

        $this->data = $array;
    }


    public function toArray(): array
    {
        $array = [];
        $data  = $this->data;

        foreach ($data as $key => $value) {
            if ($value instanceof self) {
                $array[$key] = $value->toArray();
            } else {
                $array[$key] = $value;
            }
        }

        return $array;
    }


    public function __isset($name)
    {
        return isset($this->data[$name]);
    }


    public function __unset($name)
    {
        unset($this->data[$name]);
    }


    public function offsetExists($offset): bool
    {
        return $this->__isset($offset);
    }


    public function offsetGet($offset): mixed
    {
        return $this->__get($offset);
    }


    public function offsetSet($offset, $value): void
    {
        $this->__set($offset, $value);
    }


    public function offsetUnset($offset): void
    {
        $this->__unset($offset);
    }


    public function merge(array $mergeArray): static
    {
        $newData    = Utils::arrayMerge($this->toArray(), $mergeArray);
        $this->data = [];
        $this->initData($newData);

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
