<?php

namespace HamzaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Templates
 *
 * @ORM\Table(name="templates")
 * @ORM\Entity(repositoryClass="HamzaBundle\Repository\TemplatesRepository")
 */
class Templates
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="identification", type="integer")
     */
    private $identification;

    /**
     * @var int
     *
     * @ORM\Column(name="templateID", type="integer")
     */
    private $templateID;

    /**
     * @var string
     *
     * @ORM\Column(name="fname", type="string", length=255)
     */
    private $fname='Nina';


    /**
     * @var string
     *
     * @ORM\Column(name="lname", type="string", length=255,)
     */
    private $lname='Shaw';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status='Web Developer';


    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address='This is an adress ';

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     */
    private $tel='+33 6 75 16 94 23';


    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email='Hamza@email.com';

    /**
     * @var string
     *
     * @ORM\Column(name="towhom", type="string", length=255)
     */
    private $towhom='To whom who may concern';

    /**
     * @var string
     *
     * @ORM\Column(name="dear", type="string", length=255)
     */
    private $dear='Dear Someone,';

    /**
     * @var string
     *
     * @ORM\Column(name="textone", type="text", length=65535)
     */
    private $textone='Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac tempus dolor. Praesent varius libero eget lectus ultrices eu pretium ligula facilisis. Donec consectetur nisi a neque condimentum faucibus. Sed dui lorem, posuere rhoncus consectetur vitae, pulvinar quis arcu. In est eros, pharetra vulputate iaculis sit amet, euismod semper tortor. Duis non libero mi. Mauris aliquam, justo et hendrerit ullamcorper, neque justo suscipit justo, blandit varius quam augue ut mi. Nam turpis tortor, euismod at gravida accumsan, sagittis ac nulla. Nulla libero libero, ullamcorper sit amet tristique in, mattis sit amet nibh. Donec purus nisi, elementum blandit sodales ut, porta quis purus. In hac habitasse platea dictumst. Nam sed pretium nulla. Nullam eu lectus in erat ultrices porttitor id non ligula. Curabitur sed sapien nec sapien consequat rutrum sit amet vel ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.';


    /**
     * @var string
     *
     * @ORM\Column(name="texttwo", type="text", length=65535)
     */
    private $texttwo='Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac tempus dolor. Praesent varius libero eget lectus ultrices eu pretium ligula facilisis. Donec consectetur nisi a neque condimentum faucibus. Sed dui lorem, posuere rhoncus consectetur vitae, pulvinar quis arcu. In est eros, pharetra vulputate iaculis sit amet, euismod semper tortor. Duis non libero mi. Mauris aliquam, justo et hendrerit ullamcorper, neque justo suscipit justo, blandit varius quam augue ut mi. Nam turpis tortor, euismod at gravida accumsan, sagittis ac nulla. Nulla libero libero, ullamcorper sit amet tristique in, mattis sit amet nibh. Donec purus nisi, elementum blandit sodales ut, porta quis purus. In hac habitasse platea dictumst. Nam sed pretium nulla. Nullam eu lectus in erat ultrices porttitor id non ligula. Curabitur sed sapien nec sapien consequat rutrum sit amet vel ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.';

    /**
     * @var string
     *
     * @ORM\Column(name="textthree", type="text", length=65535)
     */
    private $textthree='Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac tempus dolor. Praesent varius libero eget lectus ultrices eu pretium ligula facilisis. Donec consectetur nisi a neque condimentum faucibus. Sed dui lorem, posuere rhoncus consectetur vitae, pulvinar quis arcu. In est eros, pharetra vulputate iaculis sit amet, euismod semper tortor. Duis non libero mi. Mauris aliquam, justo et hendrerit ullamcorper, neque justo suscipit justo, blandit varius quam augue ut mi. Nam turpis tortor, euismod at gravida accumsan, sagittis ac nulla. Nulla libero libero, ullamcorper sit amet tristique in, mattis sit amet nibh. Donec purus nisi, elementum blandit sodales ut, porta quis purus. In hac habitasse platea dictumst. Nam sed pretium nulla. Nullam eu lectus in erat ultrices porttitor.';


    /**
     * @var string
     *
     * @ORM\Column(name="greetings", type="string", length=255)
     */
    private $greetings='Cordialement,';

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="string", length=255)
     */
    private $signature='Hamza';




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Templates
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }



    /**
     * Set fname
     *
     * @param string $fname
     * @return Templates
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get fname
     *
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set lname
     *
     * @param string $lname
     * @return Templates
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Get lname
     *
     * @return string
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Templates
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Templates
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Templates
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Templates
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }



    /**
     * Set greetings
     *
     * @param string $greetings
     * @return Templates
     */
    public function setGreetings($greetings)
    {
        $this->greetings = $greetings;

        return $this;
    }

    /**
     * Get greetings
     *
     * @return string
     */
    public function getGreetings()
    {
        return $this->greetings;
    }

    /**
     * Set signature
     *
     * @param string $signature
     * @return Templates
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set identification
     *
     * @param integer $identification
     * @return Templates
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;

        return $this;
    }

    /**
     * Get identification
     *
     * @return integer
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * Set templateID
     *
     * @param integer $templateID
     * @return Templates
     */
    public function setTemplateID($templateID)
    {
        $this->templateID = $templateID;

        return $this;
    }

    /**
     * Get templateID
     *
     * @return integer
     */
    public function getTemplateID()
    {
        return $this->templateID;
    }



    /**
     * Set dear
     *
     * @param string $dear
     * @return Templates
     */
    public function setDear($dear)
    {
        $this->dear = $dear;

        return $this;
    }

    /**
     * Get dear
     *
     * @return string
     */
    public function getDear()
    {
        return $this->dear;
    }

    /**
     * Set textone
     *
     * @param string $textone
     * @return Templates
     */
    public function setTextone($textone)
    {
        $this->textone = $textone;

        return $this;
    }

    /**
     * Get textone
     *
     * @return string
     */
    public function getTextone()
    {
        return $this->textone;
    }

    /**
     * Set texttwo
     *
     * @param string $texttwo
     * @return Templates
     */
    public function setTexttwo($texttwo)
    {
        $this->texttwo = $texttwo;

        return $this;
    }

    /**
     * Get texttwo
     *
     * @return string
     */
    public function getTexttwo()
    {
        return $this->texttwo;
    }

    /**
     * Set textthree
     *
     * @param string $textthree
     * @return Templates
     */
    public function setTextthree($textthree)
    {
        $this->textthree = $textthree;

        return $this;
    }

    /**
     * Get textthree
     *
     * @return string
     */
    public function getTextthree()
    {
        return $this->textthree;
    }

    /**
     * Set towhom
     *
     * @param string $towhom
     * @return Templates
     */
    public function setTowhom($towhom)
    {
        $this->towhom = $towhom;

        return $this;
    }

    /**
     * Get towhom
     *
     * @return string
     */
    public function getTowhom()
    {
        return $this->towhom;
    }
}
