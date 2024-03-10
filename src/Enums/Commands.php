<?php

namespace Hamzahassanm\NamecheapApi\Enums;

enum Commands: string {

    case  RENEW_DOMAIN = 'namecheap.domains.renew';
    case GET_REGISTRAR_LOCK = 'namecheap.domains.getRegistrarLock';
    case SET_REGISTRAR_LOCK = 'namecheap.domains.setRegistrarLock';
    case REACTIVE_DOMAIN = 'namecheap.domains.reactivate';
    case SET_DOMAIN_CONTACTS = 'namecheap.domains.setContacts';
    case GET_DOMAIN_CONTACTS = 'namecheap.domains.getContacts';
    case  GET_TLD_LIST = 'namecheap.domains.gettldlist';

    case CHECK_DOMAIN = 'namecheap.domains.check';
    case GET_DOMAINS_LIST = 'namecheap.domains.getList';
    case GET_DOMAIN_PRICES = 'namecheap.users.getPricing';

    case GET_DOMAINS_INFO = 'namecheap.domains.getinfo';
}
