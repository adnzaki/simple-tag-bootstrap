<?php

class FormControl extends \BaseClass
{
    private $label = '';

    private $inputName = '';

    private $inputType = 'text'; // the input type [text, email, password, submit, etc.]

    private $fieldType = 'input'; // <textarea> or <input>

    private $divClass = '';

    private $inputClass = 'form-control';

    private $value = '';

    private $labelClass = 'form-label';

    private $wrapper = null;

    private $datalist = [];

    public function __construct(string $divClass = '')
    {
        $this->divClass = $divClass;
    }

    public function name(string $name)
    {
        $this->inputName = $name;

        return $this;
    }

    public function textarea(int $rows = 3)
    {
        $this->fieldType = 'textarea';

        return $this->attr(['rows' => $rows]);
    }

    public function type(string $type)
    {
        if($this->fieldType !== 'textarea') {
            $this->inputType = $type;

            if($type === 'color') {
                $this->inputClass .= " $this->inputClass-color";
            }
    
            return $this;
        } 
    }

    public function label(string $label, string $class = '')
    {
        $this->label = $label;
        if(! empty($class)) {
            $this->labelClass = $class;
        }

        return $this;
    }

    public function placeholder(string $placeholder)
    {
        return $this->attr(['placeholder' => $placeholder]);
    }

    public function size(string $size)
    {
        $this->inputClass .= " $this->inputClass-$size";

        return $this;
    }

    public function disable()
    {
        return $this->attr(['disabled']);
    }

    public function readonly()
    {
        return $this->attr(['readonly']);
    }

    public function value($value)
    {
        $this->value = htmlspecialchars($value);

        return $this;
    }

    /**
     * Overwrite default "form-control" class
     * 
     * @param string $class
     * 
     * @return \FormControl
     */
    public function setClass(string $class)
    {
        $this->inputClass = $class;

        return $this;
    }

    public function multiple()
    {
        return $this->attr(['multiple']);
    }

    /**
     * This method is intended to be used along with color type input. 
     * But you can still use it everywhere
     * 
     * @param string $title
     * 
     * @return \FormControl
     */
    public function title(string $title)
    {
        return $this->attr(['title' => $title]);
    }

    /**
     * Wrap <input> element within a <div>
     * Though we can pass array as an argument into this method,
     * but in most cases, passing class is more than enough
     * as documented in Bootstrap official docs.
     * 
     * @param string|array $attrs
     * 
     * @return \FormControl
     */
    public function wrap(string|array $attrs)
    {
        $this->wrapper = $attrs;

        return $this;
    }

    public function list(string $listName, array $data)
    {
        $this->attr(['list' => $listName]);

        foreach($data as $val) {
            $this->datalist[] = $val;
        }

        return $this;
    }

    /**
     * The input renderer
     * 
     * @param boolean $raw
     * 
     * @return mixed
     */
    public function render(bool $raw = false)
    {
        $attrs = array_merge(
            $this->fieldType === 'input' ? ['type' => $this->inputType] : [],
            $this->attributes,
            empty($this->elemId) ? [] : ['id' => $this->elemId],
            empty($this->inputName) ? [] : ['name' => $this->inputName],
            empty($this->value) ? [] : ['value' => $this->value],
            ['class' => $this->inputClass . $this->additionalClass]
        );

        if($this->wrapper !== null) {
            gettype($this->wrapper) === 'string'
                ? $wrapperAttrs = ['class' => $this->wrapper]
                : $wrapperAttrs = $this->wrapper;

            $inputResult = array_merge(
                ['div' => $wrapperAttrs], 
                [$this->fieldType => $attrs]
            );
        } else {
            $inputResult = [$this->fieldType => $attrs];
        }

        $elem = st()->elem('div', ['class' => $this->divClass])
                    ->content($this->label, [
                        'label' => [
                            'for'   => $this->elemId,
                            'class' => $this->labelClass . $this->additionalClass
                        ]
                    ])
                    ->content('', $inputResult);
        
        if(count($this->datalist) > 0) {
            $datalistWrapper = st()->elem('datalist', ['id' => $this->attributes['list']]);
            foreach($this->datalist as $val) {
                $datalistWrapper->content('', [
                    'option' => ['value' => $val]
                ]);
            }

            return $elem->content($datalistWrapper->render(true), null)->render($raw);
        } else {
            return $elem->render($raw);
        }
    }
}

if(! function_exists('input')) {
    function input($divClass = '')
    {
        return new FormControl($divClass);
    }
}