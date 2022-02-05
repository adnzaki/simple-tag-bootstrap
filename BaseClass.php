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
    protected $events = [];

    /**
     * @var boolean
     * 
     * If set to TRUE, SimpleTag render() function
     * will return HTML string, otherwise, it 
     * will print the output directly to the browser
     */
    protected $sendAsValue = false;

    /**
     * Prevent SimpleTag render() function to send
     * the output to the browser directly
     * 
     * @return \BaseClass
     */
    public function preventBrowserOutput()
    {
        $this->sendAsValue = true;

        return $this;
    }

    /**
     * Add slot to SimpleTag::content()
     * 
     * @param string|array $slots
     * 
     * @return \BaseClass
     */
    public function slot(string|array $slots)
    {
        $this->slots = $slots;

        return $this;
    }

    /**
     * Add custom class to element
     * 
     * @param string $class
     * 
     * @return \BaseClass
     */
    public function addClass(string $class)
    { 
        $this->additionalClass = " $class";

        return  $this;
    }

    /**
     * Create ID for an element
     * 
     * @param string $id
     * 
     * @return \BaseClass
     */
    public function id(string $id)
    {
        $this->elemId = $id;

        return $this;
    }
    
    /**
     * Store event handler
     * 
     * @param array $events
     * 
     * @return \BaseClass
     */
    public function event(array $events = [])
    {
        $this->events = $events;

        return $this;
    }
}