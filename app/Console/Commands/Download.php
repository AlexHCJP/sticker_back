<?php

namespace App\Console\Commands;

use App\Models\Packet;
use App\Models\Sticker;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Download extends Command
{
    protected $signature   = 'app:sticker';
 
    
    protected $description = 'Send a marketing email to a user';
 
    public function handle(): void
    {
        $token = '7320541731:AAGrSQOPosfGFcBJ6yvwwuPxA9s2RGbiDpE';
        $stickerSetName = 'UltimatePePaPy';

        $response = Http::get("https://api.telegram.org/bot{$token}/getStickerSet?name={$stickerSetName}");

        if ($response->successful()) {
            $data = $response->json();
        } 

        if($data['ok']) {
            $result    = $data['result'];
            $stickers  = $result['stickers'];
            $name      = $result['name'];
            $title     = $result['title'];
            $thumbnail = $result['thumbnail'];

            $packet = Packet::create([
                'name'    => $name,
                'title'   => $title,
                'content' => json_encode($thumbnail),
            ]);

            foreach($stickers as $sticker) {
                $fileId       = $sticker['file_id'];

                $fileResponse = Http::get("https://api.telegram.org/bot{$token}/getFile?file_id={$fileId}");
                $fileData     = json_decode($fileResponse, true);

                if($fileData['ok']) {
                    $filePath = $fileData['result']['file_path'];
                    $fileUrl  = "https://api.telegram.org/file/bot{$token}/{$filePath}";

                    $sticker = Sticker::create([
                        'packet_id' => $packet->id,
                        'content'   => json_encode($fileData['result']),
                    ]);

                    $localPath = 'stickers/' . basename($filePath);
                    file_put_contents($localPath, file_get_contents($fileUrl));
                    echo "Downloaded: $localPath\n";
                }
            }

            return;
        }
    }
}