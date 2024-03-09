<?php

namespace Hamzahassanm\NamecheapApi\Enums;

enum APIUri: string {

    case SAND_BOX = 'https://api.sandbox.namecheap.com/xml.response';
    case PRODUCTION = 'https://api.namecheap.com/xml.response';

}
