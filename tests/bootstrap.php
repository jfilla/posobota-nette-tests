<?php declare(strict_types = 1);

use App\Bootstrap;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Wavevision\NetteTests\Configuration;

require __DIR__ . '/../vendor/autoload.php';
AnnotationRegistry::registerLoader('class_exists');
Configuration::setup([Bootstrap::class, 'boot']);
