<?php

/**
 * Bootstrap's Alert component
 * 
 * @author      Adnan Zaki
 * @since       Jan-2022
 * @package     Component
 */
class Alert extends \BaseClass
{
    private $alertContent = '';

    private $alertBaseClass = 'alert alert-';

    public function text(string $text, string $tag = '')
    {
        if(! empty($tag)) {
            $this->alertContent .= st()->elem($tag)->content($text, null)->render(true);
        } else {
            $this->alertContent .= $text;
        }

        return $this;
    }

    public function link(string $link, string $label)
    {
        $this->alertContent .= st()->elem('a', [
            'href'  => $link,
            'class' => 'alert-link'
        ])->content($label, null)->render(true);

        return $this;
    }

    public function dismiss(string $color)
    {
        $this->alertBaseClass .= $color . ' alert-dismissible fade show';
        $this->alertContent .= st()->elem('button', [
            'type'              => 'button',
            'class'             => 'btn-close',
            'data-bs-dismiss'   => 'alert',
            'aria-label'        => 'Close'
        ])->render(true);

        return $this;
    }

    public function render(string $color = '')
    {
        $this->alertBaseClass .= $color;

        st()->elem('div', [
            'class' => $this->alertBaseClass . $this->additionalClass,
            'role'  => 'alert'
        ])->content($this->alertContent, null)->render();

        // reset to default
        $this->alertContent = '';
        $this->alertBaseClass = 'alert alert-';

    }
}

if(! function_exists('alert')) {
    function alert()
    {
        return new Alert();
    }
}