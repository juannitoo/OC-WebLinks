<?php

namespace WebLinks\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    /**
     * User id.
     *
     * @var integer
     */
    private $id;

    /**
     * User name.
     *
     * @var string
     */
    private $username;

    /**
     * User password.
     *
     * @var string
     */
    private $password;

    /**
     * User salt.
     *
     * @var string
     */
    private $salt;

    /**
     * User role.
     *
     * Values : ROLE_USER or ROLE_ADMIN.
     */
    private $role;

    /**
     * Associated link.
     *
     * @var \WebLinks\Domain\Link
     */
    private $link;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

   /**
     * @inheritDoc obligé héritage interface sécurité
     */
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    /**
     * @inheritDoc obligé héritage interface sécurité
     */
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * @inheritDoc obligé héritage interface sécurité
     */
    public function getSalt() {
        return $this->salt;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }

    /** 
     * @inheritDoc
     */
    public function eraseCredentials() {
        // Nothing to do here
    }

    public function getLink() {
        return $this->link;
    }

    public function setLink(Link $link) {
        $this->link = $link;
        return $this;
    }
}
