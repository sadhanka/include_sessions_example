<?php
/**
 * Created by PhpStorm.
 * User: Lyubov Zhurba
 * Date: 31.05.2017
 * Time: 20:18
 */

function isCorrectFilename ($name) {
    if (!empty($name)) {
        if (preg_match('/[a-zA-Z0-9_]/', $name)) {
            return true;
        }
    }
    return false;
}

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

function issetForbiddenWords($text = '', $forbidden = []) {
    if (count($forbidden)) {
        foreach ($forbidden as $fWord) {
            if (strpos($text, $fWord) !== false) {
                return true;
            }
        }
    }
    return false;
}

function getImgNumber ($userDir) {
    $arrayFile = getFilesFromDir($userDir);
    if (!empty($arrayFile)) {
        rsort($arrayFile);
        $fileName = current($arrayFile);
        $fileName = substr($fileName, 0, -4);
    }
    else {
        $fileName = 0;
    }
    return $fileName;
}

function getUserPhotos ($dir, $userName = '') {
    $filesArray = getFilesFromDir($dir);
    $outputPhotoBook = '';
    foreach ($filesArray as $fileName) {
        $outputPhotoBook .= '<div><img src="img/' . $userName . '/' . $fileName. '"></div>';
    }
    return $outputPhotoBook;
}

function getFilesFromDir($dir) {
    $filesArray = scandir($dir);
    array_shift($filesArray);
    array_shift($filesArray);
    return $filesArray;
}