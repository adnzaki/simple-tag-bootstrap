<?php

/**
 * SimpleTagBootstrap Wrapper
 * ----------------------------------------
 * This file contains everything needed to call any Bootstrap's component
 * Put this file on top of your code before calling component classes
 * 
 * @author      Adnan Zaki
 * @since       Jan-2022
 * @package     Wrapper
 * @copyright   MIT License | See LICENSE file 
 */

require_once 'simple-tag/SimpleTag.php';

// Create a SimpleTag shortcut
function st() {
    return new SimpleTag;
}

// Include helper functions
require_once 'helper.php';

// Include BaseClass.php
require_once 'BaseClass.php';

// Wrap all components
require_once 'components/accordion/Accordion.php';
require_once 'components/button/Button.php';
require_once 'components/icons/Icons.php';