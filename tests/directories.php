<?php

require 'autoload.php';

$directoryIdentity = __DIR__ . DIRECTORY_SEPARATOR . 'root_folder_2_test';

//echo $directoryIdentity;

$directoryIdentityFolderNames = explode('\\', $directoryIdentity);

$rootFolderName = explode('\\', $directoryIdentity)[count($directoryIdentityFolderNames) - 1];

$directories = [$directoryIdentity];

$abstractIteratorAggregate = new GraphIte\DirectoryAggregate($directories);

echo "\n";

foreach ($abstractIteratorAggregate->createIterator() as $directory) {
    
    $pathFolders = explode('\\', $directory);
    
    $parentFolderNameIndex = array_search($rootFolderName, $pathFolders);
    
    $relativePath = '/' . implode(array_slice($pathFolders, $parentFolderNameIndex), '/');
    
    echo "relative path: $relativePath\n";
    $fileNames = GraphIte\Directory::getFileNames($directory);
    if (count($fileNames)) {
    	echo "\nfiles...: ";
        print_r(GraphIte\Directory::getFileNames($directory));
        
    }
    echo "\n------------\n\n";
}/**/
