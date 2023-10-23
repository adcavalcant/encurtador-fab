<?php

namespace App\Helpers;

class UserDataHelper
{
    public static function getUserData()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $navegador = $_SERVER['HTTP_USER_AGENT'];
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $nameserver = $_SERVER['SERVER_NAME'];
        $typeserver = $_SERVER['SERVER_SOFTWARE'];
        $dataUser = array($ip, $navegador, $host, $nameserver, $typeserver);

        // Informações de Geolocalização
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://ipinfo.io/{$ip}/json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $ipDetails = json_decode($response);

        if ($ipDetails) {
            $dataUser[] = $ipDetails->city ?? "Cidade não disponível";
            $dataUser[] = $ipDetails->region ?? "Região não disponível";
            $dataUser[] = $ipDetails->country ?? "País não disponível";
            $dataUser[] = $ipDetails->org ?? "Provedor de Internet não disponível";
        } else {
            echo "Falha ao obter detalhes do IP.";
        }
        return $dataUser;
    }
}
