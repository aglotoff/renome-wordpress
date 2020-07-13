// Library imports
import focusTrap from 'focus-trap';
import jQuery from 'jquery';
import svg4everybody from 'svg4everybody';

// Block imports
import * as Header from '../blocks/layout/header';

// Initialize libraries
svg4everybody();

// Make libraries globally available
window.focusTrap = focusTrap;
window.jQuery = window.$ = jQuery;

// Initialize blocks
Header.init();
