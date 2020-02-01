<?php


class PromoNotExistException extends Exception
{
    protected $message = "Nie ma ustawionej promocji w wybranym okresie czzasu. Ustaw promocję doymślną";

}