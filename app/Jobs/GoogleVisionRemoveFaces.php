<?php

namespace App\Jobs;

use App\Models\ArticleImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionRemoveFaces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    
    private $article_image_id;


    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    
    public function handle()
    {
        $i = ArticleImage::find($this->article_image_id);

        if(!$i){return;}
    
        $srcPath = storage_path('/app/' . $i->file);
        $image = file_get_contents($srcPath);
        
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();

        
           
            foreach($faces as $face){
               $vertices = $face->getBoundingPoly()->getVertices();
            
               echo "face\n";

                foreach($vertices as $vertex){
                    echo $vertex->getX() . ", " . $vertex->getY() . "\n";
                }
                
            }
                   
        }
    
    
}




