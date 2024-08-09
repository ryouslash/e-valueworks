import $ from 'jquery';

import { config, dom, library } from '@fortawesome/fontawesome-svg-core';
import {faPenNib, faCode, faServer,faChevronDown, faLink} from '@fortawesome/free-solid-svg-icons';
import { faEnvelope, faHandshake } from '@fortawesome/free-regular-svg-icons';
import {faInstagram, faFacebook, faGithub, faLinkedin} from '@fortawesome/free-brands-svg-icons';


library.add(faEnvelope, faHandshake, faPenNib, faCode, faServer,faChevronDown, faLink,faInstagram, faFacebook, faGithub, faLinkedin);

dom.i2svg();
