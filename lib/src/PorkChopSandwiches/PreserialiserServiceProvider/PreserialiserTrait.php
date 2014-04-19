<?php

/*
 * This file is part of the PreserialiserServiceProvider library.
 *
 * Copyright (c) Cam Morrow
 *
 * Please view the LICENSE file that was distributed with this source code For the full copyright and license information.
 */

namespace PorkChopSandwiches\PreserialiserServiceProvider;

use PorkChopSandwiches\Preserialiser\Preserialiser;

/**
 * Trait PreserialiserTrait
 * Add this trait to your custom Application class (MyApp extends \Silex\Application) to access these shortcut methods.
 *
 * @author Cam Morrow
 *
 * @package PorkChopSandwiches\PreserialiserServiceProvider
 */
trait PreserialiserTrait {

    /**
     * @return Preserialiser
     */
    public function getPreserialiser () {
        return $this["preserialiser"];
    }

    /**
     * @public preserialise() pre-serialises a value.
     *
     * @param mixed $target  The value to pre-serialise.
     * @param array $args    Optional additional parameters. Merged with (and overrides) any default args.
     *
     * @return mixed
     */
    public function preserialise ($target, array $args = array()) {
        return $this -> getPreserialiser() -> preserialise($target, $args);
    }
}