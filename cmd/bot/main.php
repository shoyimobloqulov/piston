<?php
    function GetLanguages()
    {
        $url = 'https://emkc.org/api/v2/piston/runtimes';
        $response = file_get_contents($url);
        if ($response === false) {
            echo "Xatolik: HTTP so'rovni bajarmayapman";
            return null;
        }
        $languagesMap = json_decode($response, true);
        $languageSet = [];
        foreach ($languagesMap as $obj) {
            $languageSet[$obj['Language']] = true;
        }

        $languages = [];

        foreach (array_keys($languageSet) as $lang) {
            $languages[] = $lang;
        }
        sort($languages);

        return $languages;
    }