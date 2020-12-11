<?php

define("CLIENTSFILE", dirname(__DIR__).'/../ressources/clients.json');

/**
 * @deprecated
 */
class ClientsRepoJSONFile implements IClientsRepo
{
    public function getRepo()
    {
        return $this->getClientFile();
    }

    public function addClient($client)
    {
        $this->addClientToFile($client);
    }

    public function loginPasswordMatch($login, $password)
    {
        $repo = $this->getRepo();
        foreach ($repo as $client) 
        {
            foreach ($client as $value) 
            {
                if($value['login'] == $login && $value['password'] == $password)
                {
                    return true;
                }

            }
        }
        return false;
    }

    public function loginExists($login)
    {
        $repo = $this->getRepo();
        foreach ($repo as $client) 
        {
            foreach ($client as $value) 
            {
                if($value['login'] == $login)
                {
                    return true;
                }

            }
        }
        return false;
    }

    public function getClientInfoByLogin($login)
    {
        $array = $this->getRepo();
        $res;
        for ($i = 0; $i < sizeof($array); $i++) 
        {
            for ($y = 0; $y < sizeof($array[$i]); $y++) 
            {
                if($array[$i][$y]['login'] == $login)
                {
                    $res = $array[$i][$y];
                }
            }
        }


        return $res;
    }

    private function getClientFile()
    {
        $string = file_get_contents(CLIENTSFILE);
        $json_a = json_decode($string, true);
        $listClients = array();


        foreach ($json_a as $person => $person_a) {
            $listClients[] = $person_a;
        }

        return $listClients;
    }

    private function addClientToFile($client)
    {
        $data = json_decode(json_encode($client), true);

        $inp = file_get_contents(CLIENTSFILE);
        $tempArray = json_decode($inp);
        array_push($tempArray, $data);
        $jsonData = json_encode($tempArray);
        file_put_contents(CLIENTSFILE, $jsonData);
    }
}