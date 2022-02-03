<?php

/**
 * SimpleTag is a HTML generator for those who really love PHP!
 * It can be written with simple and structured API  
 * 
 * @author      Adnan Zaki
 * @package     Library
 * @license     MIT
 * @copyright   Woles DevTeam (c) 2021
 * @version     0.2.3
 */

class SimpleTag
{
    /**
     * @var string
     */
    private $rawTag = '';

    /**
     * @var string
     */
    private $openTag = '';

    /**
     * @var string
     */
    private $closeTag = '';

    /**
     * @var string
     */
    private $content = null;

    /**
     * The HTML Renderer
     * 
     * @return void
     */
    public function render()
    {
        $this->close();
        $html = $this->openTag . $this->content . $this->closeTag . "\n";

        echo $html;
    }

    /**
     * HTML Element generator
     * 
     * @param string|array $tag
     * @param array $attributes
     * 
     * @return SimpleTag
     */
    public function elem($tag, array $attributes = [])
    {
        $this->openTag = '';
        $this->content = '';
        $this->closeTag = '';
        
        $element = $this->createOpenTag($tag, $attributes);
        $this->openTag = $element[0];
        $this->rawTag = $element[1];

        return $this;
    }    

    /**
     * Set content of outer HTML
     * 
     * @param string $inner
     * @param string|array $outer
     * @param array $style
     * 
     * @return SimpleTag
     */
    public function content(string $inner, $outer = 'div', array $style = [])
    {   
        $result = '';
        if($outer !== null)
        {
            if(is_array($outer))
            {   
                $tags = array_keys($outer);
                $openTag = $this->createOpenTag($outer);
                $closeTagWrapper = [];
                foreach($tags as $tag)
                {
                    $closeTagWrapper[] = "</$tag>";
                }
    
                $closeTag = implode('', array_reverse($closeTagWrapper));
                $result = $openTag[0] . $inner . $closeTag;
            }
            else
            {
                if(strpos($outer, '>') === false)
                {
                    $styleStr = $this->createStyle($outer, $style);
                    $result = '<'.$outer. ' ' .$styleStr.'>'. $inner .'</'.$outer.'>';
                }
                else
                {
                    $removeSpace = str_replace(' ', '', $outer);
                    $elems = explode('>', $removeSpace);
                    $outerOpen = '';
                    $outerClose = '';
                    $outerCloseWrapper = [];
                    foreach($elems as $val)
                    {
                        $styleStr = $this->createStyle($val, $style);
                        $outerOpen .= '<' . $val . $styleStr . '>';
                        $outerCloseWrapper[] = '</' . $val . '>';
                    }
        
                    $outerClose = implode('', array_reverse($outerCloseWrapper));
        
                    $result = $outerOpen . $inner . $outerClose . "\n";            
                }
            }        
        }
        else
        {
            $result = $inner;
        }

        $this->content .= $result;

        return $this;
    }

    /**
     * Create closing tag of element </>
     * 
     * @return void
     */
    private function close()
    {
        $wrapper = [];

        foreach($this->rawTag as $val)
        {
            $pos = strpos($val, '-');
            if($pos !== false) {
                $val = substr($val, 0, $pos);
            }
            if($val !== 'input') {
                $wrapper[] = "</$val>";
            }
        }

        $this->closeTag = implode('', array_reverse($wrapper));
    }    

    private function createOpenTag($tag, array $attributes = [])
    {
        $result = '';
        if(is_array($tag))
        {
            $rawTag = array_keys($tag);

            // loop the tags
            foreach($tag as $k => $v) 
            {
                $pos = strpos($k, '-');
                if($pos !== false) {
                    $k = substr($k, 0, $pos);
                }

                $attr = '';
                $attr = $this->createAttribute($v);
                $result .= "<{$k}{$attr}>";
            }
        }
        else
        {
            $attr = $this->createAttribute($attributes);      
            $result = "<{$tag}{$attr}>";
            $rawTag = [$tag];
        }

        return [
            $result, $rawTag
        ];
    }

    /**
     * Create element attributes
     * 
     * @param array $attributes
     * 
     * @return string
     */
    private function createAttribute($attributes)
    {
        $attr = '';
        if(count($attributes) > 0)
        {
            foreach($attributes as $key => $val)
            {
                if($key !== 'style')
                {
                    // create attribute like class="center"
                    $attr .= ' ' . $key . '="' . $val .'"';
                }
                else
                {
                    // create inline style like style="color: yellow;"
                    $styleStr = ' style="';
                    $closeStyle = '';
                    $i = 1;
                    foreach($attributes[$key] as $style => $value)
                    {                            
                        if($i === count($attributes[$key]))
                        {
                            $closeStyle = '"';
                        }
                        $styleStr .= $style .': ' . $value .  ';' . $closeStyle;
                        $i++;
                    }

                    $attr .= $styleStr;
                }
            }
        }

        return $attr;
    }

    /**
     * Create inline style of element
     * 
     * @param string $outer
     * @param array $style
     * 
     * @return string
     */
    private function createStyle($outer, $style)    
    {
        $styleStr = '';
        if(isset($style[$outer]))
        {
            $styleStr = 'style="';
            $closeStyle = '';
            $i = 1;
            foreach($style[$outer] as $k => $v)
            {                            
                if($i === count($style[$outer]))
                {
                    $closeStyle = '"';
                }
                $styleStr .= ' ' . $k .': ' . $v .  ';' . $closeStyle;
                $i++;
            }

            return $styleStr;
        }
    }
}   