<?php
include('IClientService.php');
require_once(dirname(__DIR__).'/Repository/IClientsRepo.php');


class ClientService implements IClientService
{
    private IClientsRepo $repo;

    public function __construct(IClientsRepo $repoCli)
    {
        $this->repo = $repoCli;
    }

    public function getClients()
    {
        $res = $this->repo->getRepo();
        return $res;
    }

    public function getClientInfoByLogin($login)
    {
        return $this->repo->getClientInfoByLogin($login);
    }


    public function loginPasswordMatch($login, $password)
    {
        return $this->repo->loginPasswordMatch($login, $password);
    }

    public function loginExists($login)
    {
        return $this->repo->loginExists($login);
    }

    public function postClient($client)
    {
        $this->repo->addClient($client);
    }
}