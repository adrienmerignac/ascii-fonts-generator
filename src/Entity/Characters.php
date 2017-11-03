<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Characters
 *
 * @ORM\Table(name="characters", uniqueConstraints={@ORM\UniqueConstraint(name="character_unicode_name", columns={"characters_unicode_name"}), @ORM\UniqueConstraint(name="characters_unicode_name", columns={"characters_unicode_name", "characters_unicode_value"}), @ORM\UniqueConstraint(name="characters_unicode_value", columns={"characters_unicode_value"})})
 * @ORM\Entity
 */
class Characters
{
    /**
     * @var string
     *
     * @ORM\Column(name="characters_unicode_name", type="string", length=32, nullable=false)
     */
    private $charactersUnicodeName;

    /**
     * @var string
     *
     * @ORM\Column(name="characters_unicode_value", type="string", length=2, nullable=false)
     */
    private $charactersUnicodeValue;

    /**
     * @var integer
     *
     * @ORM\Column(name="characters_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $charactersId;



    /**
     * Set charactersUnicodeName
     *
     * @param string $charactersUnicodeName
     *
     * @return Characters
     */
    public function setCharactersUnicodeName($charactersUnicodeName)
    {
        $this->charactersUnicodeName = $charactersUnicodeName;

        return $this;
    }

    /**
     * Get charactersUnicodeName
     *
     * @return string
     */
    public function getCharactersUnicodeName()
    {
        return $this->charactersUnicodeName;
    }

    /**
     * Set charactersUnicodeValue
     *
     * @param string $charactersUnicodeValue
     *
     * @return Characters
     */
    public function setCharactersUnicodeValue($charactersUnicodeValue)
    {
        $this->charactersUnicodeValue = $charactersUnicodeValue;

        return $this;
    }

    /**
     * Get charactersUnicodeValue
     *
     * @return string
     */
    public function getCharactersUnicodeValue()
    {
        return $this->charactersUnicodeValue;
    }

    /**
     * Get charactersId
     *
     * @return integer
     */
    public function getCharactersId()
    {
        return $this->charactersId;
    }
}
