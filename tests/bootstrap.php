<?php declare(strict_types = 1);

use AppTests\Bootstrap;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Wavevision\NetteTests\Configuration;

require __DIR__ . '/../vendor/autoload.php';
Configuration::setup([Bootstrap::class, 'boot']);
