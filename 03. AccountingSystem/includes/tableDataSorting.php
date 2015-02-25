<?php
function getEntriesFromFile($filePath, $groups, $groupNumber) {
    $contactsInfo =   file($filePath);
    $contacts = [];
    
    foreach ($contactsInfo as $value) {
        $columns = explode('!', $value);
        $contacts[] = [
            'date' => $columns[0],
            'name' => $columns[1],
            'price' => trim($columns[2]),
            'groupName' => $groups[trim($columns[3])],
            'groupNumber' => trim($columns[3])
        ];
    }
    
    // echo $groupNumber;
    $filterdContactsByGroup = getEntriesByGroup($contacts, $groupNumber);
    $sortedContactsByDate = sortEntriesByDate($filterdContactsByGroup);
    return $sortedContactsByDate;
}

function sortEntriesByDate($entries) {
    // echo '<pre>'.print_r($entries, true).'</pre>';
    usort($entries, function($a, $b) {
        return strtotime($a['date']) <= strtotime($b['date']);
    });
    
    //echo '<pre>'.print_r($entries, true).'</pre>';
    return $entries;
}

function getEntriesByGroup($entries, $groupNumber) {
    if($groupNumber == 0) { return $entries; }
    
    $filteredEntries = [];
    foreach ($entries as $info) {
        if ($info['groupNumber'] == $groupNumber ) {
            array_push($filteredEntries, $info);
        }
    }
    
    return $filteredEntries;
}