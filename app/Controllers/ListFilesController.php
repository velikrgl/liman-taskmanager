<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class ListFilesController
{
	public function list_files()
	{

        
        // /liman/extensions/taskmanager/
        // Komut çalıştırdık
        $cmd = Command::runSudo("ls -la /liman/extensions/taskmanager/");

        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);

        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);

            // veriyi formatlayalim
            $process = [
                "file-permission" => $process[0],
                "number" => $process[1],
                "kullancıADı" => $process[2],
                "grubu" => $process[3],
                "size" => $process[4],
                "month" => $process[5],
                "day" => $process[6],
                "hour" => $process[7],
                "filename" => $process[8]
            ];
          
        }
       

        return view("table", [
            "value" => $cmd,
            "display" => ["file-permission", "number", "kullancıADı", "grubu", "size", "month", "day","hour","filename"],
            "title" => ["Dosya İzinleri", "Sayı", "Kullanıcı Bilgisi", "Grup adı", "Boyut", "Ay Bilgisi", "Gün Bilgisi", "Saat Bilgisi", "Dosya Adı"],
           
        ]);
    }


    function createFile(){

        
        validate([
        
            'create_file_remote' => 'required | string'
        ]);

        Command::runSudo("touch /home/liman/@{:create_file_remote}",[
            "create_file_remote" => request("create_file_remote")

            
        ]);

        return respond ("Dosya oluşturma başarılı !");
  
    }
	
}