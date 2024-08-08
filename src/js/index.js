import $ from 'jquery';

import { config, dom, library } from '@fortawesome/fontawesome-svg-core';
import {faPenNib, faCode, faServer} from '@fortawesome/free-solid-svg-icons';
import {faEnvelope, faHandshake} from '@fortawesome/free-regular-svg-icons';

library.add(faEnvelope, faHandshake, faPenNib, faCode, faServer);

dom.i2svg();
