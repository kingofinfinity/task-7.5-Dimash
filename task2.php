<?php

    $searchRoot = 'C:\PROJ DIM\papka_family';
    $files = scandir($searchRoot);
    $searchResult = [];
    $searchName = 'test.txt';



    function searchFile($currentFolder, $fileName, &$resultArray) {

    $folderContent = scandir($currentFolder);

    foreach ($folderContent as $item) {
        if ($item != '.' && $item != '..') {
            $currentItem = $currentFolder . '/' . $item;

            if (is_dir($currentItem)) {
                searchFile($currentItem, $fileName, $resultArray);
            } elseif ($item == $fileName) {
                $resultArray[] = $currentItem;
            }
        }
    }
}


searchFile($searchRoot, $searchName, $searchResult);

$searchResult = array_filter($searchResult, function ($filePath) {
    return filesize($filePath) > 0;
});

// Выводим результаты
if (empty($searchResult)) {
    echo "Поиск не дал результатов.\n";
} else {
    echo "Результаты поиска:\n";
    foreach ($searchResult as $result) {
        echo $result . "\n";
    }
}




