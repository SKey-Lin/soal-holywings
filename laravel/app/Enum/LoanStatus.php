<?php

namespace App\Enum;

enum LoanStatus:int {
  case BORROWED = 0;
  case RETURNED = 1;
  case LOST = 2;
}