<?php

require 'autoload.php';

$directoryIdentity = 'D:\Usuários\rafael.laurindo\projects\php\graphite\tests\ESPM';

$directoryIdentityFolderNames = explode('\\', $directoryIdentity);

$rootFolderName = explode('\\', $directoryIdentity)[count($directoryIdentityFolderNames) - 1];

$directories = [$directoryIdentity];

$abstractIteratorAggregate = new GraphIte\DirectoryAggregate($directories);

echo "\n";

foreach ($abstractIteratorAggregate->createIterator() as $directory) {
    
    $pathFolders = explode('\\', $directory);
    
    $parentFolderNameIndex = array_search($rootFolderName, $pathFolders);
    
    $relativePath = '/' . implode(array_slice($pathFolders, $parentFolderNameIndex), '/');
    
    echo "relative path: $relativePath\n\n";
    $fileNames = GraphIte\Directory::getFileNames($directory);
    if (count($fileNames)) {
        print_r(GraphIte\Directory::getFileNames($directory));
        
    }
    echo "\n------------\n\n";
}
