<?php

namespace RavenDB\Demo\common;

use RavenDB\Documents\DocumentStore;
use RavenDB\Extensions\JsonExtensions;

class DocumentStoreHolder
{
    public static ?DocumentStore $store = null;

    public static ?DocumentStore $mediaStore = null;

    public static function getStore(): DocumentStore
    {
        if (self::$store == null) {
            // replace params below with whatever you run with...
            self::$store = new DocumentStore("http://localhost:8080", "q1");

            // Since we target the Sample Data,
            // must use the below to convert between the camelCase Java classes props and the PascalCase json documents.
//            self::$store->getConventions()->getEntityMapper()->setPropertyNamingStrategy(new JsonExtensions::DotNetNamingStrategy());

            self::$store->initialize();
        }

        return self::$store;
    }

    public static function getMediaStore(): DocumentStore
    {
        if (self::$mediaStore == null) {
            self::$mediaStore = new DocumentStore("http://localhost:8080", "Media-c6c67f10-bfd8-4575-bac2-9d7f056f0161");
//            self::$mediaStore->getConventions()->getEntityMapper()->setPropertyNamingStrategy(new JsonExtensions::DotNetNamingStrategy());
            self::$mediaStore->initialize();
        }

        return self::$mediaStore;
    }
}
