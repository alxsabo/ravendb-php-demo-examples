<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsMapReduce;

//region Usings
use RavenDB\Documents\Queries\Highlighting\HighlightingOptions;
use RavenDB\Documents\Queries\Highlighting\Highlightings;
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;

class HighlightQueryResultsMapReduce
{
    public function __invoke(RunParams $runParams): array
    {
        $searchTerm = $runParams->getSearchTerm() ?? "smile";
        $preTag = $runParams->getPreTag() ?? " (: ";
        $postTag = $runParams->getPostTag() ?? " :) ";
        $fragmentLength = $runParams->getFragmentLength() ?? 80;
        $fragmentCount = $runParams->getFragmentCount() ?? 1;

        $highlightingsInfo = new Highlightings();

        //region Demo
        $artistsResults = [];

        $session = DocumentStoreHolder::getMediaStore()->openSession();
        try {
            //region Step_6
            $highlightingOptions = new HighlightingOptions();
            $highlightingOptions->setGroupKey("Artist");
            $highlightingOptions->setPreTags([ $preTag ]);
            $highlightingOptions->setPostTags([ $postTag ]);
            //endregion

            //region Step_7
            $artistsResults = $session->query(IndexEntry::class, ArtistsAllSongs::class)
                ->highlight("AllSongTitles", $fragmentLength, $fragmentCount, $highlightingOptions, $highlightingsInfo)
                ->search("AllSongTitles", $searchTerm)
                ->toList();
            //endregion

            //region Step_8
            if (count($artistsResults) > 0) {
                $songsFragments = $highlightingsInfo->getFragments($artistsResults[0]->getArtist());
            }
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        $highlightResults = [];

        /** @var IndexEntry $artistItem */
        foreach ($artistsResults as $artistItem) {
            $songsFragments = $highlightingsInfo->getFragments($artistItem->getArtist());
            foreach ($songsFragments as $fragment) {
                $itemResults = new DataToShow();
                $itemResults->setArtist($artistItem->getArtist());
                $itemResults->setSongFragment($fragment);

                $highlightResults[] = $itemResults;
            }
        }

        usort($highlightResults, function(DataToShow $a, DataToShow $b) {
            return $a->getArtist() > $b->getArtist();
        });

        return $highlightResults;
    }
}