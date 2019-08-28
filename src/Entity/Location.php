<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location")
 * @ORM\Entity
 */
class Location
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="hidden", type="boolean", nullable=false)
     */
    private $hidden = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="events_cannot_be_reserved", type="boolean", nullable=true)
     */
    private $eventsCannotBeReserved = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="parent", type="integer", nullable=true, options={"comment"="sortable"})
     */
    private $parent;

    /**
     * @var int|null
     *
     * @ORM\Column(name="state", type="integer", nullable=true, options={"comment"="sortable"})
     */
    private $state;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=2, nullable=true, options={"fixed"=true,"comment"="sortable"})
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="provider", type="string", length=0, nullable=false)
     */
    private $provider;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false, options={"comment"="sortable"})
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=false, options={"comment"="sortable"})
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="school_type", type="string", length=0, nullable=true)
     */
    private $schoolType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="keywords", type="text", length=65535, nullable=true)
     */
    private $keywords;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string|null
     *
     * @ORM\Column(name="street_ext", type="string", length=255, nullable=true)
     */
    private $streetExt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postal_code", type="string", length=20, nullable=true, options={"comment"="sortable"})
     */
    private $postalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true, options={"comment"="sortable"})
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tel", type="string", length=100, nullable=true)
     */
    private $tel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fax", type="string", length=100, nullable=true)
     */
    private $fax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var float|null
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="company_name", type="string", length=255, nullable=true)
     */
    private $companyName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="max_participants", type="integer", nullable=true)
     */
    private $maxParticipants;

    /**
     * @var string|null
     *
     * @ORM\Column(name="opening_hours", type="string", length=255, nullable=true)
     */
    private $openingHours;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=true)
     */
    private $comment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_extra", type="string", length=600, nullable=true)
     */
    private $addressExtra;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_the_home_learn_location", type="boolean", nullable=false)
     */
    private $isTheHomeLearnLocation = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_akademie", type="boolean", nullable=true)
     */
    private $isAkademie = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_the_at_location", type="boolean", nullable=true)
     */
    private $isTheAtLocation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="calendermail", type="string", length=255, nullable=true)
     */
    private $calendermail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updated = 'CURRENT_TIMESTAMP';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHidden(): ?bool
    {
        return $this->hidden;
    }

    public function setHidden(bool $hidden): self
    {
        $this->hidden = $hidden;

        return $this;
    }

    public function getEventsCannotBeReserved(): ?bool
    {
        return $this->eventsCannotBeReserved;
    }

    public function setEventsCannotBeReserved(?bool $eventsCannotBeReserved): self
    {
        $this->eventsCannotBeReserved = $eventsCannotBeReserved;

        return $this;
    }

    public function getParent(): ?int
    {
        return $this->parent;
    }

    public function setParent(?int $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getState(): ?int
    {
        return $this->state;
    }

    public function setState(?int $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(string $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSchoolType(): ?string
    {
        return $this->schoolType;
    }

    public function setSchoolType(?string $schoolType): self
    {
        $this->schoolType = $schoolType;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getStreetExt(): ?string
    {
        return $this->streetExt;
    }

    public function setStreetExt(?string $streetExt): self
    {
        $this->streetExt = $streetExt;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getMaxParticipants(): ?int
    {
        return $this->maxParticipants;
    }

    public function setMaxParticipants(?int $maxParticipants): self
    {
        $this->maxParticipants = $maxParticipants;

        return $this;
    }

    public function getOpeningHours(): ?string
    {
        return $this->openingHours;
    }

    public function setOpeningHours(?string $openingHours): self
    {
        $this->openingHours = $openingHours;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAddressExtra(): ?string
    {
        return $this->addressExtra;
    }

    public function setAddressExtra(?string $addressExtra): self
    {
        $this->addressExtra = $addressExtra;

        return $this;
    }

    public function getIsTheHomeLearnLocation(): ?bool
    {
        return $this->isTheHomeLearnLocation;
    }

    public function setIsTheHomeLearnLocation(bool $isTheHomeLearnLocation): self
    {
        $this->isTheHomeLearnLocation = $isTheHomeLearnLocation;

        return $this;
    }

    public function getIsAkademie(): ?bool
    {
        return $this->isAkademie;
    }

    public function setIsAkademie(?bool $isAkademie): self
    {
        $this->isAkademie = $isAkademie;

        return $this;
    }

    public function getIsTheAtLocation(): ?bool
    {
        return $this->isTheAtLocation;
    }

    public function setIsTheAtLocation(?bool $isTheAtLocation): self
    {
        $this->isTheAtLocation = $isTheAtLocation;

        return $this;
    }

    public function getCalendermail(): ?string
    {
        return $this->calendermail;
    }

    public function setCalendermail(?string $calendermail): self
    {
        $this->calendermail = $calendermail;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }


}
