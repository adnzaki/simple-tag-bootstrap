<?php

class Select extends \BaseClass
{
    private $defaultClass = 'form-select';

    private $size = '';

    private $disabled = [];

    private $ariaLabel = ['aria-label' => 'Select an option'];

    private $multipleSelect = [];

    private $selectTitle = '';

    private $multipleSize = [];

    public function size(string $size)
    {
        $this->size = "form-select-$size";
        $this->defaultClass .= " $this->size";

        return $this;
    }

    public function disable()
    {
        $this->disabled = ['disabled'];

        return $this;
    }

    public function aria(string $text)
    {
        $this->ariaLabel = ['aria-label' => $text];

        return $this;
    }

    public function multiple()
    {
        $this->multipleSelect = ['multiple'];

        return $this;
    }

    public function setMultipleSize(int $size)
    {
        $this->multipleSize = ['size' => $size];

        return $this;
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
            $this->ariaLabel,
            $this->disabled,
            $this->multipleSelect,
            $this->multipleSize
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