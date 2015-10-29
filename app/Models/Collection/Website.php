<?php

namespace App\Models\Collection;


class Website
{  

public static function file_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
    
public static function getWebsiteData($url){
        

$html = self::file_get_contents_curl($url);

//parsing begins here:
$doc = new \DOMDocument();
@$doc->loadHTML($html);
$nodes = $doc->getElementsByTagName('title');

//default variables
$title='';
$description='';
$image='';  
$images=''; 
    
//get and display what you need:
//$title = $doc->getElementsByTagName('title')->item(0)->nodeValue;

    
// get title 
if ($nodes->length > 0) {
        $title = $nodes->item(0)->textContent;
};   
    
// get description & keywords
$metas = $doc->getElementsByTagName('meta');

for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
    //get description
    if($meta->getAttribute('name') == 'description')
        $description = $meta->getAttribute('content');
    //get keywords
    if($meta->getAttribute('name') == 'keywords')
        $keywords = $meta->getAttribute('content');
}

// get image
    //check if has og:image
$metas = $doc->getElementsByTagName('meta');    
for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
    //get og:image
    if($meta->getAttribute('property') == 'og:image')
        $image = $meta->getAttribute('content');
}
    //get images
if(1==1){
    $image_list = $doc->getElementsByTagName('img');
for ($i = 0; $i < $image_list->length; $i++)
{
    $image_single = $image_list->item($i);
    //get image src
    //if($image_single->getAttribute('src')->length > 0){
        $images[] = $image_single->getAttribute('src');
    //}
}
}   
     
    //$image = $doc->getElementsByTagName('img');
    //$image = $doc->getElementsByTagName('img')->item(0)->getAttribute('src');
    //$image = $image_list->length;
 
        $data = [
            'url'=>$url,
            'title'=>$title,
            'description'=>$description,
            'image'=>$image,
            'images'=>$images,
                ];
            
    return $data;
    //return $data_image;
        
    }

}


?>