<?

$file = CFile::GetFileArray($docID);
$pos = strrpos($file['FILE_NAME'], '.');
$file['FILE_NAME'] = substr($file['FILE_NAME'], $pos);
if(!$file['FILE_SIZE']){
    $file['FILE_SIZE'] = filesize($_SERVER['DOCUMENT_ROOT'].$file['SRC']);
}
$frm = explode('.', $file['FILE_NAME']);
$frm = $frm[1];
if($frm == 'doc' || $frm == 'docx'){
    $type = 'doc';
}
elseif($frm == 'xls' || $frm == 'xlsx'){
    $type = 'xls';
}
elseif($frm == 'jpg' || $frm == 'jpeg'){
    $type = 'jpg';
}
elseif($frm == 'png'){
    $type = 'png';
}
elseif($frm == 'ppt'){
    $type = 'ppt';
}
elseif($frm == 'csv'){
    $type = 'csv';
}
elseif($frm == 'txt'){
    $type = 'txt';
}
else{
    $type = 'pdf';
}
$arDoc = array('TYPE' => $type, 'FILE_SIZE' => $file['FILE_SIZE'], 'SRC' => $file['SRC'], 'DESCRIPTION' => $file['DESCRIPTION'], 'ORIGINAL_NAME' => $file['ORIGINAL_NAME']);
$fileName = substr($arDoc['ORIGINAL_NAME'], 0, strrpos($arDoc['ORIGINAL_NAME'], '.'));
$fileTitle = (strlen($arDoc['DESCRIPTION']) ? $arDoc['DESCRIPTION'] : $fileName);
$formats = array(GetMessage('CT_NAME_b'), GetMessage('CT_NAME_KB'), GetMessage('CT_NAME_MB'), GetMessage('CT_NAME_GB'), GetMessage('CT_NAME_TB'));
$format = 0;
$filesize = $arDoc['FILE_SIZE'];
while($filesize > 1024 && count($formats) != ++$format){
    $filesize = round($filesize / 1024, 1);
}
$formats[] = GetMessage('CT_NAME_TB');
$arDoc['FILE_SIZE'] = $filesize.' '.$formats[$format];
?>