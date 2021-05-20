<?php

namespace App\src\models;

class Comment
{
    /**
     * Comment id.
     *
     * @var int
     */
    private $id;
    /**
     * Author's name.
     *
     * @var string
     */
    private $author;
    /**
     * Content of comment.
     *
     * @var string
     */
    private $content;

    /**
     * Date of creation.
     *
     * @var DateTime
     */
    private $createdAt;

    /**
     * Id from article.
     *
     * @var int
     */
    private $id_article;

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

    /**
     * Get comment id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment id.
     *
     * @param int $id Comment id
     *
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get author's name.
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set author's name.
     *
     * @param string $author Author's name
     *
     * @return self
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get content of comment.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set content of comment.
     *
     * @param string $content Content of comment
     *
     * @return self
     */
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get date of creation.
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set date of creation.
     *
     * @param DateTime $createdAt Date of creation
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get id from article.
     *
     * @return int
     */
    public function getId_article()
    {
        return $this->id_article;
    }

    /**
     * Set id from article.
     *
     * @param int $id_article Id from article
     *
     * @return self
     */
    public function setId_article(int $id_article)
    {
        $this->id_article = $id_article;

        return $this;
    }
}
