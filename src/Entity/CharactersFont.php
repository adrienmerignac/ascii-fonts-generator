<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CharactersFont
 *
 * @ORM\Table(name="characters_font", indexes={@ORM\Index(name="fonts_id", columns={"fonts_id", "characters_id"}), @ORM\Index(name="characters_id", columns={"characters_id"}), @ORM\Index(name="IDX_31C5AE6D07E712C", columns={"fonts_id"})})
 * @ORM\Entity
 */
class CharactersFont
{
    /**
     * @var integer
     *
     * @ORM\Column(name="characters_fonts_width", type="integer", nullable=false)
     */
    private $charactersFontsWidth;

    /**
     * @var integer
     *
     * @ORM\Column(name="characters_fonts_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $charactersFontsId;

    /**
     * @var \Fonts
     *
     * @ORM\ManyToOne(targetEntity="Fonts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fonts_id", referencedColumnName="fonts_id")
     * })
     */
    private $fonts;

    /**
     * @var \Characters
     *
     * @ORM\ManyToOne(targetEntity="Characters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="characters_id", referencedColumnName="characters_id")
     * })
     */
    private $characters;



    /**
     * Set charactersFontsWidth
     *
     * @param integer $charactersFontsWidth
     *
     * @return CharactersFont
     */
    public function setCharactersFontsWidth($charactersFontsWidth)
    {
        $this->charactersFontsWidth = $charactersFontsWidth;

        return $this;
    }

    /**
     * Get charactersFontsWidth
     *
     * @return integer
     */
    public function getCharactersFontsWidth()
    {
        return $this->charactersFontsWidth;
    }

    /**
     * Get charactersFontsId
     *
     * @return integer
     */
    public function getCharactersFontsId()
    {
        return $this->charactersFontsId;
    }

    /**
     * Set fonts
     *
     * @param \Fonts $fonts
     *
     * @return CharactersFont
     */
    public function setFonts(\Fonts $fonts = null)
    {
        $this->fonts = $fonts;

        return $this;
    }

    /**
     * Get fonts
     *
     * @return \Fonts
     */
    public function getFonts()
    {
        return $this->fonts;
    }

    /**
     * Set characters
     *
     * @param \Characters $characters
     *
     * @return CharactersFont
     */
    public function setCharacters(\Characters $characters = null)
    {
        $this->characters = $characters;

        return $this;
    }

    /**
     * Get characters
     *
     * @return \Characters
     */
    public function getCharacters()
    {
        return $this->characters;
    }
}
