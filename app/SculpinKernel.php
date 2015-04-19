<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 18/4/15
 * Time: 17:19
 */

class SculpinKernel extends \Sculpin\Bundle\SculpinBundle\HttpKernel\AbstractKernel
{
    protected function getAdditionalSculpinBundles()
    {
        return array(
            'Beryllium\Icelus\IcelusBundle',
        );
    }
} 