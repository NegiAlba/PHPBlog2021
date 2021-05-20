<?php

namespace App\src\models;

class Article
{
    //! Propriétés

    /**
     * Id of article.
     *
     * @var int
     */
    private $id;

    /**
     * Title of article.
     *
     * @var string
     */
    private $title;

    /**
     * Themes of article.
     *
     * @var string
     */
    private $theme;

    /**
     * Content of article.
     *
     * @var string
     */
    private $content;

    /**
     * Creation Date of article.
     *
     * @var DateTime
     */
    private $createdAt;

    /**
     * Update Date of article.
     *
     * @var DateTime
     */
    private $updatedAt;

    //! Méthodes magiques et de construction

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $dataforObj)
    {
        foreach ($dataforObj as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->{$method}($value);
            }
        }
    }

    //! Méthodes Getters & Setters

    /**
     * Get id of article.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id of article.
     *
     * @param int $id id of article
     */
    public function setId(int $id)
    {
        if ($id > 0) {
            $this->id = $id;
        }
    }

    /**
     * Get title of article.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title of article.
     *
     * @param string $title title of article
     */
    public function setTitle(string $title)
    {
        if (strlen($title) > 3) {
            $this->title = $title;
        }
    }

    /**
     * Get themes of article.
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set themes of article.
     *
     * @param string $theme themes of article
     */
    public function setTheme(string $theme)
    {
        if (!empty($theme)) {
            $this->theme = $theme;
        }
    }

    /**
     * Get content of article.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set content of article.
     *
     * @param string $content content of article
     */
    public function setContent(string $content)
    {
        if (strlen($content) > 5) {
            $this->content = $content;
        }
    }

    /**
     * Get creation Date of article.
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set creation Date of article.
     *
     * @param DateTime $createdAt creation Date of article
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get update Date of article.
     *
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set update Date of article.
     *
     * @param DateTime $updatedAt update Date of article
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}
