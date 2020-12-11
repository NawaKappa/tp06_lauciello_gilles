<?php

interface IClientsRepo{
    public function getRepo();
    public function addClient($client);
    public function getClientInfoByLogin($login);
    public function loginExists($login);
    public function loginPasswordMatch($login, $password);
}