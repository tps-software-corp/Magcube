<?php

namespace Plugin\TPS;

use Eccube\Common\EccubeNav;

class Nav implements EccubeNav
{
    /**
     * @return array
     */
    public static function getNav()
    {
        return [
            'TPS' => [
                'name' => 'TPS.menu_title',
                'icon' => 'fa-home',
                'children' => [
                    'product_list' => [
                        'name' => 'TPS.menu_product_list',
                        'url' => 'tps_admin_index',
                    ]
                ]
            ]
        ];
    }
}
