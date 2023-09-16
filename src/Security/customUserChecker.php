<?php

namespace App\Security;

use App\Entity\Admin;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class customUserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user){
        if (!$user instanceof Admin) {
            return;
        }
    }

    public function checkPostAuth(UserInterface $user){
        if (!$user instanceof Admin) {
            return;
        }

        if(!$user->isVerified()){
            throw new CustomUserMessageAccountStatusException("Quase lá, verifique no seu o link de verificaçao para ativar sua conta!!!");
        }
    }
    
}

?>