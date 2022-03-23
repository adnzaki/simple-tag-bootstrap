<?php

/**
 * This class contains commonly-used features on HTML element,
 * such as slot, custom class, create element ID and store event handler.
 * By extending this class, it allows all Bootstrap components to have
 * their common functionalities without writing the codes repeatedly
 */
class BaseClass
{
    /**
     * @var string|array
     */
    protected $slots = null;

    /**
     * @var string
     */
    protected $additionalClass = '';

    /**
     * @var string
     */
    protected $elemId = '';

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var boolean
     * 
     * If set to TRUE, SimpleTag render() function
     * will return HTML string, otherwise, it 
     * will print the output directly to the browser
     */
    protected $sendAsValue = false;

    /**
     * @var string
     */
    protected $positionClass = '';

    /**
     * @var string
     */
    protected $positionType = 'position-absolute';

    /**
     * Set position of an element.
     * See https://getbootstrap.com/docs/5.1/utilities/position/ for detail explanation.
     * 
     * @param string $positionStart
     * @param string $positionEnd
     * @param string $translate
     * 
     * @return this
     */
    public function position(string $positionStart, string $positionEnd, string $translate = '')
    {
        $classArray = [
            $this->positionType,
            $positionStart,
            $positionEnd,
            ! empty($translate) ? 'translate-' . $translate : ''
        ];

        $this->positionClass = ' ' . implode(' ', $classArray);

        return $this;
    }

    /**
     * Set position values: static, relative, absolute, fixed, sticky
     * 
     * @param string $value
     * 
     * @return this
     */
    public function positionType(string $value)
    {
        $acceptedValues = ['static', 'relative', 'absolute', 'fixed', 'sticky'];
        if(array_search($value, $acceptedValues)) {
            $this->positionType = 'position-' . $value;
            
            return $this;
        }
    }

    /**
     * Prevent SimpleTag render() function to send
     * the output to the browser directly
     * 
     * @return this
     */
    public function preventBrowserOutput()
    {
        $this->sendAsValue = true;

        return $this;
    }

    /**
     * Add slot to SimpleTag::content()
     * Note: 
     * Not all components support slot(), see the API Docs
     * for each component to know them.
     * 
     * @param string|array $slots
     * 
     * @return this
     */
    public function slot(string|array $slots)
    {
        $this->slots = $slots;

        return $this;
    }

    /**
     * Add custom class to element
     * 
     * @param string|array $class
     * 
     * @return this
     */
    public function addClass(string|array $class)
    { 
        is_array($class)
            ? $this->additionalClass = ' ' . implode(' ', $class)
            : $this->additionalClass = " $class";

        return  $this;
    }

    /**
     * Create ID for an element
     * 
     * @param string $id
     * 
     * @return this
     */
    public function id(string $id)
    {
        return $this->attr(['id' => $id]);
    }
    
    /**
     * Store element attributes
     * 
     * @param array $attributes
     * 
     * @return this
     */
    public function attr(array $attributes = [])
    {
        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }
}