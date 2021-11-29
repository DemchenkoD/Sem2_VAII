<?php

class Review
{
    private $id;
    private $author;
    private $mail;
    private $rating;
    private $comment;
    private $likes;
    private $dislikes;
    public function __construct($p_id, $p_author, $p_mail, $p_rating, $p_comment, $p_likes, $p_dislikes)
    {
        $this->id = $p_id;
        $this->author = $p_author;
        $this->mail = $p_mail;
        $this->rating = $p_rating;
        $this->comment = $p_comment;
        $this->likes = $p_likes;
        $this->dislikes = $p_dislikes;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    public function getRating()
    {
        return $this->rating;
    }
    public function setRating($rating)
    {
        $this->rating = $rating;
    }
    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    public function getDislikes()
    {
        return $this->dislikes;
    }

    public function setDislikes($dislikes)
    {
        $this->dislikes = $dislikes;
    }
}