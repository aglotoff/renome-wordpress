// Library imports
import focusTrap from 'focus-trap';
import jQuery from 'jquery';
import svg4everybody from 'svg4everybody';

// Import jQuery plugins
import 'slick-carousel';

// Initialize libraries
svg4everybody();

// Make libraries globally available
window.focusTrap = focusTrap;
window.jQuery = window.$ = jQuery;
