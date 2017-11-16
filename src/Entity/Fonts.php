<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Fonts
 *
 * @ORM\Table(name="fonts", uniqueConstraints={@ORM\UniqueConstraint(name="font_name", columns={"fonts_name"})})
 * @ORM\Entity
 */
class Fonts
{
    /**
     * @var string
     *
     * @ORM\Column(name="fonts_name", type="string", length=32, nullable=false)
     */
    private $fontsName;

    /**
     * @var integer
     *
     * @ORM\Column(name="fonts_line_height", type="integer", nullable=false)
     */
    private $fontsLineHeight;

    /**
     * @var integer
     *
     * @ORM\Column(name="fonts_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fontsId;



    /**
     * Set fontsName
     *
     * @param string $fontsName
     *
     * @return Fonts
     */
    public function setFontsName($fontsName)
    {
        $this->fontsName = $fontsName;

        return $this;
    }

    /**
     * Get fontsName
     *
     * @return string
     */
    public function getFontsName()
    {
        return $this->fontsName;
    }

    /**
     * Set fontsLineHeight
     *
     * @param integer $fontsLineHeight
     *
     * @return Fonts
     */
    public function setFontsLineHeight($fontsLineHeight)
    {
        $this->fontsLineHeight = $fontsLineHeight;

        return $this;
    }

    /**
     * Get fontsLineHeight
     *
     * @return integer
     */
    public function getFontsLineHeight()
    {
        return $this->fontsLineHeight;
    }

    /**
     * Get fontsId
     *
     * @return integer
     */
    public function getFontsId()
    {
        return $this->fontsId;
    }
}
