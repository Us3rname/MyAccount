<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 22-2-2015
 * Time: 20:13
 */

namespace MyAccount\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * MyAccount\UserBundle\Entity\User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="MyAccount\UserBundle\Entity\UserRepository")
 */
class User implements UserInterface, \Serializable
{


    /**
     * @ORM\Column(type="integer", name="user_id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $intUserId;

    /**
     * @ORM\Column(type="string", length=155, unique=true, name="username")
     */
    protected $strUsername;

    /**
     * @ORM\Column(type="string", length=64, name="password")
     */
    protected $strPassword;

    /**
     * @ORM\Column(type="datetime", name="password_updated")
     */
    protected $strPasswordUpdated;

    /**
     * @ORM\Column(type="boolean", name="active")
     */
    protected $boolIsActive;

    /**
     * @ORM\Column(type="boolean", name="blocked")
     */
    protected $boolIsBlocked;

    /**
     * @ORM\Column(type="datetime", name="last_login_attempt")
     */
    protected $strLastLoginAttempt;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $strCreatedAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $strUpdatedAt;

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        return serialize(array(
            $this->intUserId,
            $this->strUsername,
            $this->strPassword,
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     */
    public function unserialize($serialized)
    {
        list (
            $this->intUserId,
            $this->strUsername,
            $this->strPassword,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Now we tell doctrine that before we persist or update we call the updatedTimestamps() function.
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $this->setStrUpdatedAt(new \DateTime(date('Y-m-d H:i:s')));

        if ($this->getStrCreatedAt() == null) {
            $this->setStrCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
        }
    }

    /**
     * @return mixed
     */
    public function getIntUserId()
    {
        return $this->intUserId;
    }

    /**
     * @param mixed $intUserId
     */
    public function setIntUserId($intUserId)
    {
        $this->intUserId = $intUserId;
    }

    /**
     * @return mixed
     */
    public function getStrUsername()
    {
        return $this->strUsername;
    }

    /**
     * @param mixed $strUsername
     */
    public function setStrUsername($strUsername)
    {
        $this->strUsername = $strUsername;
    }

    /**
     * @return mixed
     */
    public function getStrPassword()
    {
        return $this->strPassword;
    }

    /**
     * @param mixed $strPassword
     */
    public function setStrPassword($strPassword)
    {
        $this->strPassword = $strPassword;
    }

    /**
     * @return mixed
     */
    public function getStrPasswordUpdated()
    {
        return $this->strPasswordUpdated;
    }

    /**
     * @param mixed $strPasswordUpdated
     */
    public function setStrPasswordUpdated($strPasswordUpdated)
    {
        $this->strPasswordUpdated = $strPasswordUpdated;
    }

    /**
     * @return mixed
     */
    public function getBoolIsActive()
    {
        return $this->boolIsActive;
    }

    /**
     * @param mixed $boolIsActive
     */
    public function setBoolIsActive($boolIsActive)
    {
        $this->boolIsActive = $boolIsActive;
    }

    /**
     * @return mixed
     */
    public function getBoolIsBlocked()
    {
        return $this->boolIsBlocked;
    }

    /**
     * @param mixed $boolIsBlocked
     */
    public function setBoolIsBlocked($boolIsBlocked)
    {
        $this->boolIsBlocked = $boolIsBlocked;
    }

    /**
     * @return mixed
     */
    public function getStrLastLoginAttempt()
    {
        return $this->strLastLoginAttempt;
    }

    /**
     * @param mixed $strLastLoginAttempt
     */
    public function setStrLastLoginAttempt($strLastLoginAttempt)
    {
        $this->strLastLoginAttempt = $strLastLoginAttempt;
    }

    /**
     * @return mixed
     */
    public function getStrCreatedAt()
    {
        return $this->strCreatedAt;
    }

    /**
     * @param mixed $strCreatedAt
     */
    public function setStrCreatedAt($strCreatedAt)
    {
        $this->strCreatedAt = $strCreatedAt;
    }

    /**
     * @return mixed
     */
    public function getStrUpdatedAt()
    {
        return $this->strUpdatedAt;
    }

    /**
     * @param mixed $strUpdatedAt
     */
    public function setStrUpdatedAt($strUpdatedAt)
    {
        $this->strUpdatedAt = $strUpdatedAt;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->strPassword;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->strUsername;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}