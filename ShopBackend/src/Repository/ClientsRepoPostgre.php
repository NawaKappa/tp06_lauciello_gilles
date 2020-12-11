<?php
require_once dirname(__DIR__).'/../config/bootstrap.php';

class ClientsRepoPostgre implements IClientsRepo
{
    public function getRepo()
    {
        global $entityManager;
        return $entityManager->getRepository('Client');
    }

    public function addClient($client)
    {
        global $entityManager;

        $entityManager->persist($client);
        $entityManager->flush();
    }

    public function loginPasswordMatch($login, $password)
    {
        global $entityManager;

        $entityManager->getRepository('Client');
        if($this->getRepo()->findBy(array('login' => $login, 'password'=> $password)))
        {
            return true;
        }
        return false;
    }

    public function loginExists($login)
    {
        if($this->getRepo()->count(['login' => $login]) > 0)
        {
            return true;
        }
        return false;
    }

    public function getClientInfoByLogin($login)
    {
        return $this->getRepo()->findOneBy(array('login' => $login))->jsonSerialize();   
    }


}