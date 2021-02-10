<?php

namespace App\Security\Voter\Basis;

use \App\Entity\Basis\Builder;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class BuilderVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['ADD', 'EDIT', 'DELETE'])
            && $subject instanceof Builder;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'ADD':
                if (in_array('ROLE_USER', $user->getRoles())) return true;
                break;
            case 'EDIT':
            case 'DELETE':
                if (in_array('ROLE_ADMIN', $user->getRoles())) return true;
                break;
        }

        return false;
    }
}
