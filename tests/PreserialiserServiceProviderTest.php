<?php

/*
 * This file is part of the PreserialiserServiceProvider library.
 *
 * Copyright (c) Cam Morrow
 *
 * Please view the LICENSE file that was distributed with this source code For the full copyright and license information.
 */

use Silex\Application;
use Silex\WebTestCase;

use PorkChopSandwiches\PreserialiserServiceProvider\PreserialiserServiceProvider;
use PorkChopSandwiches\Preserialiser\Preserialiser;

class PreserialiserServiceProviderTest extends WebTestCase {

    use Application\TwigTrait;

    /**
     * @return Preserialiser
     */
    private function getPreserialiser () {
        return $this -> app["preserialiser"];
    }

    /**
     * return Application
     */
    private function getApp () {
        return $this -> app;
    }

    public function createApplication() {
        $app = new Application();
        $app -> register(new PreserialiserServiceProvider(), array(
            "preserialiser.default_args"    => array(
                "default_arg_key"   => "default_arg_value"
            )
        ));
        $app["debug"] = true;
        $app["exception_handler"] -> disable();
        return $app;
    }

    /**
     *
     */
    public function testExists () {
        $p = $this -> getPreserialiser();
        $this -> assertTrue($p instanceof Preserialiser);
    }

    /**
     * @depends testExists
     */
    public function testDefaultArgs () {
        $this -> getApp() -> boot();
        $p = $this -> getPreserialiser();
        $args = $p -> getDefaultArgs();
        $this -> assertEquals("default_arg_value", $args["default_arg_key"]);
    }
}