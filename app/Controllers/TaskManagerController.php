<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class TaskManagerController
{
	function getList()
    {
        // Komut çalıştırdık
        $cmd = Command::runSudo("ps -Ao user,pid,pcpu,stat,unit,pmem,comm --sort=-pcpu");
    
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
                "user" => $process[0],
                "pid" => $process[1],
                "cpu" => $process[2],
                "status" => $process[3],
                "service" => $process[4],
                "ram" => $process[5],
                "command" => $process[6]
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["user", "pid", "cpu", "status", "service", "ram", "command"],
            "title" => ["Kullanıcı", "PID", "% İşlemci", "Durum", "Servis", "% Bellek", "İşlem"],
            "menu" => [
                "Dosya Konumu" => [
                    "target" => "jsGetFileLocation",
                    "icon" => "fa-location-arrow"
                ],
                "Çalıştırma Argümanları" =>[
                    "target" => "jsGetCOmmandArgu",
                    "icon" => "fa-location-arrow"

                ],
                "İşlem Ağacı" =>[
                    "target" => "psTree",
                    "icon" => "fa-location-arrow"

                ],
                "Servis Detayları" => [
                    "target" => "jsGetServiceStatus",
                    "icon" => "fa-location-arrow"
                ],
                "İşlemi Sonlandır" => [
                    "target" => "jsProcessKiller",
                    "icon" => "fa-location-arrow"
                ],
                "Tüm İşlemleri Sonlandır" => [
                    "target" => "jsProcessAllKiller",
                    "icon" => "fa-location-arrow"
                ]
               
                
            ]
        ]);
    }

    function getFileLocation()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $location = Command::runSudo("readlink -f /proc/@{:pid}/exe", [
            "pid" => request("pid")
        ]);

        return respond($location);
    }

    function service_status()
    {
        validate([
            "service" => "required|string"
        ]);

        $stats = Command::runSudo("systemctl status @{:service}", [
            "service" => request("service")
           
            
        ]);
        return respond($stats);

    }

    function getcommandArgu()
    {
        validate([
            "pid" => "required|numeric"
        ]);
        //ps xao cmd
        $stats = Command::runSudo("tr \\0 ' ' < /proc/@{:pid}/cmdline", [
            "pid" => request("pid")   
        ]);
        
        return respond($stats);

    }

    function getprocessTree()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $stats = Command::runSudo("pstree  @{:pid}", [
            "pid" => request("pid")   
        ]);
        
        return respond($stats);

    }

    function killProcess()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $stats = Command::runSudo("kill  @{:pid}", [
            "pid" => request("pid")   
        ]);

               
        return respond($stats);

    }

    function killAllProcess()
    {
        validate([
            "command" => "required|string"
        ]);

        $stats = Command::runSudo("killall  @{:command}", [
            "command" => request("command")   
        ]);
        
        return respond($stats);

    }

}
