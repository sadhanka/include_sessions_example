<?php
/**
 * Created by PhpStorm.
 * User: Lyubov Zhurba
 * Date: 31.05.2017
 * Time: 20:18
 */
//filename must contain only latin letters, numbers and underscores
function isCorrectFilename ($name) {
    if (!empty($name)) {
        if (preg_match('/[a-zA-Z0-9_]/', $name)) {
            return true;
        }
    }
    return false;
}

//get texts from files in directory 'guestbook'
function getUserTexts ($dir) {
    $filesArray = getFilesFromDir($dir);
    $outputGuestBook = '';
    foreach ($filesArray as $fileName) {
        $userName = substr($fileName, 0, -4);
        $message = file_get_contents($dir . $fileName);
        $outputGuestBook .= '<div><h3>' . $userName . '</h3><p>' . $message . '</p>';
    }
    return $outputGuestBook;
}

// find words from array $forbidden in text
function issetForbiddenWords($text = '', $forbidden = []) {
    if (count($forbidden)) { // not empty array
        foreach ($forbidden as $fWord) {
            if (strpos($text, $fWord) !== false) { // looking for every word in the text
                return true;
            }
        }
    }
    return false;
}

// search the largest numeric filename (pay attention - it doesn't check if directory contain only numeric file names)
function getImgNumber ($userDir) {
    $arrayFile = getFilesFromDir($userDir);
    if (!empty($arrayFile)) {
        // the lagest number is first
        rsort($arrayFile);
        // get first filename from array
        $fileName = current($arrayFile);
        // get the filename without extension
        $fileName = substr($fileName, 0, -4);
    }
    // if directory is empty - first filename must be 0.jpg
    else {
        $fileName = 0;
    }
    return $fileName;
}

// string with markup of all images (pay attention - it doesn't check if directory contain only images) 
function getUserPhotos ($dir, $userName = '') {
    $filesArray = getFilesFromDir($dir);
    $outputPhotoBook = '';
    foreach ($filesArray as $fileName) {
        $outputPhotoBook .= '<div><img src="img/' . $userName . '/' . $fileName. '"></div>';
    }
    return $outputPhotoBook;
}

// return array of files without '.' and '..'
function getFilesFromDir($dir) {
    $filesArray = scandir($dir);
    array_shift($filesArray);
    array_shift($filesArray);
    return $filesArray;
}
