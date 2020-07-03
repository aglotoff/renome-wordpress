import focusTrap from 'focus-trap';
import jQuery from 'jquery';
import svg4everybody from 'svg4everybody';

import * as Header from '../blocks/common/header';

svg4everybody();

window.focusTrap = focusTrap;
window.jQuery = window.$ = jQuery;

Header.init();
