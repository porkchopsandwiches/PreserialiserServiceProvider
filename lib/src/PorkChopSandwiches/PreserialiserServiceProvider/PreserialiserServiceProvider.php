<?php

/*
 * This file is part of the PreserialiserServiceProvider library.
 *
 * Copyright (c) Cam Morrow
 *
 * Please view the LICENSE file that was distributed with this source code For the full copyright and license information.
 */

namespace PorkChopSandwiches\PreserialiserServiceProvider;

use Silex\ServiceProviderInterface;
use Silex\Application;
use PorkChopSandwiches\Preserialiser\Preserialiser;

/**
 * Class PreserialiserServiceProvider
 *
 * @author Cam Morrow
 *
 * @package PorkChopSandwiches\PreserialiserServiceProvider
 */
class PreserialiserServiceProvider implements ServiceProviderInterface {

    const NS = "preserialiser";

    /**
     * @private getSerialiser()
     *
     * @param Application $app
     *
     * @return Preserialiser
     */
    private function getPreserialiser (Application $app) {
        return $app[self::NS];
    }

    /**
     * @public register()
     *
     * @param Application $app
     */
    public function register (Application $app) {
        $app[self::NS] = $app -> share (function () {
            return new Preserialiser();
        });
    }

    /**
     * @public boot()
     *
     * @param Application $app
     */
    public function boot (Application $app) {
        if (isset($app[self::NS . ".default_args"]) && is_array($app[self::NS . ".default_args"])) {
            $this -> getPreserialiser($app) -> setDefaultArgs($app[self::NS . ".default_args"]);
        } else {
        }
    }
}

