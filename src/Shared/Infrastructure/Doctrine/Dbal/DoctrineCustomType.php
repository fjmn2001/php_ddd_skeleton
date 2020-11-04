<?php


namespace Medine\Shared\Infrastructure\Doctrine\Dbal;


interface DoctrineCustomType
{
    public static function customTypeName(): string;
}