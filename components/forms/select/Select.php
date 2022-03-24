<?php

class Select extends \BaseClass
{
    private $defaultClass = 'form-select';

    private $size = '';

    private $selectTitle = '';

    public function size(string $size)
    {
        $this->size = "form-select-$size";
        $this->defaultClass .= " $this->size";

        return $this;
    }

    public function disable()
    {
        return $this->attr(['disabled']);
    }

    public function aria(string $text)
    {
        return $this->attr(['aria-label' => $text]);
    }

    public function multiple()
    {
        return $this->attr(['multiple']);
    }

    public function setMultipleSize(int $size)
    {
        return $this->attr(['size' => $size]);
    }

    public function title(string $label, bool $isSelected = true)
    {
        $selected = $isSelected ? ['selected'] : [];

        $this->selectTitle = [
            'label' => $label,
            'attr'  => $selected
        ];    

        return $this;
    }    

    /**
     * The select renderer
     * 
     * @param array $options
     * @param boolean $raw
     * 
     * @return string|void
     */
    public function render(array $options, bool $raw = false)
    {
        $attrs = array_merge(
            ['class' => $this->defaultClass . $this->additionalClass],
            $this->attributes
        );

        $select = st()->elem('select', $attrs);
        
        if($this->selectTitle !== '') {
            $select->content($this->selectTitle['label'], [
                'option' => $this->selectTitle['attr']
            ]);
        }
        
        foreach($options as $opt) {
            $select->content($opt['label'], [
                'option' => ['value' => $opt['value']]
            ]);
        }

        return $select->render($raw);
    }
}

if(! function_exists('select')) {
    function select()
    {
        return new Select;
    }
}