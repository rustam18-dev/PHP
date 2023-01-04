<?php
namespace helperDate;

/**
 * Фукция возвращет текущее значение года в полном формате
 * @return значение текущего года в формате string
 */
function getYear() : string{
    return date('Y');
}

/**
 * Функция возвращает дату разницу между текущим днем и количество указанных дней
 * @param количество дней
 * @param формат даты принимает или long или short
 * @return значение текущего года в формате string
 */

function getDateAgo (int $day, string $format = SITE_DATE_FORMAT_SHORT) : string{
   switch ($format){
       case 'long':
           $returnFormat = SITE_DATE_FORMAT_LONG;
           break;
       case 'short':
       default:
           $returnFormat = SITE_DATE_FORMAT_SHORT;
           break;
   }
    return date($returnFormat,time()-$day*86400);
}
?>