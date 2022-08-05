<?php
if (! function_exists('uploadImg')) {
    function uploadImg($file, $path)
    {
        $imageName = $file->getClientOriginalName() . time().'.'.$file->extension();  

        $file->move(public_path($path), $imageName);

        $fullName = $path . '/' . $imageName;
        
        return $fullName;
    }
}

if (! function_exists('removeImg')) {
    function removeImg($fullName)
    {
        unlink($fullName);

        return true;
    }
}

if (! function_exists('formatDate')) {
    function formatDate($date, $pattern)
    {
        return date($pattern, strtotime($date));
    }
}
  