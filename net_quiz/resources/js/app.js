import './bootstrap';
import './ajax_favorite';
import { ajax_favorite} from './ajax_favorite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();
ajax_favorite();
