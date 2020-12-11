<?php

interface IClientService
{
    public function getClients();
    public function postClient($client);
    public function getClientInfoByLogin($login);
    public function loginPasswordMatch($login, $password);
}