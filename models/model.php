<?php

class database
{
    public $db;
    public function __construct()
    {
        try {
            $this->db = new PDO(
                "mysql:host=localhost;dbname=music_application",
                "admin",
                "welcome"
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

class Model extends database
{
    // It checks whether the user is admin or loginned 
    public function registration($data)
    {
        try {
            $email = $data["email"];
            $password = $data["password"];
            $check = $this->db
                ->query(
                    "SELECT * FROM UserRegistration WHERE email_id ='$email' AND passwords ='$password'"
                )
                ->fetch(PDO::FETCH_OBJ);
            return $check;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function checkadmin($data)
    {
        try {
            $email = $data["email"];
            $password = $data["password"];
            $checkadmin = $this->db
                ->query(
                    "SELECT * FROM UserRegistration WHERE email_id ='$email' AND passwords ='$password' AND is_admin =1 "
                )
                ->fetch(PDO::FETCH_OBJ);
            return $checkadmin;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // It inserts the artist name AND image in db AND in the local 

    public function addArtist($artist, $image)
    {
        try {
            $artistname = $artist["artistName"];
            $this->db->query(
                "INSERT INTO artist (artist_name) VALUES ('$artistname')"
            );
            $getting_data = $this->db->query(
                "SELECT * FROM artist ORDER BY id DESC LIMIT 1"
            );
            $getting_data = $getting_data->fetch(PDO::FETCH_OBJ);

            $tasksTotal = count($image["artist"]["name"]);
            for ($i = 0; $i < $tasksTotal; $i++) {
                $newFilePath = "images/artist/" . $image["artist"]["name"][$i];
                $tmpFilePath = $image["artist"]["tmp_name"][$i];
                move_uploaded_file($tmpFilePath, $newFilePath);
                $this->db->query(
                    "INSERT INTO images (image_path,artist_id) VALUES ('$newFilePath','$getting_data->id')"
                );
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // It inserts the artist name AND image in db AND in the local 
    public function addMusic($music, $musicImage)
    {
        try {
            $musicname = $music["musicName"];
            $artistname = $music["artist"];

            $this->db->query(
                "INSERT INTO albums (album_name,album_artist,created_at) VALUES ('$musicname','$artistname',now())"
            );
            $getting_data_album = $this->db->query(
                "SELECT * FROM album ORDER BY id DESC LIMIT 1"
            );
            $getting_data_album = $getting_data_album->fetch(PDO::FETCH_OBJ);

            $tasksTotal = count($musicImage["music"]["name"]);
            for ($i = 0; $i < $tasksTotal; $i++) {
                $newFilePath =
                    "images/music/" . $musicImage["music"]["name"][$i];
                $tmpFilePath = $musicImage["music"]["tmp_name"][$i];
                move_uploaded_file($tmpFilePath, $newFilePath);
                $this->db->query(
                    "INSERT INTO images (image_path,album_id) VALUES ('$newFilePath','$getting_data_album->id')"
                );
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // It fetches all the music in db AND uses it on home page
    function showMusic()
    {
        $album = $this->db
            ->query("SELECT * FROM albums")
            ->fetchAll(PDO::FETCH_OBJ);
        return $album;
    }

    // It fetches all the artist in db AND uses it for adding the music AND also on home page 
    function showArtist()
    {
        $artistnames = $this->db
            ->query("SELECT * FROM artist")
            ->fetchAll(PDO::FETCH_OBJ);
        return $artistnames;
    }

    public function addplaylistalbums($data)
    {
        foreach ($data["album"] as $datas) {
            $this->db->query(
                "INSERT INTO playlists (album_id,created_at) VALUES ('$datas',now())"
            );
        }
    }
    public function addplaylistartist($data)
    {
        foreach ($data["album"] as $datas) {
            $this->db->query(
                "INSERT INTO playlists (artist_id,created_at) VALUES ('$datas',now())"
            );
        }
    }

    public function sendrequest($id)
    {
        $this->db->query(
            "INSERT INTO requests (user_id,is_approved) VALUES ('$id',0)"
        );
    }

    // This func is used to check the premium reqest by admin
    public function checkpremium($id)
    {
        $userCheck = $this->db
            ->query(
                "SELECT * FROM UserRegistration WHERE id ='$id' AND is_premium=0"
            )
            ->fetch(PDO::FETCH_OBJ);
        return $userCheck;
    }

    public function checkrequest()
    {
        $checkRequest = $this->db
            ->query("SELECT * FROM requests ")
            ->fetchAll(PDO::FETCH_OBJ);
        return $checkRequest;
    }

    public function checkingrequest()
    {
        $checkrequest = $this->checkrequest();
        foreach ($checkrequest as $request) {
            $user = $this->db
                ->query(
                    "SELECT * FROM UserRegistration WHERE id ='$request->user_id'"
                )
                ->fetch(PDO::FETCH_OBJ);
            return $user;
        }
    }

    // This func is used to approve is_premium request
    public function approveondb($id)
    {
        $this->db->query(
            "UPDATE UserRegistration SET is_premium = 1 WHERE id ='$id'"
        );
        $this->db->query(
            "UPDATE requests  SET is_approved = 1 WHERE user_id ='$id'"
        );
    }
}