<?php
/**
 * T�m� tiedosto asettaa polun osoittamaan PEARin paikalliseen
 * installaatioon siten, ett� PEAR-paketteja voidaan tuoda 
 * skriptiin require ja include komennoilla
 *
 * author: mikko koski
 */

ini_set('include_path', '/usr/lib/php/PEAR' . PATH_SEPARATOR . 
ini_get('include_path'));
?>
