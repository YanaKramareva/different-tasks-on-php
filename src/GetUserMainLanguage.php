<?php

namespace App;

function getUserMainLanguage($user, $client = null)
{
    $defaultClient = $client ? $client : new RepositoryClient();
    $data = $defaultClient->repos($user);
    if (count($data) === 0) {
        return null;
    }
    $languages = array_map(fn ($repo) => $repo['language'], $data);
    $languagesCount = array_reduce($languages, function ($acc, $language) {
        $count = $acc[$language] ?? 0;
        $acc[$language] = $count + 1;
        return $acc;
    }, []);
    $keys = array_keys($languagesCount);
    return array_reduce($keys, function ($acc, $language) use ($languagesCount) {
        return $languagesCount[$language] > $languagesCount[$acc]
            ? $language
            : $acc;
    }, $keys[0]);
}
