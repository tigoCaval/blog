<?php
namespace App\Domain\Formatting;
 
/**
 * Responsible for formatting dates and times BR
 * Formatar datas e horas BR
 */
class DateTimeBr
{
    
    /**
     * Convert date to brazilian format
     * Converter data para formato brasileiro
     * @param mixed $date
     * 
     * @return [type]
     */
    public function convert($date)
    {
       $item = date_create($date);
       return  date_format($item, "d/m/Y H:i:s");
    }


}