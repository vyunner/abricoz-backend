<?php

namespace App\Enums;

enum OrderPaymentStatus: int
{
    case ACTIVE = 0;
    case SUCCESS = 1;
    case FAIL = 2;
}
