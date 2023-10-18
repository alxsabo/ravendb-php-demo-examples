<?php

namespace RavenDB\Demo\multiMapIndex\multiMapIndexCustomizedFields;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;

class MultiMapIndexCustomizedFields
{
    public function __invoke(RunParams $runParams): array
    {
        $namePrefix = $runParams->getNamePrefix() ?? "Michael";
        $titlePrefix = $runParams->getTitlePrefix() ?? "Sales";

        //region Demo
        //region Step_6
        $contacts = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            $contacts = $session->query(IndexEntry::class, Contacts_ByNameAndTitle::class)
                ->whereStartsWith("ContactName", $namePrefix)
                ->whereStartsWith("ContactTitle", $titlePrefix)
                ->selectFields(ProjectedEntry::class)
                ->toList();
        } finally {
            $session->close();
        }
        //endregion
        //endregion
        
        return $contacts;
    }
}