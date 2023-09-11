<?php

namespace RavenDB\Demo\basics\theSession;

//region Usings
use RavenDB\Documents\Session\DocumentSessionInterface;
//endregion
use RavenDB\Demo\common\DocumentStoreHolder;

class TheSession
{

    public function __invoke(): void
    {
        //region Demo
        //region Step_1
        $session = DocumentStoreHolder::getStore()->openSession("YourDatabaseName");
        try {
        //endregion

            //region Step_2
            //   Run your business logic:
            //
            //   Store documents
            //   Load and Modify documents
            //   Query indexes & collections
            //   Delete document
            //   .... etc.
            //endregion

            //region Step_3
            $session->saveChanges();
            //endregion

        //region Step_4
        } finally {
            $session->close();
        }
        //endregion

        //endregion
    }

/* NOTE
    Notice that we must manually close the session on finally in PHP,
    that's way step 1 is a bit different from java, and we have extra step 4.
*/

}
