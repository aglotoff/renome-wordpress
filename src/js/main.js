// Utils Imports
import * as focusUtility from './utils/focus';

// Block imports
import * as Header from '../blocks/layout/header';
import { Slider } from '../blocks/common/slider';
import { SpecialsSlider } from '../blocks/common/specials-slider';

// Initialize utils
focusUtility.init();

// Initialize blocks
Header.init();
Slider.initAll();
SpecialsSlider.initAll();
